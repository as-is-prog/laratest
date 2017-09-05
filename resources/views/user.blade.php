@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$user->name}}</h2></div>

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
                    <br>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
