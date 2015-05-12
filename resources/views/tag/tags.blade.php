@extends('app')

@section('content')
    <div class="container">
        <h1>タグ一覧</h1>
        <div>
            <ul class="tag-list__tags clearfix">
                @foreach($tags as $tag)
                <li><a href="/tags/{{ $tag->tag }}">{{ $tag->tag }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="btn-more text-center">
            {!! $tags->render() !!}
        </div>
    </div>
@endsection