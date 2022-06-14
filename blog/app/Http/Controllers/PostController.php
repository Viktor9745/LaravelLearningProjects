<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use const http\Client\Curl\POSTREDIR_301;

class PostController extends Controller
{
    public function postsbyCategory(Category $category)
    {
        $cats = Category::all();
        $posts = $category->posts;
        return  view('posts.index', ['myposts'=>$posts, 'cats'=>$cats]);
    }
    public function index()
    {


        $allposts = Post::with('category')->get();
        $cats = Category::all();

        return  view('posts.index', ['myposts'=>$allposts, 'cats'=>$cats]);
    }

    public function create()
    {
        $cats=Category::all();
        return  view('posts.create',['cats'=>$cats]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required', 'string',  'max:30'],
            'content'=>['required', 'string'],
            'category_id'=>['required', 'integer', 'exists:categories,id'],
        ]);
        Post::create([
            'title' => $request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::user()->id,
        ]);

        return redirect()->route('posts.index')->with('message','Post created successfully');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post'=>$post]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $cats=Category::all();
        return view('posts.edit',['post'=>$post,'cats'=>$cats]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');

    }
}
