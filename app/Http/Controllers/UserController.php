<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends PrimaryController
{
    //User page with information about user / user profile / available CRUD for user
    public function index()
    {
        $user = auth()->user();

        return view('pages.main.user-index', ['user' => $user]);
    }

    public function create()
    {
        //
    }

    public function updateUser(Request $request)
    {
        dd($request->all());
    }
}
