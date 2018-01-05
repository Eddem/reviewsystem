@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span8">

                        <h4><strong><a href="#">{{$id->name}}</a></strong></h4>

                    </div>
                </div>
                <div class="row">
                    <div class="span2">
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/260x180" alt="">
                        </a>
                    </div>
                    <div class="span10">
                        <p>
                            {{$id->description}}
                        </p>
                        @foreach($id->comments as $comment)
                            <a href="/comments/{{ $comment->id }}/edit">{{ $comment->comment }}</a></br>
                            <p>{{ $comment->user->name }}</p>
                        @endforeach


                    </div>
                    <div class="form-group">
                        <form method="POST" action="/subjects/{{$id->id}}">

                            {{ csrf_field() }}


                        <label for="comment">Comment:</label>

                        <textarea class="form-control" rows="5" name="comment" id="comment">{{old('comment')}}</textarea>

                        <button type="submit" class="btn btn-danger">Submit</button>

                        </form>
                    </div>

                    {{var_dump($errors)}}

                </div>
            </div>
        </div>
    </div>

@endsection
