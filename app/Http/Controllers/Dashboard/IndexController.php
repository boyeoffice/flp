<?php

namespace Boye\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Boye\Post;
use Boye\User;
use Boye\Page;
use Boye\Visitor;
use Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
    	if(Auth::user()->status == 1)
    	{
    		return view('dashboard');
    	}else{
           return redirect('home');
    	}

    }
    public function stastitics(Request $request)
    {
    	$user = $request->user();
         $posts = Post::where('user_id', $user->id)->count();
         $pages = Page::where('user_id', $user->id)->count();
         return response()->json(['posts' => $posts, 'pages' => $pages]);
    }
}
