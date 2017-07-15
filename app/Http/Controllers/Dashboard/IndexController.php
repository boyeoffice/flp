<?php

namespace Boye\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	return view('dashboard.index');
    }
}
