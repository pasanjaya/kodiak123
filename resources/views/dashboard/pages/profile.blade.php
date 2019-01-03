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
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        
                        {!! Form::open(['action' => ['BusinessProfileController@update', auth()->user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            
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
                                {{Form::label('new_pass', 'New Password', ['class' => 'col-sm-2 col-form-label'])}}
                                <div class="col-sm-10">
                                    {{Form::password('new_pass', ['class' => 'form-control', 'placeholder' => 'New Password'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('confirm_pass', 'Confirm Password', ['class' => 'col-sm-2 col-form-label'])}}
                                <div class="col-sm-10">
                                    {{Form::password('confirm_pass', ['class' => 'form-control', 'placeholder' => 'Confirm Password'])}}
                                </div>
                            </div>

                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}

                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        {!! Form::open(['action' => ['BusinessProfileController@update', auth()->user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            
                            <div class="row justify-content-center">
                                <div class="col-md-6 my-auto">
                                    <div class="card border-0 card-block d-flex">
                                        <div class="card-body">
                                            <div class="row justify-content-center mb-4">
                                            <img src="/storage/brand_logos/{{ $brand[0]->image_name }}" alt="im_advertiser" class="rounded-circle border border-dark mr-2" style="width:120px; height:120px;">
                                            </div>

                                            <div class="form-group">
                                                <div class="row text-center justify-content-center">
                                                    {{Form::label('image_name', 'Upload a different image')}}
                                                    {{Form::file('image_name', ['class'=> 'form-control-file, border', 'placeholder' => 'Image'])}}
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('reg_name', 'Registerd Name', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('reg_name', $brand[0]->reg_name, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('reg_no', 'Registered No', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('reg_no', $brand[0]->reg_no, ['class' => 'form-control', 'placeholder'=> 'Registered No']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('category', 'Category', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::select('category', [null => 'Choose...', 'one' => '...'], null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                {{ Form::label('sub_category', 'Sub Category', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::select('sub_category', [null => 'Choose...', 'one' => '...'], null, ['class' => 'form-control']) }}
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                {{ Form::label('about', 'About Business', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::textarea('about', $brand[0]->about, ['class' => 'form-control', 'rows' => 2, 'cols' => 40 ]) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('street', 'Street Name', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('street', $brand[0]->street, ['class' => 'form-control', 'placeholder' => 'Street Name']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('city', 'City', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::select('city', [null => 'Choose...', 'colombo' => 'Colombo'], null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('tel', 'Telephone No.', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('tel', $brand[0]->tel, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('url', 'Website (URL)', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('url', $brand[0]->url, ['class' => 'form-control', 'placeholder' => 'https://www.example.com']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('business_email', 'Business Email', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('business_email', $brand[0]->business_email, ['class' => 'form-control', 'placeholder' => 'mail@example.com']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('inq_mail', 'Inquiry Email', ['class' => 'col-sm-2 col-form-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('inq_mail', $brand[0]->inq_mail, ['class' => 'form-control', 'placeholder' => 'info@example.com']) }}
                                </div>
                            </div>

                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}

                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
            </div>
        </div>
    </div>

@endsection