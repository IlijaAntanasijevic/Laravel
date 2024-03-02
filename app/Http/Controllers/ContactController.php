<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends PrimaryController
{
    public function index()
    {
        return view('pages.main.contact');
    }
}
