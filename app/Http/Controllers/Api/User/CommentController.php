<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Response;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Auth\AuthenticationException;
use App\Http\Requests\CreateCommentsRequest;
use Auth;

class CommentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Post         $post    post to get commments
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Request $request)
    {
        $perPage = isset($request->perpage) ? $request->perpage : config('define.post.limit_rows');

        $comments = Comment::with(['user.userInfo'])->where('post_id', $post->id)->orderBy('id', 'DESC')->paginate($perPage);
        foreach ($comments as $comment) {
            $comment['image_path'] = config('app.url').config('define.images_path_users');
        }
        $data = $this->formatPaginate($comments);

        return $this->showAll($data, Response::HTTP_OK);
    }

    /**
     * Delete comment
     *
     * @param \App\Models\Comment $comments comment to delete
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Comment $comments)
    {
        $user = Auth::user();
        if ($user->id == $comments->user_id) {
            $comments->load('user.userinfo');
            $comments->delete();
        } else {
            throw new AuthenticationException();
        }

        return $this->showOne($comments, Response::HTTP_OK);
    }

    /**
     * Update comment
     *
     * @param \App\Models\Comment                    $comments comment to update
     * @param App\Http\Requests\UpdateCommentRequest $request  request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Comment $comments, UpdateCommentRequest $request)
    {
        $user = Auth::user();
        if ($user->id == $comments->user_id) {
            $comments->content = $request->content;
            $comments->load('user.userinfo');
            $comments->save();
        } else {
            throw new AuthenticationException();
        }

        return $this->showOne($comments, Response::HTTP_OK);
    }
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Post                         $post    post to get commments
     * @param \App\Http\Requests\CreateCommentsRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, CreateCommentsRequest $request)
    {
        $user = Auth::user();
        $input['content'] = $request['content'];
        $input['user_id'] = $user->id;
        $input['post_id'] = $post->id;

        $comment = Comment::create($input);
        $comment->load(['user.userinfo']);
        return $this->showOne($comment, Response::HTTP_OK);
    }
}
