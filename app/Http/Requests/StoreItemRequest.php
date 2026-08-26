<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'item_code'   => 'required|string|max:50|unique:items,item_code',
            'name'        => 'required|string|max:255',
            'stock'       => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
        ];
    }
}