@extends('layouts.appCust')

@section('content')

<!-- Header -->
<header class="header-v4">
	@include('inc.header')
</header>

    <!-- breadcrumb -->
    <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="/deals" class="stext-109 cl8 hov-cl1 trans-04">
				Advertisement
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				{{$deal->title}}
			</span>
		</div>
	</div>

<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="/storage/advertisement_images/{{$deal->image_name}}">
									<div class="wrap-pic-w pos-relative">
										<img src="/storage/advertisement_images/{{$deal->image_name}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="/storage/advertisement_images/{{$deal->image_name}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
							
						<h3 class="mtext-105 cl2 js-name-detail p-b-3">
							{{$deal->title}}
						</h3>
						<h5 class="mtext-102 cl3 js-name-detail p-b-14">
							{{$deal->subtitle}}
						</h5>

						<span class="mtext-106 cl2">
								{{$deal->start_date}} to 
								{{$deal->end_date}}
						</span>

						<p class="stext-102 cl3 p-t-23">
							{!! $deal->description !!}
						</p>
	

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<span class="mtext-106 cl2">
										@if($today > $deal->end_date)
											<span class="label1" data-label1="Unavailable"></span>
										@endif
								</span>
						</div>
					</div>
				</div>
			</div>
		</div>


	</section>
    
@endsection