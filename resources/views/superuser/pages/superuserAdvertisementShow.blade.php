@extends('superuser.layouts.superuserAppad')

@section('content')
            <div class="container">
                
                <a href="/dashboard/verifyAd/show/{{$ads->id}}/" class="btn btn-danger ml-3 mt-3 float-right">Reject</a>
                {{-- {!!Form::open(['action' => ['AdvertisementController@destroy', $ads->id], 'method' => 'POST', 'class'=>'confirm_delete'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class'=> 'btn btn-danger ml-3 mt-3 float-right'])}}
                {!!Form::close()!!} --}}
                <a href="/dashboard/verifyAd/show/{{$ads->id}}/" class="btn btn-primary ml-3 mt-3 float-right">Verify</a>
                 
                 <div class="card bg-light border-info mb-3" style="max-width: 100rem;"> 
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
                            $(".confirm_delete").off("submit").submit();
                    }else{
                        // swal("Your imaginary file is safe!");
                        swal('Cancelled', 'Delete Cancelled', 'info');
                    }
                    });
                });
            });
    </script>

@endsection