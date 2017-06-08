<?php

namespace App\Http\Requests\Shared;

use Illuminate\Foundation\Http\FormRequest;

class NgoFormRequest extends FormRequest
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
        $rules = [
            'ngo_type'  =>'required',
            'name'      =>'required|unique:ngos,name',
            'contact_person'=>'required',
            'phone'     =>'required',
            'email'     =>'required|email',
            'province'      =>'required',
            'city'          =>'required',
            'address_line1' =>'required', 
        ];

        if($id = $this->ngo){
            $rules['name'] .= ','.$id.',uuid';
        }

        return $rules;
    }
}
