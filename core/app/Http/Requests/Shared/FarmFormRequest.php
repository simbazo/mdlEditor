<?php

namespace App\Http\Requests\Shared;

use Illuminate\Foundation\Http\FormRequest;

class FarmFormRequest extends FormRequest
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
            'farm_type_id'  =>'required',
            'farm_name'     =>'required|unique:farms,farm_name',
            'phone'         =>'required',
            'email'         =>'email|email',
            'province'      =>'required',
            'city'          =>'required',
            'address_line1' =>'required',    
        ];

        if($id = $this->farm){
            $rules['farm_name'].=','.$id.',uuid';
        }

        return $rules;
    }
}
