<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AssignAnalyticToPropertyRequest extends FormRequest
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
            'analytic_id' => 'required|numeric',
            'value' => 'required|numeric'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function message()
    {
        return [
            'analytic_id:required' => 'Analytic Id is required!',
            'analytic_id:numeric' => 'Analytic Id should be a number!',
            'value:required' => 'Value is required!',
            'value:numeric' => 'Value should be a number!'
        ];
    }
}
