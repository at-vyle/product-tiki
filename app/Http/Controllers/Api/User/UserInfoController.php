<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Models\UserInfo;
use App\Models\User;
use Validator;
use Auth;
use Illuminate\Validation\ValidationException;

class UserInfoController extends ApiController
{
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updatedUser = $request->only(["full_name", "address", "gender", "phone", "identity_card", "avatar", "dob"]);

        $user = Auth::user();

        $info = UserInfo::where('user_id', $user->id)->first();

        $validator = Validator::make($updatedUser, [
            'full_name'      => 'string|max:255',
            'avatar'         => 'image|mimes:png,jpg,jpeg',
            'dob'            => 'date_format:"Y-m-d"',
            'address'        => 'string|max:255',
            'phone'          => 'regex:/\(?([0-9]{3})\)?([ . -]?)([0-9]{3})\2([0-9]{4})/',
            'identity_card'  => 'regex:/\(?([0-9]{3})\)?([ . -]?)([0-9]{3})\2([0-9]{3})/|unique:user_info,identity_card,' . $info->identity_card . ',identity_card',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $newImage = time() . '-' . str_random(8) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path(config('define.images_path_users'));
                $updatedUser['avatar'] = $newImage;
                $image->move($destinationPath, $newImage);
            }
            UserInfo::updateOrCreate(['user_id' => $user->id], $updatedUser);
            $user->load('userinfo');
            return $this->showOne($user, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse(trans('messages.update_user_fail'), Response::HTTP_BAD_REQUEST);
        }
    }
}
