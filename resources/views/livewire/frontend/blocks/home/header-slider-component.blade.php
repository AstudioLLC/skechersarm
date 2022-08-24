<div class="row m-0">
    @php($slide1 = \App\Models\HomeBanner::whereSection('slide1')->first())
    @php($slide2 = \App\Models\HomeBanner::whereSection('slide2')->first())
    <div class="col-12 col-xl-4 p-0 order-2 order-xl-1">
        <div class="row m-0 gap-0">
            <div class="col-6 col-xl-12 p-1 pt-0">
                <img src="{{asset('images/homeBanners/')}}/{{$slide1->image ?? null}}" class="w-100" alt="">
            </div>
            <div class="col-6 col-xl-12 p-1 pt-0">
                <img src="{{asset('images/homeBanners/')}}/{{$slide2->image ?? null}}" class="w-100" alt="">
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-8 p-1 pt-0 order-1 order-xl-2">
        <!-- Slider main container -->
        <div class="swiper mainSlider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($items as $item)
                <div class="swiper-slide">
                    <div class="main_slider_info text-white">
                        <h1 class="h3">{{$item->title}}</h1>
                        <p class="m-0 fs-6">{{$item->description}}</p>
                        <a href="{{$item->url}}" target="_blank" class="btn btn-primary fs-6 mt-3 px-5">{{$item->button}}</a>
                    </div>
                    <img src="{{asset('images/slides')}}/{{$item->image}}"  class="h-100 w-100" alt="{{$item->title}}">
                </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
