<?php

namespace App\Http\Requests\Shared;

use JWTAuth;
use Illuminate\Foundation\Http\FormRequest;

class QuestionsFormRequest extends FormRequest
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
            'question'=>'required|unique:questions,question',
            'data_type_id'=>'required'
        ];

        if($id = $this->questions){
            $rules['question'] .= ','.$id.',uuid';
        }

        return $rules;
    }
}
