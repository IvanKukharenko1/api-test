<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreatePropertyRequest extends FormRequest
{

    public $validator = null;

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
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
            'suburb' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'suburb:required' => 'Suburb is required!',
            'state:required' => 'State is required!',
            'country:required' => 'Country is required!',
            'suburb:max:255' => 'Max length of Suburb is lower then provided!',
            'state:max:255' => 'Max length of State is lower then provided!',
            'country:max:255' => 'Max length of Country is lower then provided!',
        ];
    }
}
