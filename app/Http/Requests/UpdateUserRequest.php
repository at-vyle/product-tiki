<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\UserInfo;

class UpdateUserRequest extends FormRequest
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
            'fullname'       => 'string|max:255',
            'avatar'         => 'image|mimes:png,jpg,jpeg',
            'birthday'       => 'date_format:"Y-m-d"',
            'address'        => 'string|max:255',
            'phone'          => 'string|max:15',
            'identity_card'  => 'string|digits:9|unique:user_info'
        ];
    }
}
