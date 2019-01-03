@extends('layouts.appad')


@section('content')

    <div class="jumbotron text-center" style="min-height: 14rem">
            <div class="logo">
                <img src="/storage/brand_logos/{{$profile->image_name}}" style="max-width: 100%; top:50%; left:50%" alt="logo">
            </div>
            <p>
                <a href="/dashboard/profile" class="btn btn-dark btn-lg float-left mt-3" role="button">Edit Profile</a>
            </p> 
    </div>    

@endsection