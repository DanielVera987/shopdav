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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'content' => 'required|string',
            'code' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'subcategory_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'sizes' => 'required',
            'sizes.*' => 'required',
            'colors' => 'required',
            'colors.*' => 'required',
            'discount_id' => 'integer',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'image4' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'image5' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
