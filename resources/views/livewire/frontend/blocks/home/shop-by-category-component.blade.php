<div>
    <div class="container py-5">
        <div class="title d-flex flex-column w-50 mx-auto mb-3 mb-xl-5">
            <h2 class="text-center">Գնումներ ըստ կատեգորիայի</h2>
            <div class="w-25 mx-auto border-bottom border-dark mt-3"></div>
        </div>
        <div class="sipwer-buttons d-flex d-xl-none justify-content-center mb-4">
            <div class="swipper-arrow-prev text-center cats-arrow-prev">
                <i class="fa-solid fa-angle-left"></i>
            </div>
            <div class="swipper-arrow-next text-center ms-3 cats-arrow-next">
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </div>
        <div class="swiper cats-swiper">
            <div class="swiper-wrapper">
                @foreach($items as $item)
                <div class="swiper-slide">
                    <div class="cats-item position-relative">
                        <a href="{{ route('category', [$item->slug]) }}">
                        <img src="{{asset('images/category')}}/{{$item->image}}" alt="">
                        <div class="position-absolute bg-dark bg-opacity-50 bottom-0 start-50 translate-middle-x w-100 text-center text-white p-1 mb-3">
                            <span>{{$item->name}}</span>
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
