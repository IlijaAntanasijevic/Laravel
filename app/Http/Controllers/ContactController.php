<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminQuestion;

class ContactController extends PrimaryController
{
    public function index()
    {
        return view('pages.main.contact');
    }

    public function sendMail(ContactRequest $request)
    {
        try {
            Mail::to('ilija0125@gmail.com')->send(new AdminQuestion($request->all()));
            return redirect()->route('contact')->with('success', 'Successfully send message!');
        }catch (Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('contact')->with('error', 'Server error!');

        }
    }
}
