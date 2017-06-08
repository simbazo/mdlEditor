<?php

namespace App\Http\Requests\Shared;

use Illuminate\Foundation\Http\FormRequest;
use JWTAuth;
class ProductsFormRequest extends FormRequest
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
            'client_id' =>'required',
            'name'=>'required|unique:products,name'
        ];

        if($id = $this->clients){
            $rules['name'] .= ','.$id.',uuid';
        }

        return $rules;
    }
}
