<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|alpha|min:3|max:30',
            'lastName' => 'bail|required|alpha|min:3|max:30',
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->user()->id),
            ],
            'city' => 'bail|required|string|min:3|max:50',
            'address' => 'bail|required|string|min:3|max:75',
            'phone' => [
                'bail',
                'required',
                'string',
                'max:15',
                'regex:/^[0-9]{7,15}$/',
                Rule::unique('users', 'phone')->ignore(auth()->user()->id),
            ],
            'avatar' => 'bail|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'oldPassword' => 'bail|nullable|required_with:newPassword|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            'newPassword' => 'bail|nullable|required_with:oldPassword|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|different:oldPassword'
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
