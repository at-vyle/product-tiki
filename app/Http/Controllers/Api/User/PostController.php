<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Response;
use App\Http\Requests\CreatePostRequest;
use Auth;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, CreatePostRequest $request)
    {
        $user = Auth::user();

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['product_id'] = $product->id;

        $post = Post::create($input);
        if ($post) {
            return $this->showOne($post, Response::HTTP_OK);
        }
    }
}
