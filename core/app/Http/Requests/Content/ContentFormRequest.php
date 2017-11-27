<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @resource Content Form Request
 *
 * Determines whether the requester is authorised to access the API endpoint.
 *
 * Checks that request meets the API's required input rules.
*/
class ContentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return auth()->check();
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
            'keys'=>'required'
        ];
    }
}
