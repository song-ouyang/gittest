<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

<<<<<<< HEAD
class SdsResultRequest extends FormRequest
=======
<<<<<<<< HEAD:laravel-master/app/Http/Requests/pdpRemoveRequest.php
class pdpremoveRequest extends FormRequest
========
class SdsResultRequest extends FormRequest
>>>>>>>> f989bf86f5a705c01d9a842f59edb722fea3a85d:app/Http/Requests/SdsResultRequest.php
>>>>>>> f989bf86f5a705c01d9a842f59edb722fea3a85d
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
        ];
    }
}
