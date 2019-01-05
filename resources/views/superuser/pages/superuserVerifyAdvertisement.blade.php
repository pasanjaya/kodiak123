@extends('superuser.layouts.superuserAppad')

@section('content')

            <!-- <div class="jumbotron text-right" style="min-height: 14rem">
                <div class="logo">
                    <img src="/storage/brand_logos/noLogo.png" style="height: 100%; width: 100%;" alt="logo">
                </div>
                <p>
                <a href="" class="btn btn-dark btn-lg float-left mt-3" role="button">Edit Profile</a>
                {{-- {!!Form::open(['action' => 'Auth\LoginController@logout', 'method' => 'POST'])!!}
                    {{Form::submit('Logout', ['class'=> 'btn btn-sm btn-dark mt-3 ml-3'])}}
                {!!Form::close()!!}--}}
                </p> 

                
            </div> -->
            <div class="mt-5">
                <h3>Unverified offers</h3>
                @if(count($ads) > 0)
                    <div class="row">
                        @foreach ($ads as $ad)
                            <div class="card border-primary mt-5 mb-4 mr-5 ml-5 float-left" style="max-width: 35rem;">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <div class="d-flex justify-content-start">
                                            ID: {{$ad->id}}
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <form action="{{ url('/dashboard/verifyAd/verify')}}" method="post">
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                <input type="hidden" name="id" value="{{ $ad->id }}">
                                                <input type="submit" class="btn btn-sm btn-primary mr-2" value="Verify">
                                            </form>

                                            <form action="{{ url('/dashboard/verifyAd/reject')}}" method="post">
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                <input type="hidden" name="id" value="{{ $ad->id }}">
                                                <input type="submit" class="btn btn-sm btn-danger" value="Reject">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-primary">
                                    <img class="card-img-top w-25 mr-5 float-left" src="/storage/advertisement_images/{{$ad->image_name}}" alt="ad image">
                                    <h5 class="card-title"><a href="offers/{{$ad->id}}">{{$ad->title}}</a></h5>
                                    <p class="card-text">{{$ad->created_at}}</p>
                                </div>                           
                            </div>
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