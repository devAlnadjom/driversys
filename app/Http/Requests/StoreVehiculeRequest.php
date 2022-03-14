<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehiculeRequest extends FormRequest
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
            'model'=>'string|required|max:200',
            'carrental_id'=>'numeric',
            'nplace'=>'numeric',
            'registration'=>'string|max:255',
            'insurance'=>'string|max:255',
            'avaible'=>'boolean',

        ];
    }
}
