<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogPostController extends Controller{

    public function index(){
        return BlogResource::collection(Blog::with('post_categories')->get());
    }

    public function store(Request $request){
        $blog = Blog::create($request->validated());
        return new BlogResource($blog);
    }

    public function show($id){
        //
    }


    public function update(Request $request, Blog $post)
    {
        $post->update($request->validated());
        return new BlogResource($post);
    }

    public function destroy(Blog $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
