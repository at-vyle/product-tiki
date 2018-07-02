<?php
namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Response;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Auth\AuthenticationException;
use Auth;
use DB;

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

        $posts->load('product');
        $posts = $this->formatPaginate($posts);

        return $this->showAll($posts, Response::HTTP_OK);
    }

    /**
    * Create post
    *
    * @param \App\Models\Product                  $product product of this post
    * @param \App\Http\Requests\CreatePostRequest $request request
    *
    * @return \Illuminate\Http\Response
    */
    public function store(Product $product, CreatePostRequest $request)
    {
        $user = Auth::user();

        $input = $request->only('type', 'content');

        if ($input['type'] == Post::TYPE_REVIEW) {
            $input['rating'] = $request->rating;
        }
        $input['user_id'] = $user->id;
        $input['product_id'] = $product->id;

        $post = Post::create($input);
        if ($post) {
            return $this->showOne($post, Response::HTTP_OK);
        }
    }

    /**
     * Update post
     *
     * @param \App\Models\Post                    $post    post to update
     * @param App\Http\Requests\UpdatePostRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        $user = Auth::user();

        if ($post->user_id == $user->id) {
            $product = $post->product;
            
            $input = $request->only('type', 'rating', 'content');
            if ($input['type'] == Post::TYPE_REVIEW) {
                $input['rating'] = $request->rating;
                if ($post->status != POST::UNAPPROVED) {
                    $product->total_rate -= $post->rating;
                    $product->rate_count--;
                    $product->save();
                }
            }
            $input['status'] = Post::UNAPPROVED;
            $post->update($input);
            return $this->showOne($post->load('user.userinfo'), Response::HTTP_OK);
        } else {
            throw new AuthenticationException();
        }
    }

    /**
     * Delete post
     *
     * @param \App\Models\Post $post post to delete
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $user = Auth::user();
        
        if ($user->id == $post->user_id) {
            $post->load('user.userinfo');
            $post->delete();
        } else {
            throw new AuthenticationException();
        }
        return $this->showOne($post, Response::HTTP_OK);
    }
}
