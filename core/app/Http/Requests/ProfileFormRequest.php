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
            'username' => 'required|unique:users,username,'.\Auth::user()->uuid.',uuid',
            'email'    => 'required|email|unique:users,email,'.\Auth::user()->uuid.',uuid',
            'phone'    => 'required',
            'name'     =>'required',
            'avatar'    => 'image|image_size:<=300',
        ];
    }
}
