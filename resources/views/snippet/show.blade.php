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
                        <div class="tag-list">
                            <ul class="list-inline">
                                @foreach($snippet->tags as $tag)
                                    <li>
                                        <a href="/tags/{{{ $tag['tag'] }}}"
                                           class="btn btn-default btn-xs btn-noborder">{{{ $tag['tag'] }}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="snippet-formed-user">
                            @if($snippet->users['id'] === Auth::user()->id)
                                <div class="btn-group">
                                    <a href="/snippet/{{{ $snippet->id }}}/edit" class="btn btn-warning btn-sm">
                                        投稿を編集
                                    </a>
                                    <button type="button" class="btn btn-warning dropdown-toggle btn-sm"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-cog"></i>
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            {!!
                                            Form::open(['route'=>['snippet.destroy',$snippet->id],'method'=>'DELETE'])
                                            !!}
                                            <button class="dropdown-form-button">投稿を削除</button>
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            <span>
                                <img src="/{{$snippet->users['thumbnail']}}" class="snippet-user-thumb img-rounded"><a
                                        href="/users/{{ $snippet->users['id'] }}"
                                        class="snippet-user-name">{{{ $snippet->users['name'] }}}</a>が{{{ $snippet->created_at->format('Y/m/d H:i') }}}
                                に投稿
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
                            <form class="js-stock-form">
                                <span class="js-stock-btn">
                                    <button class="btn btn-default btn-block js-spinner"><i class="fa fa-folder-o"></i>ストックする
                                    </button>
                                </span>
                                <input type="hidden" name="snippetId" value="{{ $snippet->id }}">
                                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-body">
            <div class="container">
                {!! $snippet->body !!}
                <div class="text-advertisement">
                    <span class="label label-info">PR</span>
                    <a target="_blank" id="ad-48" href="http://engineer.blue-corporation.jp/">blueエンジニアブログで記事を発信しよう - Blue enginner blog</a>
                </div>
                <div class="item-comment">
                    <div class="comment-form-header">
                        <img src="/{{ Auth::user()->thumbnail }}" class="comment-form-icon img-rounded">
                        <div class="comment-form-title">コメントを投稿する</div>
                    </div>
                    <div class="comment-form-content">
                        <div class="comment-form-tabs">
                            <button class="comment-form-tab is-active">編集</button>
                            <button class="comment-form-tab">プレビュー</button>
                        </div>
                        <div class="comment-form-content-tab-content">
                            <textarea rows="4" placeholder="コメントを入力してください。" class="comment-form-textarea" name=""></textarea>
                            <div class="markdown-content" style="display: none;"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary js-submit-btn" style="float: right;">投稿する</button>
                </div>
            </div>
        </div>
    </div>
@endsection
