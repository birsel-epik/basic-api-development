<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function getAllComments()
    {
        return $blog->comments;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insertComment(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = $blog->comments()->create([
            'content' => $validatedData['content'],
            'user_id' => auth()->id(),
        ]);

        return response()->json($comment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function showComment(Comment $comment)
    {
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateComment(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $validatedData = $request->validate([
            'content' => 'sometimes|string',
        ]);

        $comment->update($validatedData);

        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyComment(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json(null, 204);
    }
}
