<?php

namespace App\Http\Requests\Shared;

use Illuminate\Foundation\Http\FormRequest;

class SignupFormRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'username' => 'required|unique:users,username',
            'password' => 'confirmed|min:6'
        ];

        if ($id = $this->users) {
            $rules['phone'].=',' . $id . ',uuid';
            $rules['username'] .= ',' . $id . ',uuid';
            $rules['email'] .= ',' . $id . ',uuid';
        } else {
            $rules['password'] .= '|required';
        }
        return $rules;
    }

}
