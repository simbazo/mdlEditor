<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'username'              => 'required|unique:users,username,'.\Auth::user()->uuid.',uuid',
            'email'                 => 'required|email|unique:users,email,'.\Auth::user()->uuid.',uuid',
            'mobile'                 => 'required',
            'first_name'            =>'required',
            'last_name'             =>'required',
            'secret_question'       =>'required',
            'secret_answer'         =>'required',
            'sex'                   =>'required',
            'dob'                   =>'required',
            'avatar'                => 'image|image_size:<=300'
        ];
    }
}
