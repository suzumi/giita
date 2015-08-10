<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Biita</title>

    <link href="{{ asset('/css/glanceyear.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/github.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/particlebackground.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Comfortaa:300' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@if(Session::has('feedbackSuccess'))
    <div class="alert alert-success text-center" role="alert">
        {!! Session::get('feedbackSuccess') !!}
    </div>
@elseif(Session::has('feedbackError'))
    <div class="alert alert-danger text-center" role="alert">
        {!! Session::get('feedbackError') !!}
    </div>
@endif
<nav class="navbar navbar-default navbar-static-top u-mb0">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand brand-logo" href="/">
                Biita
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <form class="navbar-form navbar-left" action="/search" role="search" method="get">
                        <div class="form-group">
                            <input type="search" class="form-control" autocomplete="off" name="q" placeholder="キーワードを入力" required>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">ログイン</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span>新規作成</span>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/snippet/create"><i class="fa fa-pencil-square-o"></i>新規投稿する</a></li>
                            <li><a href="/weekly-report"><i class="fa fa-file-text-o"></i>週報を投稿する</a></li>
                        </ul>
                    </li>
                    <li><a href="/users/{{ Auth::user()->id }}/stocks">ストック一覧</a></li>
                    <li>
                        <div class="notification-wrapper js-notify-btn">
                            <div class="notification-count">0</div>
                        </div>
                        <div class="globalNotifications_container js-notify-box">
                            <div class="globalNotifications_arrow"></div>
                            <div class="globalNotifications_contents"><div class="globalNotifications_contentsHeader">お知らせ</div><ul class="list-unstyled globalNotifications_contentsBody js-globalNotification_list">
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="globalNotificationContents_listItem">
                                        <a href="http://qiita.com/suzumi/items/9a8aa8a56aa0e2cd6855" class="globalNotificationContents_itemLink">
                                            <div class="globalNotificationContents_itemIcon">

                                                <img src="https://pbs.twimg.com/profile_images/22188042/060219_1929_001_normal.jpg">

                                            </div>
                                            <div class="globalNotificationContents_itemText">
                                                <span class="bold">wkaoru@github</span>があなたの投稿<span class="title">"ec2にGitBucketをインストール"</span>を<span class="bold">ストック</span>しました。
                                                <div class="status">
                                                    3日前
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul><div class="globalNotifications_contentsFooter"><a href="/notifications">通知一覧を見る</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{--<img class="img-rounded img-profile-icon" src="http://pbs.twimg.com/profile_images/493797738232836097/7m5qqKSw_normal.jpeg">--}}
                            <img class="img-rounded img-profile-icon" src="/{{ Auth::user()->thumbnail }}">
                            <span>{{ Auth::user()->name }}</span>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/users/{{ Auth::user()->id }}"><i class="fa fa-user"></i>マイページ</a></li>
                            <li><a href="/settings/account"><i class="fa fa-pencil"></i>プロフィール変更</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i>ログアウト</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

@yield('content')

@section('footer')
    @include('layout.footer')
@show

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>
<script src="{{ asset('/js/libs/highlight.pack.js') }}"></script>
<script src="{{ asset('/js/libs/marked.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery.glanceyear.min.js') }}"></script>
<script src="{{ asset('js/libs/particlebackground.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
@yield('scripts')

</body>
</html>
