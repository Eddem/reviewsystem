@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Administrator dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($users as $user)

                            @foreach($user->comments as $comment)
                                Dit is de comment {{$comment->comment}} door {{$comment->user->name}} op {{$comment->subject->name}}<br>

                             @endforeach



                        @endforeach








                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection