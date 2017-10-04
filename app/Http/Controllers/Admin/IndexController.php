<?php

namespace Boye\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Auth;
use Boye\User;
use Boye\Post;
use Boye\Visitor;
use Boye\Category;
use Boye\Page;
use Boye\PageView;

class IndexController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }
    public function stastitics(Request $request)
    {
         $posts = Post::all()->count();
         $pages = Page::all()->count();
         $postView = Visitor::all()->count();
         $pageView = PageView::all()->count();
         $data = compact(['posts', 'pages', 'postView', 'pageView']);
         return response()->json($data);
    }
    public function getPost()
    {
        $posts = Post::orderBy('created_at', 'desc')->with('user', 'visits')->get();
        return response()->json($posts);
    }
    public function getPage()
    {
        $pages = Page::orderBy('created_at', 'desc')->with(['user','pageView'])->get();
        return response()->json($pages);
    }
}
