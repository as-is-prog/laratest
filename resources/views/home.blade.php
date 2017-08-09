@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    SNSへようこそ！　まずはプロフィールを作成し、作品登録を行うのがおすすめです！<br>
                    やりたいことがある方はプロジェクトを作成して人を募りましょう！<br>
                    何かやりたい！という方は興味のあるタグでプロジェクトを検索してみましょう！
                    <ul>
                      <li><a href="/product/register">作品登録</a></li>
                      <li><a href="/project/create">プロジェクト新規作成</a></li>
                      <li><a href="/project/search">プロジェクト検索</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
