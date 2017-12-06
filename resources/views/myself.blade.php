<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/myself.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="../js/myself.js"></script>
    <title>Document</title>
</head>
<body>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>修改失败</strong>&nbsp;&nbsp;{!! implode('<br>', $errors->all()) !!}
        </div>
     @endif

    @if (session('status'))
        <div class="alert alert-succ">
            <strong>修改成功</strong>
        </div>
    @endif

        <form action="/myself/{{ Auth::user()->id }}" method="post" class="col-lg-4 col-lg-offset-4 myself_form" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}
            <div class="photo">
                <img src="{{ $user->photo }}" alt="">
            </div>
            <br>
            <div class="col-lg-12 col-md-12">
                <input type="file" name="photo" style="display:none" onchange="photo_change(this)">
                <input type="text" name="nickname" class="form-control" required="required" placeholder="昵称" value="{{ $user->nickname }}">
                <br>
                <textarea name="mood" rows="5" class="form-control" required="required" placeholder="个性签名">{{ $user->mood }}</textarea>
                <br>
                <button class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12">提交</button>
            </div>
        </form>
    </div>
</div>
@endsection
</body>
</html>