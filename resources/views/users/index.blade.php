@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-sm-6 col-md-5 col-lg-7 offset-4">
                <div class="panel-heading"><h1>Uw overzicht</h1></div>
                    <div class="panel panel-default">

                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                        </div>




                </div>
            </div>
        </div>


            <div class="col-sm-6 col-md-5 col-lg-4 offset-2">
                <h2>Uw onderwerpen</h2>

                    <div class="card">
                        @foreach($id->subjects as $subject)
                        <div class="card-body">

                            <h5 class="card-title">{{$subject->name}}</h5>
                            <p class="card-text">{{$subject->description}}</p>

                                {{--<form method="POST" action="/user/{{$id->id}}/subject">--}}
                                    {{--{{ method_field('DELETE') }}--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="submit" value="verwijder" class="btn btn-outline-danger float-right">--}}
                                {{--</form>--}}

                        </div>
                        @endforeach
                    </div>





            </div>


            <div class="col-sm-6 col-md-5 col-lg-4 offset-0">
                <h2>Voeg een onderwerp toe</h2>
                <div class="form-group">
                    <form method="POST" action="/user/{{$id->id}}/subject">
                        {{ csrf_field() }}
                        <label for="name">Onderwerp titel</label>

                        <input class="form-control" rows="5" name="name" id="description">


                        <label for="comment">Omschrijving</label>

                        <textarea class="form-control" rows="5" name="description" id="description"></textarea>

                        <button type="submit" class="btn btn-danger float-right">Submit</button>

                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
