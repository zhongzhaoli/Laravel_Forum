<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>首页</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading panel_flex">
                    <div>文章列表</div>
                    <a href="{{ url('create') }}" class="add_hover">
                        <div class="add_panel">
                            <span>+</span>
                        </div>
                    </a>
                </div>
                @foreach ($forums as $forum)
                    <div class="col-lg-12 card">
                    <div class="my_title_dele">
                        <a href="{{ url('/show/'.$forum->id) }}">
                            <span class="index_title">{{ $forum->title }}</span>
                        </a>
                    </div>
                        <div class="content">{{ $forum->content }}</div>
                        <div class="create_time">
                            <span>
                                <img src="{{ $forum->user->photo }}" />
                                @if($forum->user->nickname)
                                    {{ $forum->user->nickname }}
                                @else
                                    {{ $forum->user->email }}
                                @endif

                            </span>
                            <span>{{ $forum->updated_at }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div style="text-align:center">{!! $forums->links() !!}</div>
</div>
@endsection
</body>
</html>

