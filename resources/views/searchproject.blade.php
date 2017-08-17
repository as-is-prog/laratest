@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>プロジェクト検索</h2></div>

                <div class="panel-body">
                  <form action="/api/project/search" method="post">
                    <h4>検索ワード</h4>
                      <input name="word" type="text">
                      <input type="submit" value="検索">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
