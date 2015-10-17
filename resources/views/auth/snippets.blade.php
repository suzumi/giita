@extends('app')

@section('title')
    {{ $user->name }}の投稿
@endsection

@section('content')
<div class="animsition">
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
                        <a href="/settings/account" class="btn u-btn">プロフィールを編集する</a>
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
                        <a href="/users/{{ $user->id }}">{{ $user->name }}</a> / 投稿した一覧
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="stocks-wrapper">
            <div>
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="/users/{{ $user->id }}/items">投稿した一覧</a></li>
                    <li role="presentation"><a href="/users/{{ $user->id }}/stocks">ストックした一覧</a></li>
                </ul>
            </div>
            <ul class="mypage-knowledge-list">
                @foreach($snippets as $snippet)
                    @if($snippet->id != null)
                        <li>
                            <img class="blue-knowledge-list-thumb img-rounded" src="/{{ $snippet->thumbnail }}" alt="">
                            <div class="blue-knowledge-list-info">
                                <a href="/snippet/{{ $snippet->id }}" class="blue-knowledge-list-title">{{ $snippet->title }}</a>
                                {{--<ul class="list-inline">--}}
                                {{--@foreach($snippet->tags as $tag)--}}
                                {{--<li>--}}
                                {{--<a href="" class="btn btn-default btn-xs">{{{ $tag['tag'] }}}</a>--}}
                                {{--</li>--}}
                                {{--@endforeach--}}
                                {{--</ul>--}}
                                <p class="blue-knowledge-list-name">
                                    {{ $snippet->created_at }}に投稿
                                </p>
                            </div>
                        </li>
                    @else
                        <div>
                            <p class="no-post-yet">ストックがまだありません</p>
                            <p class="">お気に入りのスニペットをストックしましょう！</p>
                        </div>
                    @endif
                @endforeach
            </ul>
            {!! $snippets->render() !!}
        </div>
    </div>
</div>
@endsection