<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends PrimaryController
{
    public function login_index()
    {
        return view("pages.main.login");
    }
    public function register_index()
    {
        return view("pages.main.register");
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $imageName = null;

        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();

            try {
                $request->avatar->move(public_path('assets/img/avatar'), $imageName);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return redirect()->back()->with("error", "Failed to upload avatar");
            }
        }

        try {
           User::create([
               'name' => $data['name'],
               'last_name' => $data['lastName'],
               'password' => Hash::make($data['password']),
               'email' => $data['email'],
               'phone' => $data['phone'],
               'address' => $data['address'],
               'city' => $data['city'],
               'avatar' => $imageName ?? 'default.jpg',
               'role_id' => 1
           ]);
            return redirect()->route('login')->with("success", "You have successfully registered. Please log in.");
        }catch (\Exception $e) {
            Log::error($e->getMessage());
           if($imageName  && File::exists(public_path('/assets/img/avatar/' . $imageName))){
               File::delete(public_path('/assets/img/avatar/' . $imageName));
           }
            return redirect()->back()->with("error", "Server error. Please try again later.");
        }
    }
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();

        if(!$user){
            return redirect()->back()->with('error', 'User does not exist!');
        }
        if(!Hash::check($password, $user->password)){
            return redirect()->back()->with('error', 'Wrong password!');
        }
        Auth::login($user);
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
