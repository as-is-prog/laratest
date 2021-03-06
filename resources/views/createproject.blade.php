@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>プロジェクト新規作成</h2></div>

                <div class="panel-body">
                  <form action="/project/create" method="post">
                  {{ csrf_field() }}
                    <h4>プロジェクト名</h4>
                      <input name="name" type="text"><br>
                    <h4>プロジェクト画像</h4>
                      <input name="img" type="file"><br>
                    <h4>タグ (スペース区切りで複数入力)</h4>
                      @foreach($tags as $tag)
                        <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->name}}
                      @endforeach
                    <h4>プロジェクト概要</h4>
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
