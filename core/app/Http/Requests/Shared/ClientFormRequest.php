<?php

namespace App\Http\Requests\Shared;

use Illuminate\Foundation\Http\FormRequest;

class ClientFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       #return auth()->check();
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
        'short_name'=>'required',
        'email' =>'required|unique:clients,email',
        'phone' =>'required|unique:clients,phone',
        'contact_person_fname'  =>'required',
        'contact_person_lname'  =>'required',
        'contact_person_email'  =>'required',
        'contact_person_cell'   =>'required'
        ];
        
        if($id = $this->clients){

            $rules['email'] .= ','.$id.',uuid';
            $rules['phone'] .= ','.$id.',uuid';

        }

        return $rules;
    }

}
