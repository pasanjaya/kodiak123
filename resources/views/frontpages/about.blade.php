@extends('layouts.appCust')

@section('content')

<!-- Header -->
<header class="header-v4">
	@include('inc.header')
</header>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/storage/images/about-bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center ">
        About
    </h2>
</section>	


<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Our Story
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Kodiak is an online promotion marketing tool which promotes offers and discounts. 
                        This promotional strategy is done through special offers with a plan to attract people to buy the product. 
                        Sales promotions can include coupons, free samples, incentives, contests, prizes, loyalty programs, 
                        and rebates in Sri Lanka. 
                        We help to find your favorite items with specials offers and promote any items with as you wish. 
                        We provide platform promotes their items for dealers who are looking for place and oppotunities 
                        to get offers for people who seek for offers.      
                    </p>
                        
                    <p class="stext-113 cl6 p-b-26">
                        Seekers for promotions can look for promotions under category and it is easy to find your favorite quickly. 
                        By downloading our mobile application, you can subscribe your favorite brands and get notifications 
                        on your favorites. You can view details of companies which pubhlished promotion on our website and you can 
                        directly contact  with their official website  using url which are provided by us. 
                        They can find location easily because we provide facilities to reach correct location wihout any delay. 
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        People with intension to promote offers can publish advertisment. 
                        you can register on our website to promote your items. You can design entrie marketing campaign.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Any questions? Let us know on <a href="#" class="stext-107 cl7 hov-cl1 trans-04">facebook</a> 
                        or call us on (+1) 96 716 6879
                    </p>
                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="/storage/images/img-about-01.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Our Mission
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                     provide a user friendly web application to the people who seek for offers and provide platfoam for the people 
                     who want promote their promotions. We help people who seek offers by providing mobile application other than 
                     our website. We wish to provide great service becoming biggeset promotion leader in Sri Lanka.
                    </p>

                    <!--div class="bor16 p-l-29 p-b-9 m-t-22">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                            Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
                        </p>

                        <span class="stext-111 cl8">
                            - Steve Job’s 
                        </span>
                    </div-->
                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="/storage/images/img-about-02.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection