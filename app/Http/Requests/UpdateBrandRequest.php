<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'name:ar' => 'required|unique:brand_translations,name',
            'name:en' => 'required|unique:brand_translations,name',
            'image' => 'required|mimes:jpg,png',
        ];
    }
    public function messages()
    {
        return[
            'name:en.unique'=>'This name already exists',
            'name:ar.unique'=>'هذا الاسم موجود بالفعل',
            'name:en.required'=>'name is required',
            'name:ar.required'=>'يجب ادخال الاسم',
        ];
    }

}

