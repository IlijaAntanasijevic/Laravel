<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Equipment;
use App\Models\Safety;

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
            'name' => 'bail|required|alpha|max:75',
            'brand' => 'bail|required|exists:brands,id',
            'model' => 'bail|required|exists:car_models,id',
            'body' => 'bail|required|exists:bodies,id',
            'year' => 'bail|required|digits:4|integer|min:1980|max:2024',
            'kilometers' => 'bail|required|numeric|min:0|max:9999999',
            'doors' => 'bail|required|exists:doors,id',
            'seats' => 'bail|required|exists:seats,id',
            'color' => 'bail|required|exists:colors,id',
            'driveType' => 'bail|required|exists:drive_types,id',
            'engine' => 'bail|required|numeric',
            'horsepower' => 'bail|required|numeric',
            'fuel' => 'bail|required|exists:fuels,id',
            'transmission' => 'bail|required|exists:transmissions,id',
            'registration' => [
                'bail',
                'nullable',
                'date',
                'after:start_date',
                'date_format:Y-m-d',
                'after_or_equal:' . now()->format('Y-m-d'),
                'before_or_equal:' . now()->addYear()->format('Y-m-d'),
            ],
            'price' => 'bail|required|numeric|max:9999999.99',
            'description' => 'bail|required|string',
            'equipments' => 'array',
            'equipments.*' => [
                function ($attribute, $value, $fail) {
                    if ($value !== 0 && !Equipment::where('id', $value)->exists()) {
                        $fail("$value is not a valid car equipment ID.");
                    }
                },
            ],

            'safety' => 'array',
            'safety.*' => [
                function ($attribute, $value, $fail) {
                    if ($value !== 0 && !Safety::where('id', $value)->exists()) {
                        $fail("$value is not a valid car equipment ID.");
                    }
                },
            ],
            'images.*' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'bail|required|array|max:10',
        ];
    }
}
