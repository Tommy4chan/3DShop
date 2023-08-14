<?php

namespace App\Http\Requests;

use App\Rules\ProductExistAndActiveRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => ['required', 'max:128'],
            'number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9', 'max:13'],
            'comment' => ['max:256'],
            'product_id' => [new ProductExistAndActiveRule],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'ім\'я',
            'number' => 'номер телефону',
            'comment' => 'коментар',
            'product_id' => 'продукт',
        ];
    }
}
