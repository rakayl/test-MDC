<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;


class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'edit_name' => 'required|string|max:100',
            'edit_role' => 'required|string',
            'edit_email' => [
                "required",
                "max:100",
                "string",
                "email",
                Rule::unique('users', 'email')->ignore($this->id)],
            'password' => [
                            'nullable',
                            'string',
                            'min:8',
                            'max:20',
//                          'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
                        ]
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
    public function messages(){
        return [
            'password.regex' => 'password harus mengandung huruf besar, huruf kecil dan angka'
        ];
    }
    
}
