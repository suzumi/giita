@extends('app')

@section('content')
    <div class="item-wrapper">
        <div class="item-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="item-title">
                            <h1>{{{ $snippet->title }}}</h1>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="item-stock-view">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-body">
            <div class="container">
                {!! $snippet->body !!}
            </div>
        </div>
    </div>
@endsection
