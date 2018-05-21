<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
        $comments = Post::find($id)->comments()->when(isset($request->content), function ($query) use ($request) {
            return $query->where('content', 'like', "%$request->content%");
        })
        ->with('user')->paginate($perPage);
        $comments->appends(request()->query());
        $data['comments'] = $comments;
        $data['post_id'] = $id;
        return view('admin.pages.posts.show', $data);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showComments()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showReviews()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id post id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      post id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
        dd($id);
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
        dd($id);
    }
}
