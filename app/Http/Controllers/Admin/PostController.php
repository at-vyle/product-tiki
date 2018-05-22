<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $posts = Post::when(isset($request->content), function ($query) use ($request) {
            return $query->where('content', 'like', "%$request->content%");
        })->when(isset($request->post_status), function ($query) use ($request) {
            return $query->where('status', '=', $request->post_status);
        })
        ->with(['user','product'])->paginate($perPage);
        $posts->appends(request()->query());
        $data['posts'] = $posts;
        return view('admin.pages.posts.index', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id post id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perPage = config('define.post.limit_rows');
        $comments = Post::find($id)->comments()->with('user')->paginate($perPage);
        $data['comments'] = $comments;
        $data['post_id'] = $id;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $postId post id
     * @param int $id     comment id
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteComment($postId, $id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment) {
            $comment->delete();
            session(['message' => __('post.admin.form.deleted')]);
            return redirect()->route('admin.posts.show', ['id' => $postId]);
        } else {
            session(['message' => __('post.admin.form.id_not_found')]);
        }
    }
}
