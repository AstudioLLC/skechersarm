<div class="main-title justify-content-start justify-content-lg-center my-3">
    @if(count($items))
    <h2>Նորույթներ</h2>
    @endif
</div>

<div class="desctop-products d-none d-lg-block" wire:ignore>
    <div class="row m-0 gap-0">
        @foreach($items as $item)
        <div class="col-xl-2 col-lg-3 col-4 p-1">
            <div class="product-card d-flex flex-column">
                <div class="product-card-img position-relative">
                    <a href="{{ route('product', ['slug' => $item->slug]) }}">
                        <div class="image-wrapper">
                            @if(count($item->gallery))
                            <ul>
                                @foreach($item->gallery as $gallery)
                                @once
                                <li>
                                    <img src="{{asset('images/products')}}/{{$item->image}}" class="img-fluid" alt="{{$item->name}}" />
                                </li>
                                @endonce
                                <li>
                                    <img src="{{asset('images/gallery')}}/{{$gallery->image}}" class="img-fluid" alt="{{$item->name}}" />
                                </li>
                                @endforeach
                            </ul>
                            @else
                                    <img src="{{asset('images/products')}}/{{$item->image}}" class="img-fluid" alt="{{$item->name}}" />
                            @endif
                        </div>
                    </a>
                    <div class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex {{($item->sale_percent)? 'justify-content-between' : 'justify-content-end'}} ">
                        @if($item->sale_percent)
                        <span class="badge text-white bg-danger fs-7 rounded-0"> -{{number_format($item->sale_percent)}}% </span>
                        @endif
                        <div class="product-card-buttons-icons me-2">
                            @php($favorites = Cart::instance('wishlist')->content()->pluck('id'))
                            @if($favorites->contains($item->id))
                            <a wire:click.prevent="removeFromWishList('{{$item->id}}')">
                                <div class="product-card-buttons-icon">
                                    <span class="favorite-btn text-danger fs-5">
                                        <i class="fa-solid fa-heart"></i>
                                    </span>
                                </div>
                            </a>
                            @else
                            <a  wire:click.prevent="addToWishList({{$item->id}},'{{$item->name}}',{{$item->price}})">
                                <div class="product-card-buttons-icon">
                                    <span class="favorite-btn text-dark fs-5">
                                        <i class="fa-light fa-heart"></i>
                                    </span>
                                </div>
                            </a>
                            @endif
                            <a href="{{ route('product', ['slug' => $item->slug]) }}">
                                <div class="product-card-buttons-icon">
                                    <span class="bag-btn text-dark fs-5">
                                        <i class="fa-light fa-bag-shopping"></i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="product-body p-3 flex-fill pb-0">
                    <div class="product-title fs-7 my-2">
                        <span class="text-primary">{{$item->categories->first()->parentCategory->parentCategory->name}}</span>
                    </div>
                    <div class="product-info my-2">
                        <p class="m-0">{{$item->name}}</p>
                    </div>
                </div>
                <div class="px-3">
                    <div class="product-price fs-6 my-2">
                        @if($item->sale_price)
                        <span class="text-decoration-line-through fs-7 text-muted me-2">{{number_format($item->price)}} <small>֏</small></span>
                        @endif
                        <span class="fs-6 fw-bold">{{($item->sale_price != null) ? number_format($item->sale_price) :number_format($item->price)}} <small>֏</small></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="mobile-products d-block d-lg-none">
    <div class="swiper newsSlider" wire:ignore>
        <div class="swiper-wrapper pb-5">
            @foreach($items as $item)
            <div class="swiper-slide">
                <div class="product-card d-flex flex-column">
                    <div class="product-card-img position-relative">
                        <a href="{{ route('product', ['slug' => $item->slug]) }}">
                            <div class="image-wrapper">
                                @if(count($item->gallery))
                                <ul>
                                    @foreach($item->gallery as $gallery)
                                    @once
                                    <li>
                                        <img src="{{asset('images/products')}}/{{$item->image}}" class="img-fluid" alt="{{$item->name}}" />
                                    </li>
                                    @endonce
                                    <li>
                                        <img src="{{asset('images/gallery')}}/{{$gallery->image}}" class="img-fluid" alt="{{$item->name}}" />
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                        <img src="{{asset('images/products')}}/{{$item->image}}" class="img-fluid" alt="{{$item->name}}" />
                                @endif
                            </div>
                        </a>
                        <div class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex {{($item->sale_percent)? 'justify-content-between' : 'justify-content-end'}} ">
                            @if($item->sale_percent)
                            <span class="badge text-white bg-danger fs-7 rounded-0"> -{{number_format($item->sale_percent)}}% </span>
                            @endif
                            <div class="product-card-buttons-icons me-2">
                                @php($favorites = Cart::instance('wishlist')->content()->pluck('id'))
                                @if($favorites->contains($item->id))
                                <a wire:click.prevent="removeFromWishList('{{$item->id}}')">
                                    <div class="product-card-buttons-icon">
                                        <span class="favorite-btn text-danger fs-5">
                                            <i class="fa-solid fa-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                @else
                                <a href="#" wire:click.prevent="addToWishList({{$item->id}},'{{$item->name}}',{{$item->price}})">
                                    <div class="product-card-buttons-icon">
                                        <span class="favorite-btn text-dark fs-5">
                                            <i class="fa-light fa-heart"></i>
                                        </span>
                                    </div>
                                </a>
                                @endif
                                <a href="{{ route('product', ['slug' => $item->slug]) }}">
                                    <div class="product-card-buttons-icon">
                                        <span class="bag-btn text-dark fs-5">
                                            <i class="fa-light fa-bag-shopping"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-body p-3 flex-fill pb-0">
                        <div class="product-title fs-7 my-2">
                            <span class="text-primary">{{$item->categories->first()->parentCategory->parentCategory->name}}</span>
                        </div>
                        <div class="product-info my-2">
                            <p class="m-0">{{$item->name}}</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="product-price fs-6 my-2">
                            @if($item->sale_price)
                            <span class="text-decoration-line-through fs-7 text-muted me-2">{{number_format($item->price)}} <small>֏</small></span>
                            @endif
                            <span class="fs-6 fw-bold">{{($item->sale_price != null) ? number_format($item->sale_price) :number_format($item->price)}} <small>֏</small></span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

{{--<div class="baners mt-4">--}}
    {{--    <div class="row">--}}
        {{--        <div class="col-12 col-lg-6 mb-2">--}}
            {{--            <a href="#">--}}
                {{--                <img src="{{ asset('frontend/images/banner/ee83b579-4421-4638-b2c0-dd49792133fd.__CR0,0,970,300_PT0_SX970_V1___.jpg') }}" class="w-100" alt="">--}}
            {{--            </a>--}}
        {{--        </div>--}}
        {{--        <div class="col-12 col-lg-6 mb-2">--}}
            {{--            <a href="#">--}}
                {{--                <img src="{{ asset('frontend/images/banner/sports-women.jpg') }}" class="w-100" alt="">--}}
            {{--            </a>--}}
        {{--        </div>--}}
    {{--    </div>--}}
{{--</div>--}}
