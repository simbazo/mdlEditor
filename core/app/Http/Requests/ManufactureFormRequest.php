<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufactureFormRequest extends FormRequest
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
            'name'      =>'required|unique:manufactures,name',
            'email'     =>'required',
            'phone'     =>'required',
            'country_uuid'=>'required',
            'province'  =>'required',
            'town'      =>'required',
            'address1'  =>'required'
        ];

        if($id = $this->manufacture){
            $rules['name'].=','.$id.',uuid';
        }

        return $rules;
    }
}
