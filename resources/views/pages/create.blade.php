@extends('layouts.app')

@section('content')

            <h1>Create Advertisement</h1>
            {!! Form::open(['action' => 'AdvertisementController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', ' ', ['class'=> 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('title', ' ', ['class'=> 'form-control', 'placeholder' => 'Description'])}}
                </div>
            {!! Form::close() !!}
            </main>
        </div>
    </div>   

@endsection