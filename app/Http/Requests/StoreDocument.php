<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocument extends FormRequest
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
           'document_name' => 'required',
           'document_file' => 'required|mimes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {   
    return [
        'document_name.required' => 'Please enter document name',
        'document_file.required' => 'Doc File is required',
        'document_file.mimes' => 'Only images are allowed',
    ];
    }
}
