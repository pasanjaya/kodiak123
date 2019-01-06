@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Business Profile Create</h3>
        </div>
        <div class="card-body">
                <div class="alert alert-warning">Please create a profile first</div>
            {!! Form::open(['action' => 'BusinessProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="row justify-content-center">
                    <div class="col-md-6 my-auto">
                        <div class="card border-0 card-block d-flex">
                            <div class="card-body">
                                <div class="row justify-content-center mb-4">
                                    <img src="/storage/brand_logos/nopic.jpg" alt="im_advertiser" class="rounded-circle border border-dark mr-2" style="width:120px; height:120px;">
                                </div>

                                <div class="form-group">
                                    <div class="row text-center justify-content-center">
                                        {{Form::label('image_name', 'Upload a different image')}}
                                        {{Form::file('image_name', ['class'=> 'form-control-file'.($errors->has('image_name') ? ' is-invalid' : ''), 'placeholder' => 'Image'])}}

                                        @if ($errors->has('image_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image_name') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    {{ Form::label('reg_name', 'Registerd Name *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('reg_name', '', ['class' => 'form-control'.($errors->has('reg_name') ? ' is-invalid' : ''), 'placeholder' => 'Business Registerd Name']) }}
                        
                        @if ($errors->has('reg_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('reg_name') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('reg_no', 'Registered No. *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('reg_no','', ['class' => 'form-control'.($errors->has('reg_no') ? ' is-invalid' : ''), 'placeholder'=> 'Registered No']) }}

                        @if ($errors->has('reg_no'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('reg_no') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('category', 'Category *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::select('category', $category, null, ['class' => 'form-control'.($errors->has('category') ? ' is-invalid' : '')]) }}

                        @if ($errors->has('category'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                {{-- <div class="form-group row">
                    {{ Form::label('sub_category', 'Sub Category', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::select('sub_category', [AdvertiesmentCategory::get('category'), 'one' => '...'], null, ['class' => 'form-control']) }}
                    </div>
                </div> --}}

                <div class="form-group row">
                    {{ Form::label('about', 'About Business', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('about', '', ['class' => 'form-control'.($errors->has('about') ? ' is-invalid' : ''), 'rows' => 2, 'cols' => 40, 'placeholder' => 'About']) }}

                        @if ($errors->has('about'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('about') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('street', 'Street Name *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('street', '', ['class' => 'form-control'.($errors->has('street') ? ' is-invalid' : ''), 'placeholder' => 'Street Name']) }}

                        @if ($errors->has('street'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('city', 'City *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::select('city', [
                            'colombo1' => 'Colombo 1',
                            'colombo2' => 'Colombo 2',
                            'dehiwala' => 'Dehiwala-Mount Lavinia',
                            'moratuwa' => 'Moratuwa',
                            'kaluthara' => 'Kaluthara', ], 'colombo1', ['class' => 'form-control'.($errors->has('city') ? ' is-invalid' : '')]) }}

                        @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tel', 'Telephone No. *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('tel', '', ['class' => 'form-control'.($errors->has('tel') ? ' is-invalid' : ''), 'placeholder' => '94111234567']) }}

                        @if ($errors->has('tel'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tel') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('url', 'Website (URL)', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('url','', ['class' => 'form-control'.($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'https://www.example.com']) }}

                        @if ($errors->has('url'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('business_email', 'Business Email *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('business_email', auth()->user()->email,  ['class' => 'form-control'.($errors->has('business_email') ? ' is-invalid' : ''), 'placeholder' => 'mail@example.com']) }}

                        @if ($errors->has('business_email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('business_email') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('inq_mail', 'Inquiry Email *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('inq_mail', '', ['class' => 'form-control'.($errors->has('inq_mail') ? ' is-invalid' : ''), 'placeholder' => 'info@example.com']) }}

                        @if ($errors->has('inq_mail'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('inq_mail') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>





@endsection
