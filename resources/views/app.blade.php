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
<style>
.u-mr8 {
    margin-right: 8px;
}
/*-------------------------------------
  ログイン
-------------------------------------*/
.login-wrapper {
    padding-bottom: 30px;
}
/*-------------------------------------
  パスワードリセット
-------------------------------------*/
.passwordreset-wrapper {
    padding: 30px 0;
}
/*-------------------------------------
  ホーム
-------------------------------------*/
pre {
    border: none;
    background-color: #f7f7f7;
    padding: 16px;
    border-radius: 3px;
    overflow: auto;
}
.brand-logo {
    color: #2ec4cc !important;
    font-family: 'Comfortaa', cursive;
    /*font-family: 'Quicksand', sans-serif;*/
    font-size: 35px;
}
.navbar-default {
    background-color: inherit !important;
    /*margin-bottom: 0;*/
}
.img-profile-icon {
    height: 22px;
}
.snippet-container {
    padding: 15px 0 50px 0;
}
.no-post-yet {
    padding: 15px 0 0 0;
}
.blue-knowledge-list {
    padding: 0;
    margin: 40px 0;
}
.blue-knowledge-list > li {
    display: table;
    padding: 10px 0;
    width: 100%;
    border-top: 1px #ccc solid;
    list-style: none;
}
.blue-knowledge-list > li:first-child {
    border-top: none;
}
.blue-knowledge-list-info {
    display: table-cell;
    padding-left: 16px;
    width: 100%;
    vertical-align: top;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.blue-knowledge-list-title {
    display: block;
    font-size: 16px;
    font-weight: bold;
    color: #337ab7;
    line-height: 24px;
    text-decoration: none;
}
.blue-knowledge-list-title:hover,
.blue-knowledge-list-title:visited {
    color: #685987;
}
.blue-knowledge-list-thumb {
    display: table-cell;
    width: 40px;
    height: 40px;
}
.blue-knowledge-list-name {
    float: right;
    margin: 0 0 0 12px;
    font-size: 13px;
    font-weight: bold;
    color: #555;
}
.blue-knowledge-list-date {
    float: right;
    margin-bottom: 0;
    font-size: 13px;
    font-weight: bold;
    color: #555;
}
.user-info {
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 5px;
    margin-bottom: 15px;
    background-color: #eee;
}
.user-info img {
    height: 48px;
    width:  48px;
}
.user-info-left, .user-info-right {
    display: inline-block;
    /*vertical-align: top;*/
}
.user-info-name {
    padding-left: 5px;
}
.ad-banner-blog {
    padding-top: 15px;
    padding-bottom: 15px;
}
/*-------------------------------------
  Snippet Form
-------------------------------------*/
.btn-post {
    margin-bottom: 20px;
}
.snippet-form-title {
    margin-bottom: 15px;
}
.snippet-form-title input {
    height: 56px;
    font-size: 28px;
}
.snippet-form-tag {
    margin-bottom: 15px;
}
.snippet-form-wrapper {
    min-width: 800px;
    padding: 20px 15px 30px;
    /*background-color: #f8faf7;*/
    background-color: #f3faf8;
}
.snippet-body-wrapper {
    margin-bottom: 15px;
}
.snippet-form-body {
    min-height: 500px;
    width: 100%;
    resize:none;
}
.one-brefore-snippet {
    max-height: 300px;
    background-color: #fff;
    padding: 6px 12px;
    margin: 15px 0 30px 0;
    overflow: auto;
}
.one-brefore-snippet > pre {
    border: none;
    background-color: #f7f7f7;
    padding: 16px;
    border-radius: 3px;
}
.form-control:focus {
    box-shadow: none;
}
.snippet-form-tabs {
    font-size: 0;
    color: #999;
    border-radius: 4px 4px 0 0;
    background-color: #fafafa;
}
.snippet-form-tab {
    padding: 10px 15px;
    width: 100px;
    font-size: 14px;
    border: none;
    background-color: inherit;
    outline: none;
    -webkit-appearance: none;
    border-radius: 5px 0 0 0;
}
.snippet-form-body-panel textarea {
    border: none;
    outline: none;
    border-radius: 0;
    box-shadow: none;
}
.modal-content table thead {
    color: #999;
}
.markdownHelp_body {
    overflow-y: auto;
    max-height: 450px;
}
.snippet-body-left {
    min-height: 500px;
    background-color: #fff;
    padding: 0;
    border-radius: 5px 0 0 5px;
    border-top: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
}
.snippet-body-right {
    min-height: 500px;
    background-color: #fff;
    padding: 0;
    border-radius: 0 5px 5px 0;
    border: 1px solid #ddd;
}
.snippet-form-body-preview-panel {
    padding: 6px 12px;
    max-height: 500px;
    overflow: auto;
    min-height: 500px;
}
.snippet-form-body-preview-panel > pre {
    border: none;
    background-color: #f7f7f7;
    padding: 16px;
    border-radius: 3px;
}
/*-------------------------------------
  Snippet
-------------------------------------*/
.snippet-user-thumb {
    width: 23px;
    height: 23px;
    margin: 0 5px;
}

.snippet-user-name {
    color: #fff;
}

.snippet-user-name:hover {
    color: #fff;
}

.item-header {
    background-color: #31a5cc;
    color: #fff;
    margin-bottom: 30px;
    padding: 30px 0;
    /*height: 250px;*/
}

.snippet-formed-user {
    padding: 15px 0;
}

.item-body {
    padding-bottom: 50px;
}
.item-body > .container > pre {
    border: none;
    background-color: #f7f7f7;
    padding: 16px;
    border-radius: 3px;
    overflow: auto;
}
.stock-list {
    border-right: 1px solid #fff;
}
.stock-list-wrapper {
    margin-left: 0;
    font-size: 0;
}
.stock-list-wrapper i {
    font-size: 14px;
}
.list-inline > li.stock-list,
.list-inline > li.comment-list {
    padding: 0;
    width: 50%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.comment-count-text,
.stock-count-text {
    font-size: 14px;
}
.count-num {
    font-size: 22px;
    font-weight: 500;
}

.dropdown-form-button {
    text-align: left;
    -webkit-appearance: none;
    border: none;
    margin: 0;
    background-color: inherit;
    width: 100%;
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.42857143;
    color: #333333;
    white-space: nowrap;
}

.dropdown-form-button:hover {
    color: #262626;
    background-color: #f5f5f5;
}
.text-advertisement {
    border-top: 1px dotted #ccc;
    margin-top: 30px;
    padding-top: 20px;
}
.item-comment {
    margin: 15px 0 5px 0;
    padding: 15px 0;
    border-top: 1px solid #eee;
}

/*コメント一覧*/

.comment-wrapper {
    margin-top: 10px;
    padding-top: 20px;
    border-top: solid 1px #ccc;
}

.comment-content {
    border: solid 1px #d9d9d9;
    border-radius: 4px;
    padding: 15px;
    margin-top: 11px;
    margin-bottom: 20px;
}
.comment-delete-form {
    display: inline-block;
}
.edit-comment-form {
    padding-bottom: 20px;
}
/*コメントフォーム*/

.comment-form-icon {
    height: 35px;
    width: 35px;
}
.comment-form-title {
    display: inline-block;
    font-size: 15px;
    padding: 0 5px;
    line-height: 35px;
}
.comment-form-content {
    margin: 15px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.comment-form-tabs {
    font-size: 0;
    border-radius: 4px 4px 0 0;
    background-color: #fafafa;
}
.comment-form-tab {
    padding: 10px 0;
    width: 100px;
    font-size: 14px;
    border: none;
    background-color: inherit;
    outline: none;
    -webkit-appearance: none;
}
.comment-form-tab:first-child {
    border-radius: 4px 0 0 0;
}
.comment-form-tab.is-active {
    background-color: #fff;
}
.comment-form-content-tab-content {
    padding: 15px;
}
.comment-form-textarea {
    width: 100%;
    border: none;
    outline: none;
}

/*-------------------------------------
  Mypage
-------------------------------------*/
.mypage {
    padding: 40px 0;
}
.mypage-user-thumb {
    display: inline-block;
    margin-bottom: 12px;
    width: 200px;
    height: 200px;
    background-size: cover;
}
.mypage-user {
    padding-bottom: 20px;
    text-align: center;
}
.mypage-user-account {
    display: block;
    font-size: 18px;
}
.mypage-user-profile {
    display: table;
    width: 100%;
}
.mypage-user-name {
    display: table-cell;
    padding-right: 20px;
    width: 100%;
    font-size: 30px;
    font-weight: bold;
}
.mypage-user-edit-btn {
    display: table-cell;
    vertical-align: middle;
}
.mypage-user-snipets {
    font-size: 22px;
    font-weight: bold;
}
.tag-list {
    padding: 0;
    margin: 0;
}
.tag-list > li {
    float: left;
    margin: 0 10px 10px 0;
    list-style: none;
}
.glanceyear-content {
    overflow: hidden;
}
.mypage-snippet-area {
    margin: 0;
}
.panel {
    margin-bottom: 0;
}
.mypage-snippet-list-wrapper {
    padding-bottom: 40px;
}
.mypage-popular-list-wrapper {
    padding-bottom: 40px;
}
.mypage-stock-count {
    margin-left: 10px;
}
.mypage-knowledge-list {
    padding: 0 10px;
}
.mypage-knowledge-list > li {
    display: table;
    padding: 10px 0;
    width: 100%;
    border-top: 1px #ccc solid;
    list-style: none;
}
.mypage-knowledge-list > li:first-child {
    border-top: none;
}
.mypage-knowledge-list-info {
    display: table-cell;
    padding-left: 16px;
    width: 100%;
    vertical-align: top;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.mypage-knowledge-list-title {
    display: block;
    font-size: 16px;
    font-weight: bold;
    color: #337ab7;
    line-height: 24px;
    text-decoration: none;
}
.mypage-knowledge-list-title:hover,
.mypage-knowledge-list-title:visited {
    color: #685987;
}
.mypage-knowledge-list-thumb {
    display: table-cell;
    width: 50px;
    height: 50px;
}
.mypage-knowledge-list-name {
    float: right;
    margin: 0 0 0 12px;
    font-size: 13px;
    font-weight: bold;
    color: #555;
}
.mypage-knowledge-list-date {
    float: right;
    margin-bottom: 0;
    font-size: 13px;
    font-weight: bold;
    color: #555;
}

/*-------------------------------------
  Mypage Edit
-------------------------------------*/
.thumbnail-preview {
    display: inline-block;
    width: 300px;
    height: 300px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}
.nav-sidebar {
    width: 100%;
    padding: 8px 0;
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
    -webkit-border-radius: 4px 0 0 4px;
    -moz-border-radius: 4px 0 0 4px;
    border-radius: 4px 0 0 4px;
}
.nav-sidebar .active a {
    cursor: default;
    background-color: #428bca;
    color: #fff;
    text-shadow: 1px 1px 1px #666;
}
.nav-sidebar .active a:hover {
    background-color: #428bca;
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
}

/* Right-aligned sidebar */
.nav-sidebar.pull-right {
    border-right: 0;
    border-left: 1px solid #ddd;
}
.nav-sidebar.pull-right a {
    -webkit-border-radius: 0 4px 4px 0;
    -moz-border-radius: 0 4px 4px 0;
    border-radius: 0 4px 4px 0;
}

.mypage-user-edit-thumb {
    height: 40px;
    width: 40px;
    float: left;
    margin-right: 15px;
}

.mypage-input-file-wrap {
    position: relative;
    display: inline-block;
    padding: 9px 12px;
    font-size: 13px;
    font-weight: bold;
    line-height: 20px;
    color: #333;
    white-space: nowrap;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    background-color: #eee;
    background-image: -webkit-linear-gradient(#fcfcfc, #eee);
    background-image: linear-gradient(#fcfcfc, #eee);
    border: 1px solid #d5d5d5;
    border-radius: 3px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-appearance: none;
}
.mypage-input-file {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
}
.edit-form-wrapper {
    padding: 30px 0;
}

/*-------------------------------------
  Stocks
-------------------------------------*/
.stocks-wrapper {
    margin: 40px 0;
}
.user-page-header {
    padding: 1em 0;
}
.user-page-icon {
    float: left;
}
.user-page-icon img {
    height: 80px;
    width: 80px;
    margin-right: 20px;
}
.user-page-name {
    float: left;
}
.user-page-name h2{
    font-weight: 900;
}
.user-page-ribbon {
    background: #E9F8FC;
    border-bottom: solid 1px #BCD7E0;
    border-top: solid 1px #BCD7E0;
    padding: 1em 0;
}
/*-------------------------------------
  Footer
-------------------------------------*/
.global-footer {
    border-top: 1px solid #eee;
    padding: 30px;
}

.footer-form-body {
    margin-bottom: 15px;
}

.footer-form {
    min-height: 100px;
    resize: none;
}

.footer-copyright {
    margin-bottom: 10px;
}

/*-------------------------------------
  Component
-------------------------------------*/
.u-mb0 {
    margin-bottom: 0 !important;
}
.btn-default.btn-noborder {
    border: none;
}
.fa {
    padding: 0 5px;
}
</style>
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
            {{--<ul class="nav navbar-nav">--}}
                {{--<li>--}}
                    {{--<form class="navbar-form navbar-left" action="/api/search" role="search" method="get">--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="search" class="form-control" autocomplete="off" placeholder="検索">--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</li>--}}
            {{--</ul>--}}
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">ログイン</a></li>
                    <li><a href="{{ url('/auth/register') }}">レジスター</a></li>
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
<script src="{{ asset('/js/snippet.js') }}"></script>
<script src="{{ asset('/js/highlight.pack.js') }}"></script>
<script src="{{ asset('/js/marked.min.js') }}"></script>
<script src="{{ asset('js/jquery.glanceyear.min.js') }}"></script>
    <script src="{{ asset('js/particlebackground.js') }}"></script>
</body>
</html>
