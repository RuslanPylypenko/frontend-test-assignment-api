<?php


namespace App\Http\Controllers;


class UsersController
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.form');
    }
}
