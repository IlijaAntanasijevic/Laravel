<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|alpha',
            'lastName' => 'required|string|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'
            ],
            'city' => 'required|string|max:50|alpha',
            'address' => 'required|string|max:75',
            'phone' => 'required|string|max:15|unique:users,phone|regex:/^[0-9]{7,15}$/',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'First name is required',
            'name.alpha' => 'First name must contain only letters',
            'lastName.required' => 'Last name is required',
            'lastName.alpha' => 'Last name must contain only letters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be email format',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters long',
            'password.regex' => 'Password must contain at least one letter and one number',
            'city.required' => 'City is required',
            'city.alpha' => 'City must contain only letters',
            'city.max' => 'City must be less than 50 characters',
            'address.required' => 'Address is required',
            'address.max' => 'Address must be less than 75 characters',
            'phone.required' => 'Phone is required',
            'phone.unique' => 'Phone already exists',
            'phone.max' => 'Phone must be less than 15 characters (min 7)',
            'phone.regex' => 'Phone must contain only numbers',
            'avatar.image' => 'Avatar must be an image',
            'avatar.mimes' => 'Avatar must be jpeg, png or jpg',
            'avatar.max' => 'Avatar must be less than 2MB'
        ];
    }
}
