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
                        <p>comment text</p>
                    </div>
                    <div class="form-group">
                        <form>
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                        <button type="submit" class="btn btn-danger">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
