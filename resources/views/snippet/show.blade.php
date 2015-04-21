@extends('app')

@section('content')
    <div class="item-wrapper">
        <div class="item-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="item-title">
                            <h1>{{{ $snippet->title }}}</h1>
                        </div>
                        <div class="tags">
                            <ul class="list-inline">
                                @foreach($snippet->tags as $tag)
                                    <li>
                                        <a href="" class="btn btn-default btn-xs">{{{ $tag['tag'] }}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="snippet-formed-user">
                            @if($snippet->users['id'] === Auth::user()->id)
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-sm">投稿を編集</button>
                                    <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-cog"></i>
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">投稿を削除</a></li>
                                    </ul>
                                </div>
                            @endif
                            <span>
                                {{{ $snippet->users['name'] }}}が{{{ $snippet->created_at->format('Y/m/d') }}}に投稿
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="item-stock-view">
                            <ul class="list-inline text-center">
                                <li class="stock-list">
                                    <div class="stock-count">
                                        <i class="fa fa-folder-o"></i>
                                        <span class="count-num">0</span>
                                    </div>
                                    <div class="stock-count-text">
                                        <span>ストック</span>
                                    </div>
                                </li>
                                <li class="comment-list">
                                    <div class="comment-count">
                                        <i class="fa fa-comment-o"></i>
                                        <span class="count-num">0</span>
                                    </div>
                                    <div class="comment-count-text">
                                        <span>コメント</span>
                                    </div>
                                </li>
                            </ul>
                            <form>
                                <button class="btn btn-default btn-block"><i class="fa fa-folder-o"></i>ストックする</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-body">
            <div class="container">
                {!! $snippet->body !!}
            </div>
        </div>
    </div>
@endsection
