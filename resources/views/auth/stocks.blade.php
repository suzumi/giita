@extends('app')

@section('title')
    {{ $user->name }}がストックした投稿
@endsection

@section('content')
    <div class="user-page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 clearfix">
                    <div class="user-page-icon">
                        <img src="/{{ $user->thumbnail }}" class="img-rounded img-responsive">
                    </div>
                    <div class="user-page-name">
                        <h2>{{ $user->name }}</h2>
                    </div>
                </div>
                <div class="col-sm-4">
                    @if(Auth::user()->id == $user->id)
                        <a href="/settings/account" class="btn btn-info">プロフィールを編集する</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="user-page-ribbon">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span>
                        <a href="/users/{{ $user->id }}">{{ $user->name }}</a> / ストックした一覧
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="stocks-wrapper">
            <div>
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="/users/{{ $user->id }}/items">投稿した一覧</a></li>
                    <li role="presentation" class="active"><a href="/users/{{ $user->id }}/stocks">ストックした一覧</a></li>
                </ul>
            </div>
            @if(count($stocks) !== 0)
            <ul class="mypage-knowledge-list">
                @foreach($stocks as $stock)
                    <li>
                        <img class="blue-knowledge-list-thumb img-rounded" src="/{{ $stock->thumbnail }}" alt="">
                        <div class="blue-knowledge-list-info">
                            <a href="/snippet/{{ $stock->snippet_id }}" class="blue-knowledge-list-title">{{ $stock->title }}</a>
                            {{--<ul class="list-inline">--}}
                            {{--@foreach($snippet->tags as $tag)--}}
                            {{--<li>--}}
                            {{--<a href="" class="btn btn-default btn-xs">{{{ $tag['tag'] }}}</a>--}}
                            {{--</li>--}}
                            {{--@endforeach--}}
                            {{--</ul>--}}
                            <p class="blue-knowledge-list-name">
                                <a href="/users/{{ $stock->user_id }}">{{ $stock->name }}</a>が{{ $stock->snippet_created_at }}に投稿
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
            @else
                <div>
                    <p class="no-post-yet">ストックがまだありません</p>
                    <p class="">お気に入りの投稿をストックしましょう！</p>
                </div>
            @endif
            {!! $stocks->render() !!}
        </div>
    </div>
@endsection