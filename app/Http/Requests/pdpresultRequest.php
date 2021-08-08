<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pdpresultRequest extends FormRequest
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
            'tiger_score'=>'required',
            'peacock_score'=>'required',
            'koala_score'=>'required',
            'owl_score'=>'required',
            'chameleon_score'=>'required',
        ];
    }
}
