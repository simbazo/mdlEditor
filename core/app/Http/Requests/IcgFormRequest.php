<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
#use App\Http\Requests\FormRequest;

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
            'email'      =>'required',   
            'sex'        =>'required'
        ];

        /*if($id = $this->uuid){
            $rules['email'] .=','.$id.',uuid';
        }*/

        return $rules;
    }
}
