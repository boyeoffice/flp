<?php

namespace Boye\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Boye\Post;
use Boye\User;
use Boye\Page;
use Boye\Visitor;

class IndexController extends Controller
{
    public function index()
    {
    	return view('dashboard.index');
    }
    public function stastitics(Request $request)
    {
    	$user = $request->user();
         $posts = Post::where('user_id', $user->id)->count();
         $pages = Page::where('user_id', $user->id)->count();
         $data = compact(['posts', 'pages']);
         return response()->json($data);
    }
}
