<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        return[
            'name:ar' => 'required',
            'name:en' => 'required',
            'description:ar' => 'required',
            'description:en' => 'required',
            'category_id' => 'nullable',
            'image' => 'nullable|mimes:jpg,png',
            'price' => 'required',
            'have_offfer' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'name:ar.required'=>'يجب ادخال الاسم',
            'description:ar.required'=>'يجب ادخال الاسم',
            'name:en.required'=>' This name is required',
            'description:en.required'=>'This description is required',
        ];
    }
}
