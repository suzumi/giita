@extends('app')

@section('title')
    ユーザー設定
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success text-center" role="alert">
            {!! Session::get('success') !!}
        </div>
    @endif
    <div class="container">
        <h3>ユーザー設定</h3>
        <div class="row edit-form-wrapper">
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
            <div class="col-sm-6">
                {!! Form::open(['action' => 'SettingController@accountUpdate', 'class' => 'profile-edit-form', 'files'=> true]) !!}
                <h4>ユーザー設定</h4>
                <dl>
                    <dt>
                        <label>アイコン</label>
                    </dt>
                    <dd class="clearfix">
                        <img src="/{{ $user->thumbnail }}" class="mypage-user-edit-thumb img-rounded js-user-thumb">
                        <label class="mypage-input-file-wrap">
                            <input type="file" name="profile-icon" class="mypage-input-file js-input-file" accept="image/*">
                            ファイルを選択
                        </label>
                    </dd>
                </dl>
                <button type="button" class="js-model" data-toggle="modal" data-target="#myModal" style="display: none;"></button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">この画像を使用しますか？</h4>
                            </div>
                            <div class="modal-body text-center">
                                <div class="thumbnail-preview">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="js-close-modal" data-dismiss="modal" style="display: none;"></button>
                                <button type="button" class="btn btn-default js-image-preview-cancel">やめる</button>
                                <button type="button" class="btn btn-primary js-image-preview-decision">この画像を使用する</button>
                            </div>
                        </div>
                    </div>
                </div>
                <dl>
                    <dt>
                        <i class="fa fa-github"></i>
                        <label>GitHubアカウント(ユーザー名)</label>
                    </dt>
                    <dd>
                        <input type="text" name="github" class="form-control" value="{{ $user->github }}" placeholder="GitHubのアカウント名">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <i class="fa fa-twitter"></i>
                        <label>Twitterアカウント(ユーザー名)※「@」は不要です</label>
                    </dt>
                    <dd>
                        <input type="text" name="twitter" class="form-control" value="{{ $user->twitter }}" placeholder="Twitterのアカウント名">
                    </dd>
                </dl>
                <button class="btn btn-success">保存する</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('/js/preview.js') }}"></script>
@endsection