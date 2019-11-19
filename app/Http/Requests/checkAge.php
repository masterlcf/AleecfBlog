<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkAge extends FormRequest
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
            'age' => 'required|max:20',
            'title' => 'required'
        ];
    }

//    public function messages()
//    {
//        return [
//            'title.required' => 'title required err',
//            'age.max' => 'age max err',
//        ];
//
//    }
}
