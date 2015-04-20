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
