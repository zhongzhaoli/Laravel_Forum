<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/create.css">
    <link rel="stylesheet" href="../../css/editormd.css">
    <link rel="stylesheet" href="../../css/codemirror.min.css">
    <script src="../../js/jquery-1.11.3.min.js"></script>
    <script src="../../js/editormd.js"></script>
    <script src="../../js/codemirror.min.js"></script>
    <title>修改文章</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">修改一篇文章</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>修改失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="/create/{{ $forums->id }}" method="POST">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{ $forums->title }}">
                        <br>
                        <div id="test-editormd" class="test-editormd">
                            <textarea name="content" rows="10" class="form-control" required="required" placeholder="请输入内容">{{  $forums->content  }}</textarea>
                        </div>
                        <br>
                        <div class="form_btn">
                            <button type="submit" data-btn class="btn btn-primarys">提交</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
<script>
    var testEditor;
    $(function() {
        testEditor = editormd("test-editormd", {
            width   : "100%",
            height  : 640,
            syncScrolling : "single",
            path    : "../../lib/",
            watch : false,
            placeholder : "输入内容..."
        });
    });
</script>

<script src="../../js/create.js"></script>
</html>