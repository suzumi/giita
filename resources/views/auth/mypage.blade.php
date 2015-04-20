@extends('app')

@section('content')
<div class="container">
    <div class="row mypage">
        <div class="col-md-3 mypage-user">
            <!-- 左側 -->
            <img src="http://dummyimage.com/200x200/000/fff" class="mypage-user-thumb">
            <a href="" class="mypage-user-account"><i class="fa fa-github u-mr8"></i>GitHub</a>
            <a href="" class="mypage-user-account"><i class="fa fa-twitter u-mr8"></i>Twitter</a>
        </div>
        <div class="col-md-9">
            <!-- 右側 -->
            <div class="mypage-user-profile">
                <p class="mypage-user-name">ユーザ太郎</p>
                <div class="mypage-user-edit-btn">
                    <a href="" class="btn btn-info">編集する</a>
                </div>
            </div>
            <p class="mypage-user-snipets">0スニペット</p>
            <div>
                <ul class="tag-list clearfix">
                    <li><a href="#" class="btn btn-default btn-xs">PHP</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">Scala</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">Play framework</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">Rails</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">Vagrant</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">Swift</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">CentOS</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">HTML</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">Objective-C</a></li>
                    <li><a href="#" class="btn btn-default btn-xs">CSS</a></li>
                </ul>
            </div>
            <div class="panel panel-default">
                <h1 class="glanceyear-header">Snippet Activity
                    <span class="glanceyear-quantity"></span>
                </h1>
                <div class="glanceyear-content" id="js-glanceyear">
                </div>

                <div class="glanceyear-summary">
                    <div class="glanceyear-legend">
                        Less&nbsp;
                        <span style="background-color: #eee"></span>
                        <span style="background-color: #c3dbda"></span>
                        <span style="background-color: #5caeaa"></span>
                        <span style="background-color: #277672"></span>
                        &nbsp;More
                    </div>
                    スニペット投稿の集計です  <br>
                    <span id="debug"></span>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#" data-toggle="tab">クリップ</a></li>
        <li ><a href="#" data-toggle="tab">スニペット</a></li>
        <li ><a href="#" data-toggle="tab">フィードブログ</a></li>
    </ul>

</div>
@endsection