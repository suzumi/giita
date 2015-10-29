@extends('app')

@section('title')
    イベント
@endsection

@section('content')
    <div class="container animsition">
        <div class="row">
            <div class="event__wrap u-mt20">
                <div class="col-sm-8">
                    <h3><i class="fa fa-pencil"></i>勉強会一覧</h3>
                @foreach($events as $event)
                    <div class="event-list work-shop">
                        <div class="event-list-eyecatch">
                            <a href="">
                                <div class="event-img">
                                    <img src="https://connpass-tokyo.s3.amazonaws.com/thumbs/02/4c/024c9c5b3b74811032d7e5e0bb93c922.png" height="72px" width="108px">
                                </div>
                                <div class="schedule">
                                    <div class="count">10月</div>
                                    <div class="unit">22</div>
                                </div>
                            </a>
                        </div>
                        <div class="event-list-description">
                            <a href="http://connpass.com/event/21768/ " target="_blank">{{$event['title']}}</a>

                            <div class="event-address">
                                <div class="event-list-sponsor">主催者：渋江 一晃</div>
                                <div class="">日時：{{$event['event_date']}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </div>

@endsection