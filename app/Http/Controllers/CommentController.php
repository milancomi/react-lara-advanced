<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Comment;

class CommentController extends Controller
{
    public function index($storyId)
    {
        $story = Story::with(['comments'])
            ->where('id', $storyId)
            ->first();

        return response($story->comments, 200);
    }

    public function create(Request $request)
    {
        $postData = $this->validate($request, [
            'comment' => 'required',
            'storyId' => 'required|exists:stories,id',
        ]);

        $story = Story::findOrFail($postData['storyId']);

        $comment = $story->comments()->create([
            'body' => $postData['comment'],
            'user_id' => $request->user()->id,
        ]);

        $comment = Comment::where('id', $comment->id)
            ->with(['creator'])
            ->first();

        return response($comment, 201);
    }
}
