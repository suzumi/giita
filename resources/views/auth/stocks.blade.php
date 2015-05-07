@extends('app')

@section('content')
    <div class="container">
        <div class="stocks-wrapper">
            <div>
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="/users/{{ $user->id }}/items">投稿した一覧</a></li>
                    <li role="presentation" class="active"><a href="/users/{{ $user->id }}/stocks">ストックした一覧</a></li>
                </ul>
            </div>
            <ul class="mypage-knowledge-list">
            @foreach($stocks as $stock)
                @if($stock->snippet_id != null)
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
                @else
                    <div>
                        <p class="no-post-yet">ストックがまだありません</p>
                        <p class="">お気に入りのスニペットをストックしましょう！</p>
                    </div>
                @endif
            @endforeach
            </ul>
            {!! $stocks->render() !!}
        </div>
    </div>
@endsection