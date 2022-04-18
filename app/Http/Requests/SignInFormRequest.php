<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInFormRequest extends FormRequest
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
            'uname'=>'required|max:15',
            'password' => 'required|min:8',
        ];
    }
    public function messages(){
        return [
            'uname.required'=>'Please Enter Username',
            'uname.max'=>'Username must be less than 15 characters',
            'password.required'=>'Please Enter Password',
            'password.min'=>'Password must be 8 characters long'
        ];
    }
}
