@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- 左側 -->
            <img src="http://dummyimage.com/200x200/000/fff">
            <p>Github</p>
            <p>twitter</p>
        </div>
        <div class="col-md-8">
            <!-- 右側 -->
            <p>ユーザ太郎</p>
            <p>0スニペット</p>
            <div>
                <ul class="list-inline">
                    <li>
                        <a href="#" class="btn btn-default btn-xs">PHP</a>
                        <a href="#" class="btn btn-default btn-xs">Scala</a>
                        <a href="#" class="btn btn-default btn-xs">Play framework</a>
                        <a href="#" class="btn btn-default btn-xs">Rails</a>
                        <a href="#" class="btn btn-default btn-xs">Vagrant</a>
                        <a href="#" class="btn btn-default btn-xs">Swift</a>
                        <a href="#" class="btn btn-default btn-xs">CentOS</a>
                        <a href="#" class="btn btn-default btn-xs">HTML</a>
                        <a href="#" class="btn btn-default btn-xs">Objective-C</a>
                        <a href="#" class="btn btn-default btn-xs">CSS</a>
                    </li>
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