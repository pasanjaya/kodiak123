@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Business Profile Create</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['action' => 'BusinessProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="row justify-content-center">
                    <div class="col-md-6 my-auto">
                        <div class="card border-0 card-block d-flex">
                            <div class="card-body">
                                <div class="row justify-content-center mb-4">
                                    <img src="/svg/man.svg" alt="im_advertiser" class="rounded-circle border border-dark mr-2" style="width:120px; height:120px;">
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
                    {{ Form::label('reg_name', 'Registerd Name *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('reg_name', '', ['class' => 'form-control', 'placeholder' => 'Business Registerd Name']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('reg_no', 'Registered No. *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('reg_no','', ['class' => 'form-control', 'placeholder'=> 'Registered No']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('category', 'Category *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::select('category', $category, null, ['class' => 'form-control']) }}
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
                        {{ Form::textarea('about', '', ['class' => 'form-control', 'rows' => 2, 'cols' => 40, 'placeholder' => 'About']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('street', 'Street Name *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('street', '', ['class' => 'form-control', 'placeholder' => 'Street Name']) }}
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
                            'kaluthara' => 'Kaluthara', ], 'colombo1', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tel', 'Telephone No. *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('tel', '', ['class' => 'form-control', 'placeholder' => '011 123 4567']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('url', 'Website (URL)', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('url','', ['class' => 'form-control', 'placeholder' => 'https://www.example.com']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('business_email', 'Business Email *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('business_email', auth()->user()->email,  ['class' => 'form-control', 'placeholder' => 'mail@example.com']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('inq_mail', 'Inquiry Email *', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('inq_mail', '', ['class' => 'form-control', 'placeholder' => 'info@example.com']) }}
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
