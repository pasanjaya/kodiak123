@extends('layouts.appad')


@section('content')

    <div class="jumbotron text-center">
        <h1>Welcome to Kodiak Offer!</h1>
        <p>Best offers in one place</p>
        
        {{-- <a class="btn btn-primary btn-lg" href="/login" role="button">Logout</a> --}}
       
        <p>{!!Form::open(['action' => 'Auth\LoginController@logout', 'method' => 'POST'])!!}
            {{Form::submit('Logout', ['class'=> 'btn btn-sm btn-dark ml-3'])}}
        {!!Form::close()!!}</p>

        



    </div>    

@endsection