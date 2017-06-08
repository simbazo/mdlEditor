<?php

namespace App\Http\Requests\Shared;


use Illuminate\Foundation\Http\FormRequest;

class FarmerFormRequest extends FormRequest
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
            'first_name'    =>'required',
            'last_name'     =>'required',
            'phone'         =>'required',
            'email'         =>'required|email',
            'province'      =>'required',
            'city'          =>'required',
            'address_line1' =>'required',    
        ];

        if($id = $this->farmers){
            $rules['first_name'].=','.$id.',uuid';
        }

        return $rules;

    }
}
