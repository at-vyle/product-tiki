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
            $success['token'] =  $user->createToken('token')-> accessToken;
            return response()->json(['success' => $success], Response::HTTP_OK);
        } else {
            return response()->json(['error' => config('define.login.unauthorised')], Response::HTTP_UNAUTHORIZED);
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
        return response()->json(['success' => $user, 'info' => $user->userInfo()->get()], Response::HTTP_OK);
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
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
