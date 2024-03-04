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
            'brand' => 'required|exists:brands,id',
            'model' => 'required|exists:car_models,id',
            'body' => 'required|exists:bodies,id',
            'year' => 'required|digits:4|integer|min:1980|max:2024',
            'kilometers' => 'required|numeric|min:0|max:9999999',
            'doors' => 'required|exists:doors,id',
            'seats' => 'required|exists:seats,id',
            'color' => 'required|exists:colors,id',
            'driveType' => 'required|exists:drive_types,id',
            'engine' => 'required|numeric',
            'horsepower' => 'required|numeric',
            'fuel' => 'required|exists:fuels,id',
            'transmission' => 'required|exists:transmissions,id',
            'registration' => [
                'nullable',
                'date',
                'date_format:Y-m-d',
                function ($attribute, $value, $fail) {
                    $expectedDate = now()->subYear()->format('Y-m-d');
                    if ($value !== $expectedDate) {
                        $fail('The registration date must be exactly 1 year before today.');
                    }
                },
            ],
            'price' => 'required|numeric|max:9999999.99',
            'description' => 'required|string',
            'safeties' => 'array',
            'safeties.*' => 'exists:car_safeties,id',
            'equipments' => 'array',
            'equipments.*' => 'exists:car_equipment,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'required|array|max:10',
        ];
    }
}
