<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\UserInfo;
use Auth;

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
        if ($this->route()->parameter('user')) {
            $user = $this->route()->parameter('user');
            $userInfo = User::with('userinfo')->where('id', $user->id)->first();
        } else {
            $userInfo = Auth::user()->load('userinfo');
        }
        return [
            'full_name'      => 'string|max:255',
            'avatar'         => 'image|mimes:png,jpg,jpeg',
            'birthday'       => 'date_format:"Y-m-d"',
            'address'        => 'string|max:255',
            'phone'          => 'regex:/\(?([0-9]{3})\)?([ . -]?)([0-9]{3})\2([0-9]{4})/',
            'identity_card'  => 'regex:/\(?([0-9]{3})\)?([ . -]?)([0-9]{3})\2([0-9]{3})/|unique:user_info,identity_card,' . $userInfo['userinfo']->identity_card . ',identity_card',
        ];
    }
}
