<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules = [
            'category' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required',
        ];

        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $rules['file'] = 'nullable';
        } else {
            $rules['file'] = 'required';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'file' => 'thumbnail', // Rename 'file' to 'thumbnail' in error messages
        ];
    }
}
