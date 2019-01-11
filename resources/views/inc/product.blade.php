<!-- Product -->


        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Offers
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".products1">
                    Fashion & Clothing
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".products3">
                    Travel & Leisure
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".products2">
                    Food & Beverages
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".products4">
                    Finance
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".products5">
                    Products
                </button>
            </div>

            <div class="flex-w flex-c-m m-tb-10">

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>
            
            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>	
            </div>

        </div>

        <div class="row isotope-grid">
            @foreach ($deals as $deal)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item products{{$deal->category_id}} align-text-center">
                    <!-- Block2 -->
                            
                    <div class="block2">
                            @if($today > $deal->end_date)
                                <span class="label1" data-label1="Unavailable"></span>
                            @endif
                        <div class="block2-pic hov-img0">
                                
                            <a href="details/{{ $deal->id }}">
                                <img src="/storage/advertisement_images/{{$deal->image_name}}" alt="IMG-PRODUCT">                               
                            </a>
                            
                        </div>
    
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="details/{{ $deal->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                   {{ $deal->title }}
                                </a>
    
                                <span class="stext-105 cl3">
                                    Ends: {{ $deal->end_date }}
                                </span>
                            </div>
    
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="/storage/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/storage/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            

            </div>
        </div>
