@extends('layouts.appad')


@section('content')

    <div class="h2 text-info">Edit Profile</div>
    <hr>
    
    <div class="container">
        <div class="card border-0">
            <div class="card-header bg-transparent">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Business Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="advanced-tab" data-toggle="tab" href="#advanced" role="tab" aria-controls="advanced" aria-selected="false">Advanced Settings</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        {{-- password reset form --}}
                        {!! Form::open(['action' => ['BusinessProfileController@resetPassword'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            
                            <div class="form-group row">
                                {{Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label'])}}
                                <div class="col-sm-10">
                                    {{Form::text('name', auth()->user()->name, ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label'])}}
                                <div class="col-sm-10">
                                    {{Form::email('email', auth()->user()->email, ['class' => 'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('current_pass', 'Current Password', ['class' => 'col-sm-2 col-form-label'])}}
                                <div class="col-sm-10">
                                    {{Form::password('current_pass', ['class' => 'form-control', 'placeholder' => 'Current Password'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('password', 'New Password', ['class' => 'col-sm-2 col-form-label'])}}
                                <div class="col-sm-10">
                                    {{Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('password-confirm', 'Confirm Password', ['class' => 'col-sm-2 col-form-label'])}}
                                <div class="col-sm-10">
                                    {{Form::password('password-confirm', ['class' => 'form-control', 'placeholder' => 'Confirm Password'])}}
                                </div>
                            </div>

                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}

                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        {{-- bussiness profile update form --}}
                        {!! Form::open(['action' => ['BusinessProfileController@update', $profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            
                        <div class="row justify-content-center">
                                <div class="col-md-6 my-auto">
                                    <div class="card border-0 card-block d-flex">
                                        <div class="card-body">
                                            <div class="row justify-content-center mb-4">
                                                <img src="/storage/brand_logos/{{ $profile->image_name }}" alt="im_advertiser" class="rounded-circle border border-dark mr-2" style="width:120px; height:120px;">
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
                                    {{ Form::text('reg_name', $profile->reg_name, ['class' => 'form-control'.($errors->has('reg_name') ? ' is-invalid' : ''), 'placeholder' => 'Business Registerd Name']) }}
                                    
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
                                    {{ Form::text('reg_no', $profile->reg_no, ['class' => 'form-control'.($errors->has('reg_no') ? ' is-invalid' : ''), 'placeholder'=> 'Registered No']) }}
            
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
                                    {{ Form::select('category', $category, $profile->category, ['class' => 'form-control'.($errors->has('category') ? ' is-invalid' : '')]) }}
            
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
                                    {{ Form::textarea('about', $profile->about, ['class' => 'form-control'.($errors->has('about') ? ' is-invalid' : ''), 'rows' => 2, 'cols' => 40, 'placeholder' => 'About']) }}
            
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
                                    {{ Form::text('street', $profile->street, ['class' => 'form-control'.($errors->has('street') ? ' is-invalid' : ''), 'placeholder' => 'Street Name']) }}
            
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
                                        'kaluthara' => 'Kaluthara', ], $profile->city, ['class' => 'form-control'.($errors->has('city') ? ' is-invalid' : '')]) }}
            
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
                                    {{ Form::text('tel', $profile->tel, ['class' => 'form-control'.($errors->has('tel') ? ' is-invalid' : ''), 'placeholder' => '94111234567']) }}
            
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
                                    {{ Form::text('url', $profile->url, ['class' => 'form-control'.($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'https://www.example.com']) }}
            
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
                                    {{ Form::text('business_email', $profile->business_email,  ['class' => 'form-control'.($errors->has('business_email') ? ' is-invalid' : ''), 'placeholder' => 'mail@example.com']) }}
            
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
                                    {{ Form::text('inq_mail', $profile->inq_mail, ['class' => 'form-control'.($errors->has('inq_mail') ? ' is-invalid' : ''), 'placeholder' => 'info@example.com']) }}
            
                                    @if ($errors->has('inq_mail'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('inq_mail') }}</strong>
                                        </span>
                                    @endif
            
                                </div>
                            </div>

                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}

                        {!! Form::close() !!}
                    </div>

                    
                    <div class="tab-pane fade d-flex justify-content-center" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">
                        <div class="card border-danger" style="width:30rem">
                            <div class="card-header bg-transparent border-0 d-flex justify-content-center">
                                <h5>Permanently Delete Account</h5>
                            </div>
                            <div class="card-body">
                                {{-- business profile deletion form --}}
                                {!! Form::open(['action' => ['BusinessProfileController@destroy', auth()->user()->id ], 'method' => 'POST', 'class'=>'confirm_delete']) !!}
                                    
                                    <p class="small text-danger">Please note that this process can not be un-done</p>

                                    <div class="form-group">
                                        {{ Form::label('password','Password') }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                                    </div>

                                    {{ Form::submit('Permanently Delete My Account', ['class' => 'btn btn-danger']) }}

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection