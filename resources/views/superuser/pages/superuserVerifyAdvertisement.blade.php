@extends('superuser.layouts.superuserAppad')

@section('content')

            <div class="mt-5">
                <h3>Unverified offers</h3>
                @if(count($ads) > 0)
                    <div class="row">
                        @foreach ($ads as $ad)

                            <a href="/dashboard/verifyAd/{{$ad->id}}">
                                <div class="card border-primary mt-5 mb-4 mr-5 ml-5 float-left" style="min-width:20rem; max-width: 30rem; max-height:20rem">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div class="d-flex justify-content-start">
                                                ID: {{$ad->id}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-primary">
                                        <img class="card-img-top w-25 mr-5 float-left" style="max-height:13rem" src="/storage/advertisement_images/{{$ad->image_name}}" alt="ad image">
                                        <h5 class="card-title">{{$ad->title}}</h5>
                                        <p class="card-text">{{$ad->created_at}}</p>
                                    </div>                           
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="float-right mt-5">
                            {{$ads->links()}}
                        </div>
                    </div>
                    
                    
                @else
                    <p>No offer created yet !</p>
                @endif
            </div>
            </main>
        </div>
    </div>


@endsection