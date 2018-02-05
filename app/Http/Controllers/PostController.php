<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // dd($posts);
        return view('admin.post.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $image = $request->image;
        $imageNewName = time().'-'.$image->getClientOriginalName();
        $image->move('uploads/posts', $imageNewName);

        $data = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'image' => 'uploads/posts/'.$imageNewName
        ]);

        

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // dd($request);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function trash()
    {   
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trashed')
            ->with('posts', $posts);
    }

    public function restore($id)
    {      
        Post::withTrashed()->find($id)->restore();
        return redirect()->route('post.trash');
    }

    public function kill($id)
    {   
        Post::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('post.trash');
    }
}
