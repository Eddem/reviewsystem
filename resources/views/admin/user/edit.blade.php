@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-2 offset-2">
                <div class="panel-heading">
                    <h2>Aanpassen</h2>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th>naam</th>
                            <th>e-mail</th>
                            <th>wachtwoord</th>
                            <th>wijzig</th>
                        </tr>
                        </thead>
                        <tbody>
                            <form method="POST" action="{{ url('dashboard')}}/user/{{$id->id}}">
                                {{ method_field('PATCH') }}
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
                                        <button type="submit" class="btn btn-outline-info">wijzig</button>
                                </td>
                            </form>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
