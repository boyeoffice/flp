<?php

namespace Boye\Http\Controllers;

use Illuminate\Http\Request;
use Boye\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
    public function getPage($id)
    {
        $page = Page::find($id);
        return view('index.edit_page', ['page' => $page]);
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
}
