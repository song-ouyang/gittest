<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SdsScoreRequest extends FormRequest
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
            'user_email' => 'required',
<<<<<<< HEAD:app/Http/Requests/SdsScoreRequest.php
                'reality_score' => 'required',
=======
            'reality_score' => 'required',
>>>>>>> f989bf86f5a705c01d9a842f59edb722fea3a85d:laravel-master/app/Http/Requests/Temperamentcheckrequest.php
            'research_score' => 'required',
            'art_score' => 'required',
            'society_score' => 'required',
            'enterprise_score' => 'required',
            'tradition_score' => 'required',
        ];
    }
}
