@extends('layouts.app')

@section('content')

            <h3>{{$ads->title}}</h3>
           
                <div class="well">
                    <small>{{$ads->tags}}</small>
                    <p>{!!$ads->description!!}</p>
                    <p>{{$ads->start_date}} to {{$ads->end_date}}</p>
                </div>

            </main>
        </div>
    </div>   

@endsection