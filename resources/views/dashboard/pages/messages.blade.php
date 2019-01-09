@extends('layouts.appad')

@section('content')

            <div class="container">
                <div class="card border-info" style="width: 70rem;">
                    <h2 class="card-header mb-5">Contact Team Kodiak</h2>
                    <div class="card-body container ">

                    {!! Form::open(['action' => 'MessagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group col-10">
                            {{Form::label('email', 'Email *')}}
                            {{Form::email('email', 'kodiakmailservice@gmail.com', ['class'=> 'form-control', 'placeholder' => 'Email', 'readonly'])}}
                            
                        </div>
                        <div class="form-group col-10">
                            {{Form::label('subject', 'Subject *')}}
                            {{Form::text('subject', '', ['class'=> 'form-control', 'placeholder' => 'Subject'])}}
                        </div>

                        <div class="form-group col-10">
                            {{Form::label('message', 'Message *')}}
                            {{Form::textarea('message', '', ['id'=> 'article-ckeditor','class'=> 'form-control', 'placeholder' => 'Description'])}}
                        </div>
                        
                        <div class="form-group col-3 mt-5">
                            {{Form::submit('Send message', ['class' => 'btn btn-primary'])}}
                        </div>

                        <br>
                    {!! Form::close() !!}
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


{{-- Change text editer to ckEditer --}}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

@endsection