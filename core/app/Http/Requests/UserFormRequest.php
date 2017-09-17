<?php

namespace App\Http\Requests;

#use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\FormRequest;

class UserFormRequest extends FormRequest
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
        $rules = [
            'first_name'  =>'required|min:3',
            'last_name'  =>'required',
            'phone'     =>'required',
            'email' =>'required|unique:users,email',
            'password'=>'required'
        ];

        if($id = $this->user){
            $rules['email'] .=','.$id.',uuid';
            $rules['username'] .=','.$id.',uuid';
            $rules['phone'] .=','.$id.',uuid';
        }

        return $rules;
}
}
