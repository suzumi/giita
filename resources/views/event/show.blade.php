@extends('app')

@section('title')
    {{$event->event_title}}
@endsection

@section('content')
    <div class="container animsition">
        <div class="col-md-8">
            <div class="event-detail__wrap u-mt20 u-mb40">
                <div class="event-detail__header__area clearfix">
                    <div class="event-detail__header__schedule">
                        <p class="detail__header__month text-center">{{Carbon\Carbon::parse($event->event_date)->format('m月')}}</p>
                        <p class="detail__header__date text-center">{{Carbon\Carbon::parse($event->event_date)->format('d')}}</p>
                    </div>
                    <h2 class="event-detail__header__title">{{ $event->event_title }}</h2>
                </div>
                <div class="event-detail__header__eyecatch u-mt20">
                    <img src="{{ $event->event_eyecatch_img }}" class="img-responsive">
                </div>
                <div class="event-detail__desc">
                    <div class="event-detail__desc__title">
                        <h4><i class="fa fa-calendar"></i>イベント詳細</h4>
                    </div>
                    <div class="event-detail__desc__schedule">
                        <div class="bs-callout bs-callout-info">
                            <span><i class="fa fa-list"></i>基本情報</span>
                        </div>
                        <div class="event-detail__desc__body">
                            <p><i class="fa fa-user"></i>主催者：{{ $event->event_sponsor }}</p>
                            <p><i class="fa fa-clock-o"></i>{{Carbon\Carbon::parse($event->event_date)->format('Y/m/d')}} {{Carbon\Carbon::parse($event->event_time)->format('H:i〜')}}</p>
                        </div>
                    </div>
                    <div class="event-detail__desc__description">
                        <div class="bs-callout bs-callout-info">
                            <span><i class="fa fa-bars"></i>詳細</span>
                        </div>
                        <div class="event-detail__desc__body">
                            <p>
                                {{ $event->event_description }}
                            </p>
                        </div>
                    </div>
                    @if($docs)
                    <div class="event-detail__desc__doc">
                        <div class="bs-callout bs-callout-info">
                            <span><i class="fa fa-file-text"></i>資料</span>
                        </div>
                        <div class="event-detail__desc__body">
                            @foreach($docs as $doc)
                               {!! $doc->docs_url !!}
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($event->event_youtube_video_id)
                    <div class="event-detail__desc__video">
                        <div class="bs-callout bs-callout-info">
                            <span><i class="fa fa-video-camera"></i>動画</span>
                        </div>
                        <div class="event-detail__desc__body">
                            <iframe width="640" height="360" src="https://www.youtube.com/embed/{{ $event->event_youtube_video_id }}?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 u-mt20 u-mb40">
            @section('sidebar')
                @include('layout.sidebar')
            @show
        </div>
    </div>
@endsection