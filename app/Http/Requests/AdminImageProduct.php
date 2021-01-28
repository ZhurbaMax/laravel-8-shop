<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminImageProduct extends FormRequest
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
            'title_product' => 'required',
            'price'         => 'required',
            'brand'         => 'required',
            'description'   => 'required',
            'image'         => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
