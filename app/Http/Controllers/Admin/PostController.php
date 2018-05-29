<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request content
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = config('define.post.limit_rows');
        $posts = Post::when(isset($request->post_status), function ($query) use ($request) {
            return $query->where('status', '=', $request->post_status);
        })
        ->with(['user' => function ($query) {
            return $query->with('userInfo');
        },'product']);
        \DB::enableQueryLog();
        if (isset($request->sortBy) && isset($request->dir)) {
            $postSort = $posts->join('users', 'posts.user_id', 'users.id')
                        ->join('products', 'posts.product_id', 'products.id')
                        ->orderBy($request->sortBy, $request->dir)
                        ->paginate($perPage);
            $postSort->appends(request()->query());
            // dd($postSort);
            $data['posts'] = $postSort;
        } else {
            $posts = $posts->orderBy('id', 'desc')->paginate($perPage);
            $posts->appends(request()->query());
            $data['posts'] = $posts;
        }
        // dd(\DB::getQueryLog());

        return view('admin.pages.posts.index', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      post id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $perPage = config('define.post.limit_rows');
        $post = Post::with(['user' => function ($query) {
            return $query->with('userInfo');
        }, 'product'])->find($id);
        $comments = $post->comments()->when(isset($request->content), function ($query) use ($request) {
            return $query->where('content', 'like', "%$request->content%");
        })
        ->with('user')->paginate($perPage);
        $comments->appends(request()->query());
        $data['post'] = $post;
        $data['comments'] = $comments;
        return view('admin.pages.posts.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id post id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            $post->delete();
            session(['message' => __('post.admin.form.deleted')]);
            return redirect()->route('admin.posts.index');
        } else {
            session(['message' => __('post.admin.form.id_not_found')]);
        }
    }
}
