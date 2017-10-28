@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>ユーザー検索</h2></div>

                <div class="panel-body">
                    <form action="/api/project/search" method="post">
                    <h4>タグ指定</h4>
                      @foreach($tags as $tag)
                          <input type="checkbox" name="tags[]" value="{{$tag->id}}" @if(isset($s_tags) && collect($s_tags)->contains($tag->id)) checked="checked" @endif> {{$tag->name}}
                      @endforeach
                    <h4>検索ワード指定</h4>
                      <input name="word" type="text" @if(isset($s_word)) value="{{$s_word}}" @endif>
                      <br>
                      <br>
                      <input type="submit" value="検索">
                    </form>


                    @if(isset($users))
                    <h2>検索結果</h2>
                    @foreach ($users as $user)
                        <ul>
                            <li>
                                <h4><a href="{{ '/user/'.$user->id }}">{{ $user->name }}</a></h4>
                                <p>{{ $user->outline }}</p>
                            </li>
                        </ul>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
