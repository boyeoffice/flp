<?php

namespace Boye\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Boye\Post;
use Boye\User;
use Auth;
use Boye\Visitor;
use Image;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user = $request->user();
        return response()
            ->json([
                'model' => Post::where('user_id', $user->id)->with('visits')->filterPaginateOrder()
            ]);
    }
    public function uploadImage(Request $request)
    {
        $this->validate($request, [
            'image_upload' => 'required',
            ]);
        if($request->hasFile('image_upload')){
            $image = $request->file('image_upload');
            $filename = str_random() . '.' . $image->getClientOriginalExtension() ?: 'png';
            $path = public_path('/content/');
            File::makeDirectory($path, $mode = 0777, true, true);
            $location = $path . '/' . $filename;
            Image::make($image)->resize(600,400)->save($location);
            $link = url('/') . '/content/' . $filename;
        }
        return response()->json(['link' => $link]);
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
            'title' => 'required|min:5|unique:posts',
            'content' => 'required'
            ]);
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = time().'-'.str_slug($request->title);
        $post->image = 'default.jpg';
        $post->save();
        return response()->json(['success' => true]);

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
        return response()->json($post);
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
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required'
            ]);
         $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->update();
        return response()->json(['success' => true]);
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
