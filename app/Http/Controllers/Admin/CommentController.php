<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id comment id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            session(['message' => __('post.admin.form.deleted')]);
        } catch (ModelNotFoundException $e) {
            session(['message' => __('post.admin.form.id_not_found')]);
        } finally {
            return redirect()->back();
        }
    }
}
