<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Admin extends Request
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
            'username'=>'required',
            'password'=>'required',

        ];
    }

    public function message()
    {
        return [
        'username.required'=>'Username harus diisi',
        'password.required'=>'Password harus diisi'
        ];
    }
}
