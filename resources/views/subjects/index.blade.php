@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-md-5 col-lg-4 offset-3">

                <form method="POST" action="{{URL('subjects')}}" role="search">
                    {{ csrf_field() }}
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" name="search" class="form-control input-lg" placeholder="zoek onderwerp" />
                            <button class="btn btn-info btn-lg" type="submit">Zoek</button>
                        </div>


                    </div>
                </form>

                <div class="input-group col-md-12 offset-1">
                    <form method="POST" action="{{URL('subjects')}}/filter" role="search">
                        {{ csrf_field() }}
                        <input type="checkbox" name="filter" value="1" data-toggle="toggle">
                        uw onderwerpen
                    <button class="btn btn-light btn-sm" type="submit">filter</button>
                    </form>
                </div>

            </div>

            <div class="col-sm-6 col-md-5 col-lg-6 offset-3">
                <div class="panel-heading">
                    <h1>Onderwerpen</h1>
                 </div>


                @if( ! empty($results))
                @foreach($results as $result) 

                <h4><strong><a href="#">{{$result->name}}</a></strong></h4>

                <div class="span2">
                    <a href="/subjects/" class="thumbnail">
                        <img src="http://placehold.it/260x180" alt="">
                    </a>
                </div>
                <div class="span10">
                    <p>
                        {{$result->name}}
                    </p>
                    <p>
                        <a class="btn" href="/subjects/{{$result->id}}">Reageer</a>
                    </p>
                @endforeach
                @endif


                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                @if( ! empty($subjects))
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
                @endif
                </div>
        </div>
    </div>



@endsection
