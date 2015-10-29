@extends('app')

@section('title')
    {{ $tag->tag }}に関する{{ $tagCount }}件の投稿
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 tag-search-wrapper">
                <h3>{{ $tag->tag }}</h3>
                <div class="tag-metrics">
                    <div class="tag-stats-metric">
                        <div class="count">{{ $tagCount }}</div>
                        <div class="unit">投稿</div>
                    </div>
                    <div class="tag-stats-description">
                        <p>{{ $tag->tag }}に関する情報が集まっています。現在{{ $tagCount }}件の投稿があります。</p>
                    </div>
                </div>
                <div class="tag-search-section">
                    @if($tagCount === 0)
                        <h2>まだ投稿がありません</h2>
                    @else
                    <h2>最近タグが付いた投稿</h2>
                    <ul class="mypage-knowledge-list">
                        @foreach($snippetsWithTag as $snippet)
                            <li>
                                <img class="blue-knowledge-list-thumb img-rounded" src="{{ $snippet->thumbnail }}" alt="">
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
            <div class="col-sm-4">
                <div class="event-col">
                    <div class="event-col-head">
                        <a href="http://connpass.com/" target="_blank"><img src="{{ asset('/img/assets/connpass_logo_3.png') }}" class="img-responsive"></a>
                        <span>外部の勉強会(新着順)</span>
                    </div>
                    <div class="event js-event-list animsition">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('/js/connpass.js') }}"></script>
@endsection