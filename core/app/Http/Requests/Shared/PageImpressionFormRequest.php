<?php

namespace App\Http\Requests\Shared;

use Illuminate\Foundation\Http\FormRequest;

class PageImpressionFormRequest extends FormRequest
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
        return [
            'date'=>'required',
            'user_uuid'=>'required',
            'application_uuid'=>'required',
            'device_uuid'=>'required',
            'node_uuid'=>'required'
        ];
    }
}
