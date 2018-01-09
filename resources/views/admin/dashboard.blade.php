@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-4 offset-2">
                <div class="panel-heading"><h2>Onderwerpen</h2></div>
                @foreach($users as $user)
                    @foreach($user->comments as $comment)
                        Dit is de comment {{$comment->comment}} door {{$comment->user->name}} op {{$comment->subject->name}}<br>
                    @endforeach
                @endforeach
            </div>

            <div class="col-sm-6 col-md-5 offset-md-2 col-lg-5 offset-lg-0">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Administrator dashboard</h2>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>naam</th>
                        <th>e-mail</th>
                        <th>pagina</th>
                        <th>verwijderen</th>
                        <th>wijzigen</th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td><a href="{{ url('user') }}/{{$user->id}}">{{ url('user') }}/{{$user->id}}</a></td>

                            <td>
                                <form method="POST" action="{{ url('user')}}/{{$user->id}}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-outline-danger">verwijder</button>
                                </form>
                            </td>


                            <td>
                                <a href="{{ url('dashboard')}}/user/{{$user->id}}/edit">
                                    <button type="button" class="btn btn-outline-info">wijzig</button>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>


                <table class="table">
                    <thead>
                    <tr>
                        <th>naam</th>
                        <th>e-mail</th>
                        <th>wachtwoord</th>
                        <th>toevoegen</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        @foreach($users as $user)
                            <form method="POST" action="{{ url('dashboard')}}/user/{{$user->id}}">
                                @endforeach
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="naam">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="e-mail">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="wachtwoord">
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-outline-success">voeg toe</button>
                                </td>
                            </form>
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>

            {{--<div class=".col-sm-6 .col-md-5 .col-lg-6">--}}
                {{----}}
            {{--</div>--}}

            {{--<div class=".col-sm-4 .col-md-4 .col-lg-4 offset-6">--}}
                {{----}}
            {{--</div>--}}
@endsection