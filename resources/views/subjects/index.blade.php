@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-md-5 col-lg-4 offset-3">

                <form method="POST" action="{{URL('subjects')}}/search" role="search">
                    {{ csrf_field() }}
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" name="search" class="form-control input-lg" placeholder="zoek onderwerp" />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="submit">Zoek</button>
                        </span>
                        </div>
                    </div>
                </form>

            </div>

            <div class="col-sm-6 col-md-5 col-lg-6 offset-3">
                <div class="panel-heading">
                    <h1>Onderwerpen</h1>
                 </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach($subjects as $subject) 


                <h4><strong><a href="#">{{$subject->name}}</a></strong></h4>

                <div class="span2">
                    <a href="/subjects/{{$subject->id}}" class="thumbnail">
                        <img src="http://placehold.it/260x180" alt="">
                    </a>
                </div>
                <div class="span10">
                    <p>
                        {{$subject->description}}
                    </p>
                    <p>
                        <a class="btn" href="/subjects/{{$subject->id}}">Reageer</a>
                    </p>
                    @endforeach
                </div>

        </div>
    </div>



@endsection
