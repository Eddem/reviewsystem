@extends('layouts.app')

@section('content')

    <div class="container">


                <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-7 offset-4">
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/260x180" alt="">
                        </a>

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


@endsection
