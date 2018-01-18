@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-5 offset-4">
                <div class="panel-heading">
                    <h2 class="display-4">{{$id->name}}</h2>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-5 offset-1">
                <div class="span2">
                    <a href="#" class="thumbnail">
                        <img src="http://placehold.it/520x360" alt="">
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-md-5 offset-md-2 col-lg-4 offset-lg-1">
                <h4>Beschrijving</h4>
                <p>
                    {{$id->description}}
                </p>
            </div>

            <div class="col-sm-6 col-md-5 col-lg-10 offset-1">
                <div id="accordion" role="tablist">
                    <div class="card">
                        @foreach($id->comments as $comment)
                        <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0">
                                    <form method="POST" action="{{ url('subjects')}}/{{$comment->id}}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-outline-danger float-right">X</button>
                                    </form>
                                <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $comment->user->name }}
                                </a>
                                <a href="/comments/{{ $comment->id }}/edit"><button class="btn btn-outline-info float-right">wijzig</button></a>

                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {{ $comment->comment }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-5 col-lg-10 offset-1">
                    <div class="form-group">
                        <form method="POST" action="/subjects/{{$id->id}}">
                            {{ csrf_field() }}
                        <label for="comment">Comment:</label>

                        <textarea class="form-control" rows="5" name="comment" id="comment">{{old('comment')}}</textarea>

                        <button type="submit" class="btn btn-danger float-right">Submit</button>

                        </form>
                    </div>
             </div>
                    {{--{{var_dump($errors)}}--}}
        </div>
    </div>

@endsection
