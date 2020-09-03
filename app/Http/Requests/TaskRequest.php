<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'user_id' => 'not_in:0',
            'name' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_id.not_in' => 'Please Choose User',
            'name.required' => 'Enter the task Name',
            'description.required' => 'Enter the task Description',
        ];
    }
}
