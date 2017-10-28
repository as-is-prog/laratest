@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$project->name}} プロジェクト</h2></div>
                        <h4>プロジェクト作成者</h4>
                        <ul><li><a href="{{ '/user/'.$project->createdUser->id }}">{{ $project->createdUser->name }}</a></li></ul>

                        @if($project->joinedUsers()->exists())
                        <h4>プロジェクト参加者</h4>
                        @endif
                        <ul>
                            @foreach($project->joinedUsers as $user)
                                <li><a href="{{"/user/".$user->id}}">{{$user->name}}</a></li>
                            @endforeach
                        </ul>

                        <h4>プロジェクト画像</h4>
                          <input name="img" type="file"><br>
                          @if($project->tags()->exists())
                            <h4>募集クリエイタータグ</h4>
                          @endif
                          <ul>
                              @foreach($project->tags as $tag)
                                <li>{{$tag->name}}</li>
                              @endforeach
                          </ul>
                        <h4>プロジェクト概要</h4>
                        <p>{{$project->outline}}</p>
                        <br>
                        <br>
                    <form method="post" action="/project/{{$project->id}}/join">
                        {{csrf_field()}}
                        <h4>プロジェクトに参加する</h4>
                        @if($project->createdUser->id == Auth::user()->id || $project->joinedUsers()->where('id',Auth::user()->id)->exists())
                            <button disabled="disabled">参加済み</button>
                        @else
                            <input type="submit" value="参加">
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
