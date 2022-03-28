<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverRequest extends FormRequest
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
            'name'=>'string|required|max:200',
            'contact'=>'string|required|max:200',
            'adress'=>'string|required|max:200',
            'driver_license'=>'string|max:255',
            'license_category'=>'string|max:255',
            'active'=>'boolean',
            'user_id'=>'',
            'photo_link'=>'',

        ];
    }


    public function prepareForValidation()
    {
        $this->merge([
            'photo_link' => NULL,
            'user_id' => NULL,
        ]);
    }
}
