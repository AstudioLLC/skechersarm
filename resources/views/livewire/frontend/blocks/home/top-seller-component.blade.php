<div class="container py-5">
    <div class="title d-flex flex-column w-50 mx-auto">
        <h2 class="text-center">Ամենաշատ վաճառվածներ</h2>
        <div class="w-25 mx-auto border-bottom border-dark mt-3"></div>
    </div>
    <div class="sipwer-buttons d-flex d-xl-none justify-content-center mt-4">
        <div class="swipper-arrow-prev text-center top-sales-arrow-prev">
            <i class="fa-solid fa-angle-left"></i>
        </div>
        <div class="swipper-arrow-next text-center ms-3 top-sales-arrow-next">
            <i class="fa-solid fa-angle-right"></i>
        </div>
    </div>
    <div class="swiper swiper-height top-sales-swiper mt-3 py-3 ps-0 pe-3">
        <div class="swiper-wrapper px-3">

            @foreach($items as $item)
            <div class="swiper-slide hovered-card">
                <div class="product_card position-relative">
                    <div class="card d-flex flex-column rounded-0 border-0">
                        <div class='imgContainer position-relative'>
                            <a href="{{ route('product', ['slug' => $item->slug]) }}">
                                <img src="{{$item->getImageThumbnail()}}" alt="{{$item->name}}" class="w-100">
                            </a>
                            <div class="position-absolute bottom-0 end-0 p-2">
                                <a href="#" class="text-reset text-decoration-none">
                                    <div class="product-icon shadow-sm rounded mb-2">
                                        <img src="{{asset('frontend/images/icons/heart.svg')}}" class="img-fluid" alt="">
                                    </div>
                                </a>
                                <a href="{{ route('product', ['slug' => $item->slug]) }}" class="text-reset text-decoration-none">
                                    <div class="product-icon shadow-sm rounded">
                                        <img src="{{asset('frontend/images/icons/basket.svg')}}" class="img-fluid" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="position-absolute bottom-0 start-0">
                      <span class="badge fw-normal badge-violet rounded-0">
                        {{$item->label ?? 'New'}}
                      </span>
                            </div>
                        </div>
                        <div class="product-content pt-3 ps-2 pe-2 pb-3 border">
                            <h2 class="blog-title-fs fw-normal">{{\Illuminate\Support\Str::limit($item->name,40)}}</h2>
                            <p class="fw-bold mb-0 mt-3"><span class="ps-0 badge text-muted text-decoration-line-through">{{$item->price}} ֏</span>{{$item->sale_price ?? ''}} ֏</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
