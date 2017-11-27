<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @resource Lookupkey form request
 *
 * The lookup key form request determines whether:
 * - the requester is authorised to access the API end-point
 * - has supplied a valid key
 *
 The API request will fail and return an error message if either condition is unsatisfied.
*/
class LookupKeyFormRequest extends FormRequest
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
     * Get the validation rules that apply to key search.
     *
     * Validates the request with:
     *  - The key property is required
     *  - Maximum length of the key is 10 characters
     *
     *
     * @return array
     */
    public function rules()
    {
        return [
            'key' => 'required|max:10'
        ];
    }
}
