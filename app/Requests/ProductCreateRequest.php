<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    public function rules()
    {
        return [            
            'name' => 'required|string|max:255',
            'price' => 'required|numeric'
        ];
    }
}
