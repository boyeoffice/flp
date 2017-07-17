<?php

namespace Boye\Http\Controllers;

use Illuminate\Http\Request;
use Boye\Page;
use Auth;
use Image;
use URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index.home');
    }
    public function getPages() 
    {
        return view('index.pages');
    }
    public function getPage($slug)
    {
        $key = Page::where('slug',$slug)->first();
        return view('index', ['key' => $key]);
    }
    public function updatePage(Request $request, $id)
    {
        //dd($request);
        $page = Page::find($id);
        $page->title = $request->get('title');
        $page->content = $request->get('content');
        $page->slug = str_slug($page->title);
        $page->update();
        return redirect('home/pages');
    }
    public function getEditPage($id)
    {
        $page = Page::find($id);
        return view('pages.edit', ['page' => $page]);
    }
    public function postEditPage(Request $request,$id)
    {
        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->slug = str_slug($page->title);
        $page->update();
        return redirect('dashboard/pages');
    }
     public function uploadImage(Request $request)
    {
        $data = [
            'success' => false,
            'msg' => 'Failed!',
            'file_path' => ''
        ];

        if ($file = $request->file('upload_file'))
        {
            $fileName        = $file->getClientOriginalName();
            $extension       = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = '/images/' . date("Ym", time()) .'/'.date("d", time()) .'/'. Auth::user()->id;
           $destinationPath = public_path() . $folderName;
            $safeName        = str_random(10).'.'.$extension;
            $file->move($destinationPath, $safeName);
        
            $data['file_path'] = url('/') . $folderName .'/'. $safeName;
            $data['msg'] = "Succeeded!";
            $data['success'] = true;
        }
        return $data;
    }
}
