<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Comment;

class CommentsController extends Controller {

    public function listAction() {
        $comments = Comment::orderBy('created_at', 'asc')->get();

        return response()->json($comments);
    }

    public function createAction() {
        $comment = new Comment();

        $comment->comment = request()->input('comment');
        $comment->parent = request()->input('parent');

        $comment->save();

        return 'OK';
    }

    public function editAction($id) {
        $comment = Comment::find($id);

        $comment->comment = request()->input('comment');

        $comment->save();

        return 'OK';
    }

    public function deleteAction($id) {
        $comment = Comment::find($id);

        $comment->delete();

        return 'OK';
    }

}
