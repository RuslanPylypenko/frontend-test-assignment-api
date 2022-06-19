<?php


namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UsersRepository;
use App\Services\UserRegisterService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    private UsersRepository $usersRepository;
    private UserRegisterService $registerService;

    /**
     * UsersController constructor.
     * @param UsersRepository $usersRepository
     * @param UserRegisterService $registerService
     */
    public function __construct(
        UsersRepository $usersRepository,
        UserRegisterService $registerService
    )
    {
        $this->usersRepository = $usersRepository;
        $this->registerService = $registerService;
    }

    public function index()
    {
        return new UserCollection($this->usersRepository->findAll(5));
    }

    public function show($id)
    {
        try {
            Validator::make(['id' => $id], [
                'id' => 'required|integer',
            ])->validate();

            return new UserResource(User::query()->findOrFail($id));
        } catch (ValidationException $exception) {
            return response()->json([
                'success' => false,
                "message" => "Validation failed",
                "fails" => $exception->getMessage()
            ]);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'success' => false,
                "message" => "The user with the requested identifier does not exist",
                "fails" => [
                    'user_id' => 'User not found'
                ]
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                "message" => $exception->getMessage(),
            ]);
        }

    }

    public function store(UserStoreRequest $userStoreRequest)
    {
        try {
            $user = $this->registerService->register($userStoreRequest->all());
            return response()->json([
                'success' => true,
                'user_id' => $user->getKey(),
                "message" => "New user successfully registered",
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                "message" => $exception->getMessage(),
            ], 500);
        }

    }
}
