<?php

namespace App\Http\Requests;

#use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\FormRequest;

class IcgFormRequest extends FormRequest
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
            'first_name' =>'required|min:3',
            'last_name'  =>'required',
            'dob'        =>'required',
            'email'      =>'required|unique:icg_users,email',   
            'sex'        =>'required'
        ];

         if($id = $this->uuid){
            $rules['email'] .=','.$id.',uuid';
        }

        return $rules;
    }
}
