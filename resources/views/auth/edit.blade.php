@extends('app')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success text-center" role="alert">
            {!! Session::get('success') !!}
        </div>
    @endif
    <div class="container">
        <h2>ユーザー設定<br />
        </h2>
        <div class="row">
            <div class="col-sm-2">
                <nav class="nav-sidebar">
                    <ul class="nav">
                        <li class="active"><a href="javascript:;">アカウント</a></li>
                        {{--<li><a href="javascript:;">パスワード</a></li>--}}
                        {{--<li class="nav-divider"></li>--}}
                        {{--<li><a href="javascript:;"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>--}}
                    </ul>
                </nav>
            </div>
            <div class="col-sm-6 edit-form-wrapper">
                {!! Form::open(['action' => 'SettingController@accountUpdate', 'class' => 'profile-edit-form', 'files'=> true]) !!}
                <h3>ユーザー設定</h3>
                <dl>
                    <dt>
                        <label>アイコン</label>
                    </dt>
                    <dd class="clearfix">
                        <img src="/{{ $user->thumbnail }}" class="mypage-user-edit-thumb img-rounded">
                        <label class="mypage-input-file-wrap">
                            <input type="file" name="profile-icon" class="mypage-input-file" accept="image/*">
                            ファイルを選択
                        </label>
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <i class="fa fa-github"></i>
                        <label>GitHubアカウント</label>
                    </dt>
                    <dd>
                        <input type="text" name="github" class="form-control" value="{{ $user->github }}" placeholder="URL">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <i class="fa fa-twitter"></i>
                        <label>Twitterアカウント</label>
                    </dt>
                    <dd>
                        <input type="text" name="twitter" class="form-control" value="{{ $user->twitter }}" placeholder="URL">
                    </dd>
                </dl>
                <button class="btn btn-success">保存する</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection