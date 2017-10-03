<?php

namespace Boye\Http\Controllers;

use Illuminate\Http\Request;
use Boye\Post;
use Boye\User;
use Boye\PageView;
use Auth;
use Boye\Visitor;
use Boye\Page;

class IndexController extends Controller
{
   
    public function getPost($slug)
    {
        $key = Post::where('slug',$slug)->first();
        $user_ip = $_SERVER['REMOTE_ADDR'];

        $visit = new Visitor();
        $visit->post_id = $key->id;
        $visit->ip = $user_ip;
        $visit->country = $user_ip;
        $visit->save();
        return view('index', ['key' => $key]);
    }
     public function getPage($slug)
    {
        $key = Page::where('slug',$slug)->first();
        $user_ip = $_SERVER['REMOTE_ADDR'];

        $visit = new PageView();
        $visit->page_id = $key->id;
        $visit->ip = $user_ip;
        $visit->country = $user_ip;
        $visit->save();
        return view('index', ['key' => $key]);
    }
    
}
