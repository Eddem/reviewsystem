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

                        {{--<h4><strong>{{$id->comment}}</strong></h4>--}}

                    </div>
                </div>
                <div class="row">
                    <div class="span2">
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/260x180" alt="">
                        </a>
                    </div>

                    <div class="span10">
                    </div>

                    <div class="form-group">
                        <form class="form-check-inline" method="POST" action="/comments/{{$id->id}}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group">
                            <label for="comment">Comment:</label>
                            <input type="text" class="form-control" rows="5" name="comment" value="{{$id->comment}}" id="comment">
                            </div>
                            <button type="submit" class="btn btn-danger">Edit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
