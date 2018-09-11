@extends('layouts.app')

@section('content')

            <h1>Advertisement</h1>
            @if(count($ads) > 0)
                @foreach ($ads as $ad)
                    <div class="well">
                        <h3><a href="advertisement/{{$ad->id}}">{{$ad->title}}</a></h3>
                        <small>{{$ad->tags}}</small>
                        <p>{{$ad->description}}</p>
                        <p>{{$ad->start_date}} to {{$ad->end_date}}</p>
                    </div>
                @endforeach
                {{$ads->links()}}
            @else
                <p>No advertisement found</p>
            @endif
            </main>
        </div>
    </div>   

@endsection