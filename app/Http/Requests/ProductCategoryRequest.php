<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            'title_category' => 'required|max:100',
            'desc'           => 'required|max:1000',
            'alias'          => 'required|max:100',
            'img_category'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
