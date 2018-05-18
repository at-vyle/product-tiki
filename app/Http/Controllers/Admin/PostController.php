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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = config('define.post.limit_rows');
        $posts = Post::with(['user', 'product'])->paginate($perPage);
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
     * @param int $id post id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
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
     * @param int $id post id to change status
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();
        session(['message' => __('post.admin.form.updated')]);
        // return redirect()->route('admin.posts.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id post id to change status
     *
     * @return array status code
     */
    public function changeStatus($id)
    {
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();
        $data['status'] = (int) $post->status;
        $data['msg'] = __('post.admin.form.updated');
        return $data;
        // return redirect()->route('admin.posts.index');
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
        $post->delete();
        session(['message' => __('post.admin.form.deleted')]);
        return redirect()->route('admin.posts.index');
    }
}
