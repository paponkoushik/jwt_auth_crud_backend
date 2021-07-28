<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|float',
            'image' => 'nullable|image',
        ];
    }
}
