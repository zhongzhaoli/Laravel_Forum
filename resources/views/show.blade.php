<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/show.css">
    <link rel="stylesheet" href="../css/editormd.css">
    <link rel="stylesheet" href="../css/codemirror.min.css">
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/editormd.js"></script>
    <script src="../js/codemirror.min.js"></script>
    <script src="../js/show.js"></script>

<script src="../js/editor/lib/marked.min.js"></script>
<script src="../js/editor/lib/prettify.min.js"></script>
<script src="../js/editor/lib/raphael.min.js"></script>
<script src="../js/editor/lib/underscore.min.js"></script>
<script src="../js/editor/lib/sequence-diagram.min.js"></script>
<script src="../js/editor/lib/flowchart.min.js"></script>
<script src="../js/editor/lib/jquery.flowchart.min.js"></script>
    <title>详细</title>
</head>
<body>
@extends('layouts.app')
    @section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body panel_body">
                    <h3>{{ $forum->title }}</h3>
                    <br>
                    
                    <div id="editormds" class="editormds">
                        <textarea style="display:none;" name="markdown">{{  $forum->content  }}</textarea>
        		</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding-left:18px;padding-right:18px;">
        <form action="/comment" method="post">
            {!! csrf_field() !!}
            <input type="hidden" value="{{ $forum->id }}" name="event_id">
            <div class="col-md-10 col-md-offset-1 comment_send">
                <img src="../@if(Auth::user()){{ Auth::user()->photo }}@else{{ 'images/mr_photo.png' }}@endif" width="45px" height="45px" alt="">
                <div style="width:100%;">
                    @if(Auth::user())
                        <textarea class="form-control" id="" cols="30" rows="4" placeholder="写下你的评论..." name="content"></textarea>
                    @else
                        <input type="text" class="form-control pla_login" disabled placeholder="请登录">
                    @endif
                    <div class="texta_btn_div">
                        <div style="display: flex;width: 100%;align-items: center;justify-content: space-between;">
                        @if(Auth::user())
                            @if( Auth::user()->nickname)
                                <span>用户名：{{ Auth::user()->nickname }}</span>
                            @else
                            <span>用户名：{{ Auth::user()->email }}</span>
                            @endif
                        <button type="button" onclick="send_comment(this)" class="btn btn-success">发表评论</button>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="row" style="padding-left:18px;padding-right:18px;">
        @foreach ($comment as $comments)
            <div class="col-md-10 col-md-offset-1 comment_div">
                <img class="comment_photo" src="../{{ $comments->user->photo }}" alt="" width="45px" height="45px">
                <span>
                    @if($comments->user->nickname)
                        {{ $comments->user->nickname }}：{{ $comments->content }}
                    @else
                        {{ $comments->user->email }} ：{{$comments->content}}
                    @endif
                </span>
            </div>
            @if($loop->last)

            @else
                <div class="col-md-10 col-md-offset-1 down_l_parent">
                    <div class="comment_down_l"></div>
                </div>
            @endif
        @endforeach
    </div>
    <br>
    <div style="text-align:center">共{{ $count }}条评论</div>
    <br>
</div>
    @endsection
</body>
<script>
  var testEditor;
  $(function () {
      var editor = editormd.markdownToHTML("editormds", {
        path : "../js/editor/lib/", 
      });
  });  
</script>
</html>