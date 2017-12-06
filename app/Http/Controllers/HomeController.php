<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Forum;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $forums = Forum::all(); 显示全部 
        $forums = Forum::orderBy('updated_at', 'desc')->with("user")->paginate(4); //分页 一页只显示 一条数据
        return view('home')->with('forums',$forums);
    }
    public function my(Request $request)
    {
        $forums = Forum::where('user_id',$request->user()->id)->orderBy('updated_at', 'desc')->paginate(4);
        return view('my')->with('forums',$forums);
    }
}
