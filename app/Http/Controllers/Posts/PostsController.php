<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = auth()->user()->posts->sortByDesc('');
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function put(Request $request, Post $post)
    {

        $post->create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        flash('New post added!')->success();
        return redirect('posts');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        $post->save();
        flash('Post updated!')->success();
        return redirect('/posts');
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        flash('Post deleted!')->success();
        return redirect()->back();
    }
}