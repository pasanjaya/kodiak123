@extends('layouts.appad')

@section('content')

            <h1 class="mb-5">Update Advertisement</h1>

            {!! Form::open(['action' => ['AdvertisementController@update', $ads->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title *')}}
                    {{Form::text('title', $ads->title, ['class'=> 'form-control', 'placeholder' => 'Title'])}}
                    
                </div>
                <div class="form-group">
                    {{Form::label('subtitle', 'Subtitle')}}
                    {{Form::text('subtitle', $ads->subtitle, ['class'=> 'form-control', 'placeholder' => 'Subtitle'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description', $ads->description, ['id'=> 'article-ckeditor','class'=> 'form-control', 'placeholder' => 'Description'])}}
                </div>
                <div class="form-group">
                    {{Form::label('tags', 'Tags *')}}
                    {{Form::text('tags', $ads->tags, ['class'=> 'form-control', 'placeholder' => 'Tags'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Offer ad Image *')}}
                    {{Form::file('image', ['class'=> 'form-control-file', 'placeholder' => 'Image'])}}
                </div>
                
                <div class="form-group">
                    {{Form::label('start_date', 'Offer Start On * (mm/dd/yyyy)')}}
                    {{Form::date('start_date', $ads->start_date, ['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('end_date', 'Offer End On * (mm/dd/yyyy)')}}
                    {{Form::date('end_date', $ads->end_date, ['class'=> 'form-control'])}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
            </main>
        </div>
    </div>   

@endsection