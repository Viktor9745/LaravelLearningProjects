<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        Comment::create([
            'text'=>$request->text,
            'post_id'=>$request->post_id,
            'user_id'=>Auth::id(),
        ]);

        return redirect()->back()->with('message', 'Comment is created');
    }

    public function destroy(Comment $comment){
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('message', 'The comment was deleted successfully');
    }
}
