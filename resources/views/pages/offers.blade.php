@extends('layouts.app')

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
                <p><a class="btn btn-primary btn-lg" href="/advertisement/create" role="button">Create</a> <a class="btn btn-success btn-lg" href="/advertisement/update" role="button">Update</a> <a class="btn btn-danger btn-lg" href="/advertisement/destroy" role="button">Delete</a></p>
            </div>
            </main>
        </div>
    </div>   

@endsection