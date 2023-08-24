<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sku' => "required|unique:products,sku",
            'seller' => "required|exists:users,id",
            'price' =>"required|numeric",
            'name' =>  "required" ,
            'short_description' => "required",
            'is_featured'=>"required|",
            'stock' =>  "required|numeric",
            'in_stock' => "required|numeric",
            'low_stock' => "required|numeric",
            'description' => "required",
            'status'=>"required",
            'images'=>"required",
            'type' =>"required",
            'category'=>"required",

        ];
    }
}
