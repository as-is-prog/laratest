@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>メッセージ</h2></div>

                <div class="panel-body">
                  <h3>{{ $message }}</h3><br>
                  <a href="/{{ $link }}">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
