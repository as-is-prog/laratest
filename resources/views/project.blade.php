@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$project->name}}</h2></div>

                    <h4>プロジェクト作成者</h4>
                    <span><a href="{{ '/user/'.$users[0]->id }}">{{ $users[0]->name }}</a></span>
                    <h4>プロジェクト画像</h4>
                      <input name="img" type="file"><br>
                    <h4>タグ (スペース区切りで複数入力)</h4>
                      <input name="tags" type="text"><br>
                    <h4>プロジェクト概要</h4>
                    <p>{{$project->outline}}</p>
                    <br>
                    <br>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
