@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$user->name}}</h2></div>

                <h4>いいね！</h4>
                <div
                    class="rateit"
                    data-rateit-max="1"
                    data-rateit-value="1"
                    data-rateit-readonly="true"
                ></div>
                <br>
                <a href="/user/{{$user->id}}/marks">詳しく見る</a>

                <h4>自己紹介</h4>
                <p>
                <?php
                for($i = 0;$i < 20;$i++){
                    echo("ダミー");
                }
                ?>
                </p>
                <h4>email</h4>
                <span><a href="mailto:{{$user->email}}">{{$user->email}}</a></span>
                <h4>作った作品</h4>
                <p>NULL</p>
                <br>
                <h4>{{$user->name}}のプロジェクト</h4>
                <ul>
                    <h5>実施中</h5>
                    @if($user->myProjects->where('terminated','=',false)->isEmpty())
                        <li>無し</li>
                    @else
                        @foreach($user->myProjects->where('terminated','=',false) as $project)
                            <li><a href="/project/{{$project->id}}">{{$project->name}}</a></li>
                        @endforeach
                    @endif
                    <h5>終了済み</h5>
                    @if($user->myProjects->where('terminated','=',true)->isEmpty())
                        <li>無し</li>
                    @else
                        @foreach($user->myProjects->where('terminated','=',true) as $project)
                            <li><a href="/project/{{$project->id}}">{{$project->name}}</a></li>
                        @endforeach
                    @endif
                </ul>

                <h4>{{$user->name}}が参加中のプロジェクト</h4>
                <ul>
                    <h5>実施中</h5>
                    @if($user->joiningProjects->where('terminated','=',false)->isEmpty())
                        <li>無し</li>
                    @else
                        @foreach($user->joiningProjects->where('terminated','=',false) as $project)
                            <li><a href="/project/{{$project->id}}">{{$project->name}}</a></li>
                        @endforeach
                    @endif
                    <h5>終了済み</h5>
                    @if($user->joiningProjects->where('terminated','=',true)->isEmpty())
                        <li>無し</li>
                    @else
                        @foreach($user->joiningProjects->where('terminated','=',true) as $project)
                            <li><a href="/project/{{$project->id}}">{{$project->name}}</a></li>
                        @endforeach
                    @endif
                </ul>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
