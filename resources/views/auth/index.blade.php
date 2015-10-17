@extends('app')

@section('title')
    ユーザー一覧
@endsection

@section('content')
    <div class="container animsition">
        <h3>ユーザー一覧</h3>
        <div class="row user-list__wrapper">
        @foreach($users as $user)
            <div class="col-sm-4">
                <div class="user-list">
                    <div class="user-list__thumb">
                        <a href="/users/{{ $user->id }}"><img src="{{ $user->thumbnail }}" class="img-responsive img-rounded"></a>
                    </div>
                    <div class="user-list__showInfo">
                        <a href="/users/{{ $user->id }}" class="user-list__name">{{ $user->name }}</a>
                        <div>
                            @if($user->github)
                                <div class="user-list__sns">
                                    <a href="https://github.com/{{ $user->github }}" class="mypage-user-account" target="_blank"><i class="fa fa-github"></i></a>
                                </div>
                            @endif
                            @if($user->twitter)
                                <div class="user-list__sns">
                                    <a href="https://twitter.com/{{ $user->twitter }}" class="mypage-user-account" target="_blank"><i class="fa fa-twitter"></i></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="btn-more text-center u-paginate">
            {!! $users->render() !!}
        </div>
    </div>
@endsection