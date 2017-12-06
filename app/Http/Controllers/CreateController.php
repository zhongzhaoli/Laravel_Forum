<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Forum;

class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            return view('create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $forum = new Forum;
        $forum->title = $request->get("title");
        $forum->content = $request->get("content");
        $forum->user_id = $request->user()->id;
        if($forum->save()){
            return redirect('/');
        }
        else{
            return redirect()->back()->withInput()->withErrors('保存信息失败！');
        }
        
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
        $forums = Forum::find($id);
        return view('update')->with('forums',$forums);
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
        // 数据验证
        $this->validate($request, [
            'title' => 'required|max:255', // 必填、在 articles 表中唯一、最大长度 255
            'content' => 'required', // 必填
        ]);

        $article          = Forum::findOrFail($id);
        $article->title   = $request->get('title');
        $article->content    = $request->get('content');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('/my');
        } else {
            return redirect()->back()->withInput()->withErrors('保存信息失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Forum::find($id)->delete();
        return "success";
    }
}
