@extends('layouts.appad')

@section('content')
            <div class="container">
                <div class="card border-info" style="width: 75rem;">
                    <h2 class="card-header mb-5">Update Advertisement</h2>
                    <div class="card-body container">
                        {{-- update advertiesment form --}}
                    {!! Form::open(['action' => ['AdvertisementController@update', $ads->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group col-10">
                            {{Form::label('title', 'Title *')}}
                            {{Form::text('title', $ads->title, ['class'=> 'form-control', 'placeholder' => 'Title'])}}
                            
                        </div>
                        <div class="form-group col-10">
                            {{Form::label('subtitle', 'Subtitle')}}
                            {{Form::text('subtitle', $ads->subtitle, ['class'=> 'form-control', 'placeholder' => 'Subtitle'])}}
                        </div>
                        <div class="form-group col-10">
                            {{Form::label('description', 'Description')}}
                            {{Form::textarea('description', $ads->description, ['id'=> 'article-ckeditor','class'=> 'form-control', 'placeholder' => 'Description'])}}
                        </div>
                        <div class="form-group col-10">
                            {{Form::label('tags', 'Tags *')}}
                            {{Form::text('tags', $ads->tags, ['class'=> 'form-control', 'placeholder' => 'Tags'])}}
                        </div>
                        <div class="form-group col-10">
                            {{Form::label('image', 'Offer ad Image *')}}
                            {{Form::file('image', ['class'=> 'form-control-file', 'placeholder' => 'Image'])}}
                        </div>
                        
                        <div class="form-group col-6">
                            {{Form::label('start_date', 'Offer Start On * (mm/dd/yyyy)')}}
                            {{Form::date('start_date', $ads->start_date, ['class'=> 'form-control'])}}
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('end_date', 'Offer End On * (mm/dd/yyyy)')}}
                            {{Form::date('end_date', $ads->end_date, ['class'=> 'form-control'])}}
                        </div>
                        <div class="form-group col-3 mt-5">
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

{{-- Change text editer to ckEditer --}}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

@endsection