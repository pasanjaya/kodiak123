@extends('layouts.appCust')

@section('content')

    <!-- Header -->
    <header>
        @include('inc.header')
    </header>

    <!-- Slider -->
	@include('inc.slideshow')

    <!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="p-b-15">
                <h3 class="ltext-103 cl5">
                    Trending Offers
                </h3>
            </div>

            <div class="row">
                <div class="col-md-4 col-xl-3 p-b-30 m-lr-auto p-t-50">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="/storage/images/creditcard_vector2.jpg" alt="IMG-BANNER" style="width:275px;height:175px;">

                        <a href="/deals" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Credit Cards
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    View More
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3 p-b-30 m-lr-auto p-t-50">
                    <!-- Block2 -->
                    <div class="block1 wrap-pic-w">
                        <img src="/storage/images/travel-vector.jpg" alt="IMG-BANNER"  style="width:275px;height:175px;">

                        <a href="/deals" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Travel
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    View More
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3 p-b-30 m-lr-auto p-t-50">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="/storage/images/vector-food.jpg" class="size312x218" alt="IMG-BANNER"style="width:275px;height:175px;" >

                        <a href="/deals" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Food & Beverages
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    New Trend
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    View More
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3 p-b-30 m-lr-auto p-t-50">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="/storage/images/shopping-elements2.jpg" alt="IMG-BANNER" style="width:275px;height:175px;">

                        <a href="/deals" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Products
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    View More
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- advertisment show section -->
    <section class="bg0 p-t-23 p-b-140">
            <div class="container">
                <div class="p-b-10">
                    <h3 class="ltext-103 cl5">
                        Latest Offers
                    </h3>
                </div>
                @include('inc.product')
    </section>

@endsection