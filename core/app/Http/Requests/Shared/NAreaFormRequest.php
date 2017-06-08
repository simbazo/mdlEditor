<?php

namespace App\Http\Requests\Shared;

use JWTAuth;
use Illuminate\Foundation\Http\FormRequest;

class NAreaFormRequest extends FormRequest
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
        return [
            'name'=>'required|unique:ngo_areas,name'
        ];
    }
}
