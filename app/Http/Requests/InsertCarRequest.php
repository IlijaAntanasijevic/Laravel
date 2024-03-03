<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertCarRequest extends FormRequest
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
            'name' => 'required|string|max:75',
            'brand' => 'required|exists:brand,id',
            'model' => 'required|exists:car_model,id',
            'body' => 'required|exists:body,id',
            'fuel' => 'required|exists:fuel,id',
            'transmission' => 'required|exists:transmission,id',
            'driveType' => 'required|exists:drive_type,id',
            'engine' => 'required|exists:engine,id',
            'color' => 'required|exists:color,id',
            'year' => 'required|digits:4',
        ];
    }
}
