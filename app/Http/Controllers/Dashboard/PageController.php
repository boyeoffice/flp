<?php

namespace Boye\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Boye\Visitor;
use Boye\Page;
use Boye\User;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.index');
    }
    public function getPages(Request $request)
    {
        $user = $request->user();
        $data = Page::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $page = new Page();
        $page->title = $request->get('title');
        $page->content = $request->input('content');
        $page->slug = str_slug($page->title);
        $page->user_id = Auth::user()->id;
        $page->save();
         return redirect('dashboard/pages');
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
        $page = Page::find($id);
        return view('dashboard.pages.edit')->withPage($page);
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
        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->slug = str_slug($page->title);
        $page->update();
        return redirect('dashboard/pages');
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
