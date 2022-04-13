<?php

namespace App\Http\Requests\API;

use App\Models\tax_category;
use InfyOm\Generator\Request\APIRequest;

class Createtax_categoryAPIRequest extends APIRequest
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
        return tax_category::$rules;
    }
}
