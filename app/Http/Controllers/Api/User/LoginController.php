<?php
namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ApiController;
use App\Models\UserInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends ApiController
{
    /**
     * Login as user
     *
     * @return json authentication code
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $userInfo = $user->userInfo()->get();
            $data['token'] =  $user->createToken('token')->accessToken;
            $data['user'] = $userInfo;
            return $this->successResponse($data, Response::HTTP_OK);
        } else {
            return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Get user details
     *
     * @return json user, userInfo
     */
    public function details()
    {
        $user = Auth::user();
        $data['user'] = $user;
        $data['userInfo'] = $user->userInfo()->get();
        return $this->successResponse($data, Response::HTTP_OK);
    }

    /**
     * Logout
     *
     * @return 204
     */
    public function logout()
    {
        $accessToken = Auth::user()->token();
        \DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);
        $accessToken->revoke();
        return $this->successResponse(null, Response::HTTP_NO_CONTENT);
    }
}
