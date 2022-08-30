<div>
    <div class="container py-5">
        <div class="title d-flex flex-column w-50 mx-auto mb-4">
            <h2 class="text-center fw-normal">{{__('frontend.brand.Brands')}}</h2>
            <div class="w-25 mx-auto border-bottom border-dark mt-3"></div>
        </div>
        <div class="sipwer-buttons d-flex d-xl-none justify-content-center mb-4">
            <div class="swipper-arrow-prev text-center brand-arrow-prev">
                <i class="fa-solid fa-angle-left"></i>
            </div>
            <div class="swipper-arrow-next text-center ms-3 brand-arrow-next">
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </div>
        <div class="swiper brand-swiper">
            <div class="swiper-wrapper">
                @foreach($items as $item)
                <div class="swiper-slide">
                    <img src="{{asset('images/brands/')}}/{{$item->image}}" class="img-fluid" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
