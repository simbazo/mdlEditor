<?php

namespace App\Http\Requests\Shared;

use JWTAuth;
use Illuminate\Foundation\Http\FormRequest;

class DataTypeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return JWTAuth::parseToken()->toUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'data_type'=>'required|unique:data_types,data_type'
        ];

        if($id = $this->data_types){
            $rules['data_type'] .= ','.$id.',uuid';
        }

        return $rules;
    }
}
