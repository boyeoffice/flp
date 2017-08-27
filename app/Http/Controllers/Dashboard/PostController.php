<?php

namespace Boye\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Boye\Post;
use Boye\User;
use Auth;
use Boye\Visitor;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }
    public function getPost(Request $request)
    {
        $user = $request->user();
        $posts = Post::where('user_id', $user->id)->with('visits')->orderBy('created_at', 'desc')->get();
        //$visit = Visitor::where('post_id', '=', $posts->id)->count();
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
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
            'content' => 'required'
            ]);
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = str_slug($request->title);
        $post->image = 'default.jpg';
        $post->save();
        return redirect('dashboard/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('dashboard.posts.edit')->withPost($post);
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
         $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = str_slug($request->title);
        $post->update();
        return redirect('dashboard/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
