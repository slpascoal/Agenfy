<?php

namespace App\Http\Requests\User;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUser extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'     => 'unique:users,email|email|required',
            'name'      => 'required',
            'password'  => 'required'
        ];
    }

    public function withValidator($validator)
    {

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'msg'   => 'Ops! Algum campo obrigatório não foi preenchido.',
                'status' => false,
                'errors'    => $validator->errors(),
                'url'    => route('users.store')
            ], 403));
       }
    }
}
