@extends('app')

@section('title')
    タグ一覧
@endsection

@section('content')
    <div class="container animsition">
        <h3>タグ一覧</h3>
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