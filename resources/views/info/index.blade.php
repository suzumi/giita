@extends('app')


@section('content')
    <div class="container">
        <div class="info-wrapper">
            <h4>お知らせ</h4>
            @foreach($infoList as $info)
            <div class="info-list">
                <div class="info-list__date">{{ $info->created_at->format('Y/m/d') }}</div>
                <div class="info-list__title">{{ $info->title }}</div>
                <div class="info-list__description">{{ $info->body }}</div>
            </div>
            @endforeach
        </div>
        {!! $infoList->render() !!}
    </div>
@endsection