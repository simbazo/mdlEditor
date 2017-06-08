<?php

namespace App\Http\Requests\Shared;


use Illuminate\Foundation\Http\FormRequest;

class SponsorFormRequest extends FormRequest
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
            'sponsor_type_id'  =>'required',
            'sponsor_name'     =>'required',
            'phone'     =>'required',
            'email'     =>'required|email',
            'country_id'    =>'required',
            'province'      =>'required',
            'city'          =>'required',
            'address_line1' =>'required', 
        ];
        /*
        if($id = $this->sponsor){
            $rules['sponsor_name'].=','.$id.',uuid';
        }*/

        return $rules;
    }
}
