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
    width: 50px;
    height: 50px;
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
.snippet-body {
    min-height: 500px;
    background-color: #fff;
    padding: 0;
    border-radius: 5px;
}
.snippet-form-body-preview-panel {
    padding: 6px 12px;
    max-height: 500px;
    overflow: auto;
}

/*-------------------------------------
  Snippet
-------------------------------------*/

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

.stock-list {
    border-right: 1px solid #fff;
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
.panel {
    margin-bottom: 0;
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
</style>
</head>
<body>
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
                    <form class="navbar-form navbar-left" action="/api/search" role="search" method="get">
                        <div class="form-group">
                            <input type="search" class="form-control" autocomplete="off" placeholder="検索">
                        </div>
                    </form>
                </li>
            </ul>
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
                            <li><a href="/snippet/create">新規投稿する</a></li>
                            <li><a href="/weekly-report">週報を投稿する</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{--<img class="img-rounded img-profile-icon" src="http://pbs.twimg.com/profile_images/493797738232836097/7m5qqKSw_normal.jpeg">--}}
                            <img class="img-rounded img-profile-icon" src="data:image/jpg;base64,{{ Auth::user()->thumbnail }}">
                            <span>{{ Auth::user()->name }}</span>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/users/{{ Auth::user()->id }}">マイページ</a></li>
                            <li><a href="">プロフィール変更</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}">ログアウト</a></li>
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
<script src="{{ asset('js/jquery.glanceyear.min.js') }}"></script>
<script>
    var massive = [
        {date: '2014-8-3', value:'1'},
        {date: '2014-8-4', value:'2'},
        {date: '2014-9-3', value:'3'},
        {date: '2014-10-14', value:'2'},
        {date: '2014-10-13', value:'8'},
        {date: '2014-7-3', value:'1'},
        {date: '2014-7-4', value:'2'},
        {date: '2014-7-7', value:'3'},
        {date: '2014-7-14', value:'2'},
        {date: '2014-6-3', value:'1'},
        {date: '2014-6-4', value:'2'},
        {date: '2014-6-5', value:'3'},
        {date: '2014-6-14', value:'2'}
    ];
    $('div#js-glanceyear').glanceyear(massive,
            {
                eventClick: function(e) { $('#debug').html('Date: '+ e.date + ', Count: ' + e.count); },
                months: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                weeks: ['M','T','W','T','F','S', 'S'],
                showToday: false,
                today: new Date()
            });
</script>
</body>
</html>
