@extends('layouts.appad')

@section('content')

            {{-- <div id="catbarheader">
                <div id="cat">Select a category</div>
                <div id="buttonContainer">
                <div class="toggelButton" id="cloth"><span data-feather="shopping-bag"></span> Clothing</div>
                <div class="toggelButton" id="ccard"><span data-feather="credit-card"></span> Credit Cards</div>
                <div class="toggelButton" id="fbeverage"> Food &amp; Beverages</div>
                </div>
            </div>
            <div class="catagory_content">
                <div class="catogeryPanel" id="clothPanel">
                    
                </div>

                <div class="catogeryPanel" id="ccardPanel">this is credit card</div>
                <div class="catogeryPanel" id="fbeveragePanel">food</div>
            </div> --}}

            <div class="jumbotron text-center">
                <p><a class="btn btn-primary btn-lg" href="/offers/create" role="button">Create</a> <a class="btn btn-success btn-lg" href="/offers/update" role="button">Update</a> <a class="btn btn-danger btn-lg" href="/offers/destroy" role="button">Delete</a></p>
            </div>
            <div class="container">
                <h3>Published Offers</h3>
                @if(count($ads) > 0)
                    @foreach ($ads as $ad)
                        <div class="card border-primary mb-4" style="max-width: 50rem;">
                            <div class="card-header">Offer id: {{$ad->id}}</div>
                            <div class="card-body text-primary">
                            <h5 class="card-title"><a href="offers/{{$ad->id}}">{{$ad->title}}</a></h5>
                            <p class="card-text">{{$ad->created_at}}</p>
                            </div>
                        </div>
                    @endforeach
                    {{$ads->links()}}
                @else
                    <p>No offer created yet !</p>
                @endif
            </div>
            </main>
        </div>
    </div>   

@endsection