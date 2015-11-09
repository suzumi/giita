@extends('app')

@section('title')
    イベント
@endsection

@section('content')
    <div class="container animsition">
        <div class="row">
            <div class="event__wrap u-mt20">
                <div class="col-sm-8">
                    <h3><i class="fa fa-pencil"></i>勉強会一覧<a href="/events/create" class="btn u-btn pull-right"><i class="fa fa-pencil-square-o"></i>作成する</a></h3>
                    @if($events)
                        @foreach($events as $event)
                            <div class="event-list work-shop">
                                <div class="event-list-eyecatch">
                                    <a href="/events/{{$event->id}}">
                                        <div class="event-img">
                                            <img src="{{$event->event_eyecatch_img}}">
                                        </div>
                                        <div class="schedule">
                                            <div class="count">{{Carbon\Carbon::parse($event->event_date)->format('m月')}}</div>
                                            <div class="unit">{{Carbon\Carbon::parse($event->event_date)->format('d')}}</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="event-list-description work-shop__title">
                                    <a href="/events/{{$event->id}}">{{$event->event_title}}</a>

                                    <div class="event-address">
                                        <div class="event-list-sponsor"><i class="fa fa-user"></i>主催者：渋江 一晃</div>
                                        <div class=""><i class="fa fa-clock-o"></i>
                                            日時：{{Carbon\Carbon::parse($event->event_date)->format('Y年m月d日')}} {{Carbon\Carbon::parse($event->event_time)->format('H:i〜')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {!! $events->render() !!}
                    @else
                        <p>まだ勉強会情報はありません</p>
                    @endif
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </div>

@endsection