@extends('layouts.appad')

@section('content')

            <div class="mt-4 mb-5">
                <h3>Select Your Packages</h3>
            </div>
            <div class="container mt-5">
                <div class="d-flex justify-content-center">
                    <div class="card-deck" style="width:40rem">
                        <div class="card" style="max-width:20rem">
                            <div class="card-header" style="background-color:#283B4D">
                                <h3 class="text-white d-flex justify-content-center">Starter</h3>
                            </div>
                            <div class="card-body d-flex justify-content-center" style="background-color:#2F9F9E">
                                <div class="text-white text-align-center d-flex justify-content-center" style="height:100px; width:100px; line-height:100px; border:2px solid #fff; border-radius:100%">
                                    <span>Rs 1500/-</span>
                                </div>
                            </div>  
                            <div class="card-body d-flex justify-content-center">
                                <p>Offer validity 15 days</p>
                            </div>
                            <div class="card-footer" style="background-color:#2F9F9E">
                                <div class="d-flex justify-content-center">
                                    <a href="offers/create" class="btn text-dark" style="border-color:#fff; background-color:#2F9F9E">Process</a>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="max-width:20rem">
                            <div class="card-header" style="background-color:#283B4D">
                                <h3 class="text-white d-flex justify-content-center">Standard</h3>
                            </div>
                            <div class="card-body d-flex justify-content-center" style="background-color:#9C5D7A">
                                <div class="text-white text-align-center d-flex justify-content-center" style="height:100px; width:100px; line-height:100px; border:2px solid #fff; border-radius:100%">
                                    <span>Rs 2000/-</span>
                                </div>
                            </div>  
                            <div class="card-body d-flex justify-content-center">
                                <p>Offer validity 30 days</p>
                            </div>
                            <div class="card-footer" style="background-color:#9C5D7A">
                                <div class="d-flex justify-content-center">
                                    <a href="offers/create" class="btn text-dark" style="border-color:#fff; background-color:#9C5D7A">Process</a>
                                </div>
                            </div>
                        </div>
                    </div>
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