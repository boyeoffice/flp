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
         $visitors = Visitor::all()->count();
         $categories = Category::all()->count();
         $data = compact(['posts', 'pages', 'visitors', 'categories']);
         return response()->json($data);
    }
    public function getPost()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
}
