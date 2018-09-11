@extends('layouts.app')

@section('content')

            <h1>Create Advertisement</h1>
            {!! Form::open(['action' => 'AdvertisementController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title *')}}
                    {{Form::text('title', '', ['class'=> 'form-control', 'placeholder' => 'Title'])}}
                    
                </div>
                <div class="form-group">
                    {{Form::label('subtitle', 'Subtitle')}}
                    {{Form::text('subtitle', '', ['class'=> 'form-control', 'placeholder' => 'Subtitle'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description', '', ['id'=> 'article-ckeditor','class'=> 'form-control', 'placeholder' => 'Description'])}}
                </div>
                <div class="form-group">
                    {{Form::label('tags', 'Tags *')}}
                    {{Form::text('tags', '', ['class'=> 'form-control', 'placeholder' => 'Tags'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Offer ad Image *')}}
                    {{Form::file('image', ['class'=> 'form-control-file', 'placeholder' => 'Image'])}}
                </div>
                
                <div class="form-group">
                    {{Form::label('start_date', 'Offer Start On * (mm/dd/yyyy)')}}
                    {{Form::date('start_date', \Carbon\Carbon::now()->toDateString(), ['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('end_date', 'Offer End On * (mm/dd/yyyy)')}}
                    {{Form::date('end_date', \Carbon\Carbon::tomorrow()->toDateString(), ['class'=> 'form-control'])}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
            </main>
        </div>
    </div>   

@endsection