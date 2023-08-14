<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:128'],
            'short_description' => ['required', 'max:256'],
            'description' => ['required', 'max:1024'],
            'image' => ['required_without:previous_image', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'price' => ['required', 'min:1', 'numeric'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'назва',
            'short_description' => 'короткий опис',
            'description' => 'опис',
            'image' => 'зображення',
            'price' => 'ціна',
        ];
    }
}
