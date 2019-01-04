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

    <div class="row ml-1">
        <div class="card mr-3 border-0" style="width: 14rem;">
            <div class="card-body align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <h2 class="font-weight-bold text-success">{{ $brandHits }}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h5 class="text-muted">Brand Hits</h5>
                </div>
            </div>
        </div>
        <div class="card mr-3 border-0" style="width: 14rem;">
            <div class="card-body align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <h2 class="font-weight-bold text-primary">{{ $adCount }}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h5 class="text-muted">Total Advertisments</h5>
                </div>
            </div>
        </div>
        <div class="card mr-3 border-0" style="width: 14rem;">
            <div class="card-body align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <h2 class="font-weight-bold text-warning">{{ $viewCount }}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h5 class="text-muted">Total Views</h5>
                </div>
            </div>
        </div>

    </div>
     

@endsection