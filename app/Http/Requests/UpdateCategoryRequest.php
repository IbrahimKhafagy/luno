<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name:ar' => 'required|unique:category_translations,name',
            'name:en' => 'required|unique:category_translations,name',
            'description:ar' => 'required|unique:category_translations,description',
            'description:en' => 'required|unique:category_translations,description',
            'parent_id' => 'nullable',
            'image' => 'nullable|mimes:jpg,png',
        ];
    }

    public function messages()
    {
        return[
            'name:ar.unique'=>'هذا الاسم موجود بالفعل',
            'name:ar.required'=>'يجب ادخال الاسم',
            'description:ar.unique'=>'هذا الوصف موجود بالفعل',
            'description:ar.required'=>'يجب ادخال الاسم',
            'name:en.unique'=>'This name already exists',
            'name:en.required'=>' This name is required',
            'description:en.unique'=>'This description already exists',
            'description:en.required'=>'This description is required',
        ];
    }
    }

