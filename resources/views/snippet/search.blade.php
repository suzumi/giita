@extends('app')

@section('title')
    「{{ $name }}」の検索結果
@endsection

@section('content')

    <div class="container animsition">
        <div class="row">
            <div class="col-sm-8 keyword-search-wrapper">
                <div class="keyword-search-formwrapper">
                    <form action="/search" method="get" class="keyword-search__form">
                        <input type="text" class="form-control keyword-search__textform" name="q" autofocus="autofocus" value="{{ $name }}">
                        <div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>検索</button>
                        </div>
                    </form>
                </div>
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">すべて<span class="badge u-badge">{{ $count }}</span></a></li>
                </ul>
                <div class="tag-search-section">
                    <ul class="mypage-knowledge-list">
                        @if($count === 0)
                            <div class="keyword-search__notfound text-center">
                                <i class="fa fa-frown-o"></i>
                                <div class="keyword-search__notfoundText">「{{ $name }}」に一致する記事は見つかりませんでした。</div>
                            </div>
                        @else
                            @foreach($paginatedSearchResults as $result)
                                <li>
                                    <a href="/users/{{ $result['_source']['user_id'] }}"><img class="blue-knowledge-list-thumb img-rounded" src="{{ $result['_source']['thumbnail'] }}" alt=""></a>
                                    <div class="blue-knowledge-list-info">
                                        <a href="/snippet/{{ $result['_id'] }}" class="blue-knowledge-list-title">{{ $result['_source']['title'] }}</a>
                                        <ul class="list-inline">
                                        <li>
                                            <?php
                                                $tags = explode(',', $result['_source']['tags']);
                                            ?>
                                            @foreach($tags as $tag)
                                                    <a href="/tags/{{ $tag }}" class="u-tag">{{{ $tag }}}</a>
                                            @endforeach
                                        </li>
                                        </ul>
                                        <p class="blue-knowledge-list-name">
                                            <a href="/users/{{ $result['_source']['user_id'] }}">{{ $result['_source']['name'] }}</a>が{{ date('Y/m/d H:i', strtotime($result['_source']['created_at'])) }}に投稿
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    @unless($count === 0)
                        {!! $paginatedSearchResults->appends(Request::query())->render() !!}
                    @endunless
                </div>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
@endsection