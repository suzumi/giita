@extends('app')

@section('content')
<div class="container">
    <div class="row mypage">
        <div class="col-md-3 mypage-user">
            <!-- 左側 -->
            <img src="/{{ $user->thumbnail }}" class="mypage-user-thumb img-rounded">
            {{--<div style="backgrund-image: url(data:image/jpg;base64,{{{ $user->thumbnail }}});" class="mypage-user-thumb"></div>--}}
            @if($user->github)
                <a href="https://github.com/{{ $user->github }}" class="mypage-user-account" target="_blank"><i class="fa fa-github u-mr8"></i>GitHub</a>
            @endif
            @if($user->twitter)
                <a href="https://twitter.com/{{ $user->twitter }}" class="mypage-user-account" target="_blank"><i class="fa fa-twitter u-mr8"></i>Twitter</a>
            @endif
        </div>
        <div class="col-md-9">
            <!-- 右側 -->
            <div class="mypage-user-profile">
                <p class="mypage-user-name">{{{ $user->name }}}</p>
                <div class="mypage-user-edit-btn">
                    @if(Auth::user()->id === $user->id)
                    <a href="/settings/account" class="btn btn-info">プロフィールを編集する</a>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <h1 class="glanceyear-header">Snippet Activity
                    <span class="glanceyear-quantity"></span>
                </h1>
                <div class="glanceyear-content" id="js-glanceyear">
                </div>

                <div class="glanceyear-summary">
                    <div class="glanceyear-legend">
                        Less&nbsp;
                        <span style="background-color: #eee"></span>
                        <span style="background-color: #c3dbda"></span>
                        <span style="background-color: #5caeaa"></span>
                        <span style="background-color: #277672"></span>
                        &nbsp;More
                    </div>
                    スニペット投稿の集計です  <br>
                    <span id="debug"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mypage-snippet-area">
    <div class="container">
        <div class="col-sm-12 mypage-snippet-list-wrapper">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#snippets-list" data-toggle="tab">投稿した一覧</a></li>
                <li ><a href="#stock-list" data-toggle="tab">ストックした一覧</a></li>
            </ul>
            <div class="tab-content">
                <!--投稿した一覧-->
                <div class="tab-pane fade in active" id="snippets-list">
                    <ul class="mypage-knowledge-list">
                        @if($snippets)
                            @foreach($snippets as $snippet)
                                <li>
                                    <img class="blue-knowledge-list-thumb img-rounded" src="/{{ $snippet->thumbnail }}" alt="">
                                    <div class="blue-knowledge-list-info">
                                        <a href="/snippet/{{{ $snippet->id }}}" class="blue-knowledge-list-title">{{{ $snippet->title }}}</a>
                                        {{--<ul class="list-inline">--}}
                                        {{--@foreach($snippet->tags as $tag)--}}
                                        {{--<li>--}}
                                        {{--<a href="" class="btn btn-default btn-xs">{{{ $tag['tag'] }}}</a>--}}
                                        {{--</li>--}}
                                        {{--@endforeach--}}
                                        {{--</ul>--}}
                                        <p class="blue-knowledge-list-name">{{{ $snippet->created_at }}}に投稿</p>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div>
                                <p class="no-post-yet">投稿がまだありません</p>
                                <p class="">あなたの知見を共有しましょう！</p>
                            </div>
                        @endif
                    </ul>
                        @if(count($snippets) >= 5)
                            <a href="/users/{{ $user->id }}/items" class="btn btn-default btn-block">もっと見る</a>
                        @endif
                </div>
                <!--ストックした一覧-->
                <div class="tab-pane fade" id="stock-list">
                    <ul class="mypage-knowledge-list">
                        @if($stocks)
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
                        @else
                            <div>
                                <p class="no-post-yet">ストックがまだありません</p>
                                <p class="">お気に入りの投稿をストックしましょう！</p>
                            </div>
                        @endif
                    </ul>
                        @if(count($stocks) >= 5)
                            <a href="/users/{{ $user->id }}/stocks" class="btn btn-default btn-block">もっと見る</a>
                        @endif
                </div>
            </div>
        </div>
        {{--<div class="col-sm-5 mypage-popular-list-wrapper">--}}
            {{--<div class="panel panel-info">--}}
                {{--<div class="panel-heading">--}}
                    {{--<div class="panel-title">人気の投稿</div>--}}
                {{--</div>--}}
                {{--<div class="panel-body">ここがパネルに記載する本文</div>--}}
                {{--<ul class="list-group">--}}
                    {{--@if($snippets)--}}
                        {{--@foreach($snippets as $snippet)--}}
                        {{--<li class="list-group-item">--}}
                            {{--<i class="fa fa-folder-o"></i><strong class="mypage-stock-count">40</strong><span>ストック</span>--}}
                            {{--<div class="blue-knowledge-list-info">--}}
                                {{--<a href="/snippet/{{{ $snippet->id }}}" class="blue-knowledge-list-title">{{{ $snippet->title }}}</a>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--@endforeach--}}
                    {{--@else--}}
                        {{--<li class="list-group-item">--}}
                            {{--<p>まだ人気の記事はありません</p>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/js/activity.js') }}"></script>
@endsection