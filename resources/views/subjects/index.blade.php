@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            @foreach($subjects as $subject) 
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span8">

                        <h4><strong><a href="#">{{$subject->name}}</a></strong></h4>

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
                            {{$subject->description}}
                        </p>
                        <p><a class="btn" href="/subjects/{{$subject->id}}">Read More</a></p>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>

@endsection
