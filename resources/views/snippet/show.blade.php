@extends('app')

@section('title')
    {{ $snippet->title }}
@endsection

@section('content')
    <div class="item-wrapper animsition">
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
                                           class="u-tag u-tag__descript">{{{ $tag['tag'] }}}</a>
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
                                            <button class="dropdown-form-button js-snippet-delete"><i
                                                        class="fa fa-trash-o"></i>投稿を削除
                                            </button>
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            <span>
                                <a href="/users/{{ $snippet->users['id'] }}"><img
                                            src="{{$snippet->users['thumbnail']}}"
                                            class="snippet-user-thumb img-rounded"></a>
                                <a href="/users/{{ $snippet->users['id'] }}"
                                   class="snippet-user-name">{{{ $snippet->users['name'] }}}</a>が{{{ $snippet->created_at->format('Y/m/d H:i') }}}
                                に投稿
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="item-stock-view">
                            <ul class="list-inline text-center stock-list-wrapper">
                                <li class="stock-list">
                                    <div class="stock-count">
                                        <i class="fa fa-folder-o"></i>
                                        <span class="count-num">{{ $stocksAndComments[0]->stock_num }}</span>
                                    </div>
                                    <div class="stock-count-text">
                                        <span>ストック</span>
                                    </div>
                                </li>
                                <li class="comment-list">
                                    <div class="comment-count">
                                        <i class="fa fa-comment-o"></i>
                                        <span class="count-num">{{ $stocksAndComments[0]->comment_num }}</span>
                                    </div>
                                    <div class="comment-count-text">
                                        <span>コメント</span>
                                    </div>
                                </li>
                            </ul>
                            <form class="js-stock-form">
                                <span class="js-stock-btn">
                                    {{--<button class="btn btn-default btn-block js-spinner"><i class="fa fa-folder-o"></i>ストックする--}}
                                    {{--</button>--}}
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
                <div class="row">
                    <div class="col-sm-9">
                        {!! $snippet->body !!}
                        <div class="gizumo-ad">
                            <span class="label u-btn">PR</span>
                            <a target="_blank" id="ad-48" href="http://54.92.125.67:8080/gitbucket/">社内のGitリポジトリはこちら！ - GitBucket</a>
                        </div>
                        <div class="comment-wrapper">
                            @foreach($parsedComment as $comment)
                                <div class="comment-form-header" id="comment-{{ $comment->comment_id }}">
                                    <img src="{{ $comment->thumbnail }}" class="comment-form-icon img-rounded">

                                    <div class="comment-form-title"><a
                                                href="/users/{{ $comment->user_id }}">{{ $comment->name }}</a></div>
                                    <time class="pull-right">{{ Carbon\Carbon::parse($comment->created_at)->format('Y/m/d H:i') }}</time>
                                    @if($comment->user_id === Auth::user()->id)
                                        <button class="btn u-btn btn-xs js-comment-edit">編集</button>
                                        {!! Form::open(['route'=>['comment.destroy',$snippet->id], 'method'=>'DELETE',
                                        'class' => 'comment-delete-form'])!!}
                                        <input type="hidden" name="comment_id" value="{{ $comment->comment_id }}">
                                        <input type="hidden" name="snippet_id" value="{{ $snippet->id }}">
                                        <button class="btn btn-danger btn-xs js-comment-delete">削除</button>
                                        {!! Form::close() !!}
                                        <div class="edit-comment-form clearfix" style="display: none">
                                            <div class="comment-form-content">
                                                <div class="comment-form-tabs">
                                                    <button class="comment-form-tab is-active js-comment-edit-form">編集
                                                    </button>
                                                    <button class="comment-form-tab js-comment-edit-form-preview">
                                                        プレビュー
                                                    </button>
                                                </div>
                                                {!! Form::open(['route' => ['comment.update', $comment->comment_id],
                                                'method' => 'PUT']) !!}
                                                <div class="comment-form-content-tab-content">
                                                    <textarea rows="4" placeholder="コメントを入力してください。"
                                                              class="comment-form-textarea js-comment-edit-form-textarea"
                                                              name="comment" required>{{ $comment->comment }}</textarea>

                                                    <div class="markdown-content-edit" style="display: none;"></div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="snippet_id" value="{{ $comment->snippet_id }}">
                                            <button class="btn btn-success js-comment-edit-update-btn pull-right">更新する
                                            </button>
                                            <button class="btn btn-default js-comment-edit-cancel-btn pull-right"
                                                    style="margin: 0 15px">キャンセル
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="comment-content">
                                    {!! $comment->parsedComment !!}
                                </div>
                            @endforeach
                            <div class="item-comment">
                                <div class="comment-form-header">
                                    <img src="{{ Auth::user()->thumbnail }}" class="comment-form-icon img-rounded">

                                    <div class="comment-form-title">コメントを投稿する</div>
                                </div>
                                <div class="comment-form-content">
                                    <div class="comment-form-tabs">
                                        <button class="comment-form-tab is-active js-comment-form-edit">編集</button>
                                        <button class="comment-form-tab js-comment-form-preview">プレビュー</button>
                                    </div>
                                    {!! Form::open(['route' => 'comment.store', 'class' => 'snippet-form']) !!}
                                    <div class="comment-form-content-tab-content">
                                        <textarea rows="4" placeholder="コメントを入力してください。"
                                                  class="comment-form-textarea js-comment-form-textarea" name="comment"
                                                  required></textarea>

                                        <div class="markdown-content" style="display: none;"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="snippet_id" value="{{ $snippet->id }}">
                                <input type="hidden" name="snippet_owner_id" value="{{ $snippet->user_id }}">
                                <button class="btn btn-success js-submit-btn" style="float: right;">投稿する</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="snippet-right">
                            <div class="snippet-right__profile clearfix">
                                <img src="{{ $snippet->users['thumbnail'] }}" class="blue-knowledge-list-thumb img-rounded">
                                <a href="/users/{{ $snippet->users['id'] }}">{{ $snippet->users['name'] }}</a>
                            </div>
                            <div class="snippet-right__snippetList">
                                <h6>人気の投稿</h6>
                                <ul>
                                    @if(count($popularSnippets) !== 0)
                                        @foreach($popularSnippets as $popular)
                                            <li><a href="/snippet/{{ $popular->snippet_id }}">{{ $popular->title }}</a></li>
                                        @endforeach
                                    @else
                                        <p>まだ人気の投稿はありません</p>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('/js/comment.js') }}"></script>
<script src="{{ asset('/js/stock.js') }}"></script>
@endsection