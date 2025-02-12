<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllBlogs()
    {
        return Blog::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insertBlog(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog = Blog::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'user_id' => auth()->id(),
        ]);

        return response()->json($blog, 201);
    }

    /**
     * Display the specified resource.
     */
    public function showBlog(string $id)
    {
        return $blog;
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBlog(Request $request, string $id)
    {
        $this->authorize('update', $blog);

        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $blog->update($validatedData);

        return response()->json($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyBlog(string $id)
    {
        $this->authorize('delete', $blog);

        $blog->delete();

        return response()->json(null, 204);
    }
}
