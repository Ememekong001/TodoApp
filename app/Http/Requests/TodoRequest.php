<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'title' =>'required|string|min:3|max:30',
            'description' =>'required|string|max:255',
            'location' => 'nullable'
        ];
    }
    public function messages()
    {
        return [
            'title' =>'Please input a valid title format. Title should be more than 3 words.',
            'description' =>'Please add a description',
        ];
    }
}
