<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Post;
use Illuminate\Http\Response;
use Auth;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $perPage = isset($request->perpage) ? $request->perpage : config('define.post.limit_rows');

        $posts = Post::when(isset($request->type), function ($query) use ($request) {
            return $query->where('type', $request->type);
        })->when(isset($request->status), function ($query) use ($request) {
            return $query->where('status', $request->status);
        })->where('user_id', $user->id)->paginate($perPage);

        $posts = $this->formatPaginate($posts);

        return $this->showAll($posts, Response::HTTP_OK);
    }
}
