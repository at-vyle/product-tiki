<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\UserInfo;

class CreateUserRequest extends FormRequest
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
            'username'        => 'required|string|max:100|unique:users',
            'email'           => 'required|string|email|max:255|unique:users',
            'password'        => 'required|string|min:6',
            'fullname'        => 'required|string|max:255',
            'avatar'          => 'image|mimes:png,jpg,jpeg',
            'birthday'        => 'required|date_format:"Y-m-d"',
            'address'         => 'required|string|max:255',
            'phone'           => 'required|integer|max:15',
            'indentity'       => 'required|numeric|digits:9|unique:users',
            'gender'          => 'required',
        ];
    }
}
