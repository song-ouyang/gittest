<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SdsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'reality_score' => 'required',
            'research_score' => 'required',
            'art_score' => 'required',
            'society_score' => 'required',
            'enterprise_score' => 'required',
            'tradition_score' => 'required',
        ];
    }
}
