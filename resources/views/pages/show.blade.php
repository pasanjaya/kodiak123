@extends('layouts.appad')

@section('content')
            <div class="container">
                
                {{-- <a href="/offers/{{$ads->id}}/" class="btn btn-danger ml-3 mt-3 float-right">Delete</a> --}}
                {!!Form::open(['action' => ['AdvertisementController@destroy', $ads->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class'=> 'btn btn-danger ml-3 mt-3 float-right'])}}
                {!!Form::close()!!}
                <a href="/offers/{{$ads->id}}/edit" class="btn btn-primary ml-3 mt-3 float-right">Update</a>
                
                <div class="card bg-light mb-3" style="max-width: 100rem;">
                    <div class="card-header h3">{{$ads->title}}</div>
                    <img class="card-img-top w-100" src="/storage/advertisement_images/{{$ads->image_name}}" alt="ad image">
                    <div class="card-body">
                    <h5 class="card-title h4">{{$ads->start_date}} to {{$ads->end_date}}</h5>
                    <p class="card-text">{!!$ads->description!!}</p>
                    </div>
                    <div class="card-footer bg-light border-default">tags: {{$ads->tags}}</div>
                </div>
            </div>

            </main>
        </div>
    </div>   

@endsection