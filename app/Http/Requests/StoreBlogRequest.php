<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'name' => ['required', 'string',

//                function ($attribute, $value, $fails) {
//                if (strtolower($value) == 'laravel') {
//                    $fails('The ' . $attribute . ' value is invalid.');
//                }
//
                new Filter(['laravel', 'php']),
            ],
            'image' => 'required|mimes:png,jpg',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',


        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'category',
        ];
    }
}
