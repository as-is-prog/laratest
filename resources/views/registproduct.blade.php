@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>作品新規登録</h2></div>

                <div class="panel-body">
                  <form action="/api/product/register" method="post">
                    <h4>作品名</h4>
                      <input name="name" type="text"><br>
                    <h4>作品タグ</h4>
                      <input name="tags" type="text"><br>
                    <h4>作品画像</h4>
                      <input name="img" type="file"><br>
                    <h4>作品概要</h4>
                      <textarea name="outline" rows="8" cols="80"></textarea>
                    <br>
                    <br>
                    <input type="submit" value="作成">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
