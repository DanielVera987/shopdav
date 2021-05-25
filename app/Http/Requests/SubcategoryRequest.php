<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
        $required = "";
        
        if(request()->method() != 'PUT') {
            $required = 'required|';
        }

        return [
            "name" => "required|max:255|string",
            "description" => "required|string",
            "category_id" => "required|integer",
            "image" => "{$required}|image|mimes:jpeg,png,jpg,gif,svg"
        ];
    }
}
