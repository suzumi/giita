@extends('app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{ $tag->tag }}</h1>
                <div class="tag-metrics">
                    <div class="tag-stats-metric">
                        <div class="count">{{ count($snippetsWithTag) }}</div>
                        <div class="unit">投稿</div>
                    </div>
                    <div class="tag-stats-description">
                        <p>{{ $tag->tag }}に関する情報が集まっています。現在{{ count($snippetsWithTag) }}件の投稿があります。</p>
                    </div>
                </div>
                <div class="tag-search-section">
                    @if(count($snippetsWithTag) == 0)
                        <h2>まだ投稿がありません</h2>
                    @else
                    <h2>最近タグが付いた投稿</h2>
                    <ul class="mypage-knowledge-list">
                        @foreach($snippetsWithTag as $snippet)
                            <li>
                                <img class="blue-knowledge-list-thumb img-rounded" src="/{{ $snippet->thumbnail }}" alt="">
                                <div class="blue-knowledge-list-info">
                                    <a href="/snippet/{{ $snippet->snippet_id }}" class="blue-knowledge-list-title">{{ $snippet->title }}</a>
                                    {{--<ul class="list-inline">--}}
                                    {{--@foreach($snippet->tags as $tag)--}}
                                    {{--<li>--}}
                                    {{--<a href="" class="btn btn-default btn-xs">{{{ $tag['tag'] }}}</a>--}}
                                    {{--</li>--}}
                                    {{--@endforeach--}}
                                    {{--</ul>--}}
                                    <p class="blue-knowledge-list-name">
                                        <a href="/users/{{ $snippet->user_id }}">{{ $snippet->name }}</a>が{{ $snippet->snippet_created_at }}に投稿
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                    {!! $snippetsWithTag->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection