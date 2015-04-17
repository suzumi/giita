<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.navbar-default {
    background-color: inherit !important;
    /*margin-bottom: 0;*/
}

.snippet-container {
    padding: 15px 0;
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
    background-color: #f8faf7;
}
.snippet-body-wrapper {
    margin-bottom: 15px;
}
.snippet-form-body {
    min-height: 500px;
    width: 100%;
}
.snippet-body {
    min-height: 500px;
    background-color: #fff;
    padding: 0;
}
.snippet-form-body-preview-panel {
    max-height: 500px;
    overflow: auto;
}
.u-mb0 {
    margin-bottom: 0 !important;
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
            <a class="navbar-brand" href="/">
                Blue Knowledge
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
                            <img class="img-rounded img-profile-icon" src="">
                            <span>{{ Auth::user()->name }}</span>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="">マイページ</a></li>
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

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/snippet.js') }}"></script>
</body>
</html>
