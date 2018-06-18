<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use Illuminate\Http\Response;
use Auth;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->load('userinfo');
        $user['image_path'] = config('app.url').config('define.images_path_users');

        return $this->showOne($user, Response::HTTP_OK);
    }
}
