@extends('layouts.appad')

@section('content')

            <div class="mt-2">
                <h3>Published Offers <span class="feather-24-success" data-feather="check-circle"></span></h3>
                @if(count($ads) > 0)
                    <div class="row">
                        @foreach ($ads as $ad)
                            <div class="card border-primary mt-5 mb-4 mr-5 ml-5 float-left" style="min-width:20rem; max-width: 30rem; max-height:20rem">
                                <div class="card-header" style="height:75px;">ID: {{ $ad->id }}

                                    {!! Form::open(['action' => ['AdvertisementController@destroy', $ad->id], 'method' => 'POST', 'class'=>'confirm_delete']) !!}
                                        {{ Form::hidden('_method', 'DELETE')}}
                                        {{ Form::submit('Delete', ['class'=> 'btn btn-sm btn-danger ml-3 float-right']) }}
                                    {!! Form::close() !!}                            
                                </div>
                                <div class="card-body text-primary">
                                    <img class="card-img-top w-25 mr-5 float-left" style="max-height:13rem" src="/storage/advertisement_images/{{$ad->image_name}}" alt="ad image">
                                    <h5 class="card-title"><a href="offers/{{ $ad->id }}">{{ $ad->title }}</a></h5>
                                    <h6 class="card-text"><span class="text-secondary">Created at: </span>{{ $ad->created_at }}</h6>
                                        @if($today > $ad->end_date)
                                            <span class="text-danger">Expired Offer</span>
                                        @endif
                                </div>                           
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="float-right mt-5">
                            {{ $ads->links() }}
                        </div>
                    </div>
                    
                @else
                    <p>No offer created yet !</p>
                @endif
            </div>
            <hr>
            <div class="mt-2 ">
                    
                    @if(count($rejects) > 0)
                    <h3>Rejected Advertiesments <span class="feather-24" data-feather="alert-circle"></span></h3>
                        <div class="row">
                            @foreach ($rejects as $reject)
                                <div class="card border-danger mt-5 mb-4 mr-5 ml-5 float-left" style="min-width:20rem; max-width: 30rem; max-height:20rem">
                                    <div class="card-header alert-danger" style="height:75px;">ID: {{$reject->id}}
                                        {!!Form::open(['action' => ['AdvertisementController@destroy', $reject->id], 'method' => 'POST', 'class'=>'confirm_delete'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class'=> 'btn btn-sm btn-danger ml-3 float-right'])}}
                                        {!!Form::close()!!}                            
                                    </div>
                                    <div class="card-body text-primary">
                                        <img class="card-img-top w-25 mr-5 float-left" src="/storage/advertisement_images/{{$reject->image_name}}" alt="ad image">
                                        <h5 class="card-title"><a href="offers/{{$reject->id}}">{{ $reject->title }}</a></h5>
                                        <h6 class="card-text"><span class="text-secondary">Created at: </span>{{ $reject->created_at }}</h6>
                                            @if($today > $ad->end_date)
                                                <span class="text-danger">Expired Offer</span>
                                            @endif
                                    </div>                           
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="float-right mt-5">
                                {{$rejects->links()}}
                            </div>
                        </div>
                        
                    @endif
                </div>
            <a href="offers/create" class="float"><span class="my-float" data-feather="plus"></span></a>
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $( ".confirm_delete" ).submit(function( event ) {
                event.preventDefault();
                
                swal({
                    title: 'Are you sure?',
                    text: "Please click confirm to delete this item",
                    type: 'warning',
                    buttons: true,
                    buttons: ["No, cancel!", "Yes, delete it!"],
                    dangerMode: true,

                })
                .then((willDelete) => {
                    if(willDelete){
                        $(this).off("submit").submit();
                }else{
                    // swal("Your imaginary file is safe!");
                    swal('Cancelled', 'Delete Cancelled', 'info');
                }
                });
            });
        });
</script>  

@endsection