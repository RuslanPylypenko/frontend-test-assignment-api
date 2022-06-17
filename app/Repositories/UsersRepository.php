<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersRepository
{
    public function findAll($perPage): LengthAwarePaginator
    {
        return User::query()->with(['position'])->paginate($perPage);
    }
}
