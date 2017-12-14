<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    public function userindex(Request $request)
    {
        if (!$request->session()->has('user'))
            return redirect('/posts')->with('error', "Unauthorized, please log in");

        $user = $request->session()->get('user');
        $posts = Post::where('user_id', $user->id)->orderBy('updated_at')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->session()->has('user'))
            return redirect('/posts')->with('error', "Must be logged in to create a listing");
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = $request->session()->get('user')->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$request->session()->has('user'))
            return redirect('/posts')->with('error', "Unauthorized, please login");

        $user = $request->session()->get('user');
        if ($user->access_level == 0 && $post->user_id != $user->id)
            return redirect('/posts')->with('error', "Unauthorized");
        
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->session()->has('user'))
            return redirect('/posts')->with('error', "Unauthorized");

        $user = $request->session()->get('user');
        if ($user->access_level == 0 && $post->user_id != $user->id)
            return redirect('/posts')->with('error', "Unauthorized");

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->session()->has('user'))
            return redirect('/posts')->with('error', "Unauthorized");

        $user = $request->session()->get('user');
        if ($user->access_level == 0 && $post->user_id != $user->id)
            return redirect('/posts')->with('error', "Unauthorized");

        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
