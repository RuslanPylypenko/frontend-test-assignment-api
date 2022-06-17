<?php


namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Repositories\UsersRepository;

class UsersController extends Controller
{
    private UsersRepository $usersRepository;

    /**
     * UsersController constructor.
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index()
    {
        return new UserCollection($this->usersRepository->findAll(5));
    }
}
