@extends('superuser.layouts.superuserAppad')

@section('content')
            <div class="container">
            
                <div class="d-flex justify-content-end">
                    <form action="{{ url('/dashboard/verifyAd/verify')}}" method="post">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input type="hidden" name="id" value="{{ $ads->id }}">
                        <input type="submit" class="btn btn-sm btn-primary mr-2" value="Verify">
                    </form>

                    <form action="{{ url('/dashboard/verifyAd/reject')}}" method="post">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input type="hidden" name="id" value="{{ $ads->id }}">
                        <input type="submit" class="btn btn-sm btn-danger" value="Reject">
                    </form>
                </div>





                 
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