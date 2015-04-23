@extends('app')

@section('content')
<div class="container">
    <div class="row mypage">
        <div class="col-md-3 mypage-user">
            <!-- 左側 -->
            <img src="data:image/jpg;base64,{{ $user->thumbnail }}" class="mypage-user-thumb img-rounded">
            {{--<div style="backgrund-image: url(data:image/jpg;base64,{{{ $user->thumbnail }}});" class="mypage-user-thumb"></div>--}}
            @if($user->github)
                <a href="{{ $user->github }}" class="mypage-user-account" target="_blank"><i class="fa fa-github u-mr8"></i>GitHub</a>
            @endif
            @if($user->twitter)
                <a href="{{ $user->twitter }}" class="mypage-user-account" target="_blank"><i class="fa fa-twitter u-mr8"></i>Twitter</a>
            @endif
        </div>
        <div class="col-md-9">
            <!-- 右側 -->
            <div class="mypage-user-profile">
                <p class="mypage-user-name">{{{ $user->name }}}</p>
                <div class="mypage-user-edit-btn">
                    @if(Auth::user()->id === $user->id)
                    <a href="" class="btn btn-info">プロフィールを編集する</a>
                    @endif
                </div>
            </div>
            {{--<p class="mypage-user-snipets"><span class="snippet-count">{{ count($snippets) }}</span>snippets</p>--}}
            {{--<div>--}}
                {{--<ul class="tag-list clearfix">--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">PHP</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">Scala</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">Play framework</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">Rails</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">Vagrant</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">Swift</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">CentOS</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">HTML</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">Objective-C</a></li>--}}
                    {{--<li><a href="#" class="btn btn-default btn-xs">CSS</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
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
        <div class="col-sm-7 mypage-snippet-list-wrapper">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#" data-toggle="tab">投稿した一覧</a></li>
                <li ><a href="#" data-toggle="tab">ストックした一覧</a></li>
            </ul>
            <ul class="mypage-knowledge-list">
                @if($snippets)
                    @foreach($snippets as $snippet)
                        <li>
                            <img class="blue-knowledge-list-thumb img-rounded" src="data:image/jpeg;base64,{{ $snippet->thumbnail }}" alt="">
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
                        <p>まだ投稿されていません</p>
                    </div>
                @endif
            </ul>
            @if(count($snippets) >= 5)
                <button class="btn btn-default btn-block">もっと見る</button>
            @endif
        </div>
        <div class="col-sm-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">人気の投稿</div>
                </div>
                {{--<div class="panel-body">ここがパネルに記載する本文</div>--}}
                <ul class="list-group">
                    @if($snippets)
                        @foreach($snippets as $snippet)
                        <li class="list-group-item">
                            <i class="fa fa-folder-o"></i><strong class="mypage-stock-count">40</strong><span>ストック</span>
                            <div class="blue-knowledge-list-info">
                                <a href="/snippet/{{{ $snippet->id }}}" class="blue-knowledge-list-title">{{{ $snippet->title }}}</a>
                            </div>
                        </li>
                        @endforeach
                    @else
                        <li class="list-group-item">
                            <p>まだ人気の記事はありません</p>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection