<main>
    <!-- Breadcrumb -->
        <livewire:frontend.shop.supports.product-details-breadcrumb :item="$product"/>
    <!-- End Breadcrumb -->
    <div class="container"  >
        <div class="row m-0" >
            <div class="col-12 col-lg-6" wire:ignore>
                <div class="row m-0">
                    <div class="col-12 col-sm-9 col-lg-12 p-0">
                        <div class="swiper productSingleSlider border">
                            <div class="swiper-wrapper">
                                @if(count($item->gallery))
                                @foreach($product->gallery as $gallery)
                                    @once
                                        <div class="swiper-slide">
                                            <img src="{{asset('images/products')}}/{{$item->image}}" alt="{{$product->name}}" />
                                        </div>
                                    @endonce
                                    <div class="swiper-slide">
                                        <img src="{{asset('images/gallery')}}/{{$gallery->image}}" alt="{{$product->name}}" />
                                    </div>
                                @endforeach
                                @else
                                    <div class="swiper-slide">
                                        <img src="{{asset('images/products')}}/{{$item->image}}" alt="{{$product->name}}" />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($product->gallery)
                    <div class="col-3 d-none d-sm-block col-lg-12 p-0">
                        <div thumbsSlider="" class="swiper productSingleSliderThumbs mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($product->gallery as $gallery)
                                    @once
                                        <div class="swiper-slide border">
                                            <img src="{{asset('images/products')}}/{{$item->image}}" alt="{{$product->name}}" />
                                        </div>
                                    @endonce
                                    <div class="swiper-slide border">
                                        <img src="{{asset('images/gallery')}}/{{$gallery->image}}" alt="{{$product->name}}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-lg-6" wire:ignore.self>
{{--                <span class="text-primary fs-7 d-block mb-2">{{$product->name ?? ''}}</span>--}}
                <span class="text-primary fs-7 d-block mb-2">@foreach($item->categories as $category) {{$category->name?? null}} @endforeach</span>
                <h1 class="fs-4">{{$product->name ?? ''}}</h1>
                <span class="d-block fs-7">Կոդ #{{$product->article_1c}}</span>
                <div class="product-price">
                    <span class="d-inline-block me-2 text-muted fs-4 text-decoration-line-through product_single_price">{{($product->sale_price)?number_format($product->price). ' ֏' :null}}</span>
                    <span class="d-inline-block fs-2 product_single_price">{{($product->sale_price != null) ? number_format($product->sale_price) :number_format($product->price)}} ֏</span>
                </div>

{{--                <span class="d-block fs-7">Գույներ</span>--}}
                <div class="product-ratio mt-2">
{{--                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked="">--}}
                    @if(count($allProgucts))
                    @foreach($allProgucts as $item)
                        @if($item->barcode !== $product->barcode)
                    <label class="btn radio-btn-outline fs-7 mb-1 p-1 rounded-1" for="btnradio1">
                        <a href="{{ route('product', ['slug' => $item->slug]) }}">
                        <img src="{{asset('images/products')}}/{{$item->image}}" alt="{{$item->name}}"alt="">
                        </a>
                    </label>
                            @endif
                        @endforeach
                    @endif
                </div>
                @if(count($sizes))
                <span class="d-block fs-7 my-2">Չափսեր</span>
                <div class="product-ratio">
                    @foreach($sizes as $key => $size)
                        <input type="radio" class="btn-check" value="{{$size}}" wire:model="size" id="btnradios{{$key}}" autocomplete="off" checked>
                        <label class="btn radio-btn-outline fs-7 mb-1 py-1 px-4 rounded-1" for="btnradios{{$key}}">{{$size}}</label>
                    @endforeach
                </div>
                @error('size') <span class="text-danger">{{ $message }}</span>@enderror
                @endif
                @if($product->quantity)
                <div class="d-flex align-items-center mt-3" style="max-width: 200px;">
                    <span class="d-block fs-7 me-2 text-muted">Քանակ</span>
                    <div class="input-group mb-1">
                        <button class="btn border border-end-0 fs-6 py-1" wire:click.prevent="decreaseQuantity" onclick="miban()">-</button>
                        <input type="number"  wire:model="qty" class="form-control border fs-7 py-1 text-center" value="1" max="{{$product->quantity}}" data-product-id="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <button class="btn border border-start-0 fs-6 py-1"  wire:click.prevent="increaseQuantity" onclick="miban()">+</button>
                    </div>
                </div>
                @else
                    <span class="font-weight-bold text-danger">Առկա չէ</span>
                @endif
                <div class="d-flex align-items-center mt-3" style="max-width: 320px;">
                    @if($product->quantity)
                    <a href="#" class="btn btn-primary flex-fill me-2 fs-7 rounded-1 py-2"  wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price ?? $product->price}})">Ավելացնել զամբյուղ</a>
                    @endif
                    @php($favorites = Cart::instance('wishlist')->content()->pluck('id'))
                    @if($favorites->contains($product->id))
                        <a class="btn border fs-7 rounded-1 py-2 bg-danger" wire:click.prevent="removeFromWishList('{{$product->id}}')">
                            <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="">
                        </a>
                    @else
                        <a href="#" class="btn border fs-7 rounded-1 py-2 " wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->price}})">
                            <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" >
                        </a>
                    @endif

{{--                    @php($compares = Cart::instance('compare')->content()->pluck('id'))--}}
{{--                    @if($compares->contains($product->id))--}}
{{--                        <a href="#" class="btn border p-2 d-flex justify-content-center align-items-center bg-danger" >--}}
{{--                            <img src="{{asset('frontend/images/icons/compare.svg')}}" alt="" style="width: 30px;height: 30px;" wire:click.prevent="removeFromCompare('{{$product->id}}')">--}}
{{--                        </a>--}}
{{--                    @else--}}
{{--                        <a href="#" class="btn border p-2 d-flex justify-content-center align-items-center" wire:click.prevent="compare({{$product->id}},'{{$product->name}}',{{$product->price}})">--}}
{{--                            <img src="{{asset('frontend/images/icons/compare.svg')}}" alt="" style="width: 30px;height: 30px;">--}}
{{--                        </a>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-12 col-lg-7 my-5 my-lg-0">
                <div class="border-bottom mb-3">
                    @if($product->description)
                    <h2 class="h4">Նկարագրություն</h2>
                    @endif
                </div>
                <div class="pe-3">
                    {!! $product->description ?? ''!!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-2">
                <a href="#">
                    <img src="{{asset('frontend/images/banner/cover_banner_1400x500px_eng.jpg')}}" class="w-100" alt="">
                </a>
            </div>
        </div>
        @if($similar_products)
        <div class="main-title justify-content-start my-3">
            @if(count($similar_products))
            <h2 class="fs-4">Նմանատիպ ապրանքներ</h2>
            @endif
        </div>

        <div class="mobile-products" wire:ignore>
            <div class="d-flex gap-2 mb-3" >
                <div class="swiper-offer-left">
                    <img src="{{ asset('frontend/images/icons/swiper-products-arrow-left.svg') }}" alt="">
                </div>
                <div class="swiper-offer-right">
                    <img src="{{asset('frontend/images/icons/swiper-products-arrow-right.svg')}}" alt="">
                </div>
            </div>
            <div class="swiper offerSlider">
                <div class="swiper-wrapper pb-2">
                    @foreach($similar_products as $similar_product)
                    <div class="swiper-slide">
                        <div class="product-card">
                            <div class="product-card-img position-relative">
                                <a href="{{ route('product', ['slug' => $similar_product->slug]) }}">
                                    <div class="image-wrapper">
                                        <ul>
                                            @if(count($similar_product->gallery))
                                            @foreach($product->gallery as $gallery)
                                                @once
                                                    <li>
                                                        <img src="{{asset('images/products')}}/{{$similar_product->image}}" class="img-fluid" alt="{{$product->name}}" />
                                                    </li>
                                                @endonce
                                                    <li>
                                                        <img src="{{asset('images/gallery')}}/{{$gallery->image}}" class="img-fluid" alt="{{$product->name}}" />
                                                    </li>
                                            @endforeach
                                                @else
                                                    <li>
                                                        <img src="{{asset('images/products')}}/{{$similar_product->image}}" class="img-fluid" alt="{{$product->name}}" />
                                                    </li>
                                                @endif
                                        </ul>
                                    </div>

                                </a>

                                <div class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex {{($similar_product->sale_percent)? 'justify-content-between' : 'justify-content-end'}}">
                                    @if($similar_product->sale_percent)
                                    <span class="badge text-white bg-danger fs-7 rounded-0"> -{{number_format($similar_product->sale_percent)}}% </span>
                                    @endif
                                    <div class="product-card-buttons-icons me-2">
                                        <a href="{{ route('product', ['slug' => $similar_product->slug]) }}">
                                            <div class="product-card-buttons-icon">
                                                <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" class="favorite-btn">
                                            </div>
                                        </a>
                                        <a>
                                            <div class="product-card-buttons-icon">
                                                <img src="{{asset('frontend/images/icons/basket.svg')}}" alt="" class="bag-btn">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-body p-3">
                                <div class="product-title fs-6 my-2">
                                    <span class="text-primary">{{$similar_product->name}}</span>
                                </div>
                                <div class="product-info fs-6 my-2">
                                    <p class="m-0">{!!\Illuminate\Support\Str::limit($similar_product->description,25)!!}</p>
                                </div>
                                <div class="product-price fs-6 my-2">
                                    <span class="text-decoration-line-through fs-7 text-muted">{{($similar_product->sale_price)?number_format($similar_product->price) . ' ֏':null}}</span>
                                    <span class="fs-6 fw-bold">{{($similar_product->sale_price != null) ? number_format($similar_product->sale_price) :number_format($similar_product->price)}}  ֏</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @if($session_products)
        <div class="main-title justify-content-start my-3">
            @if(count($session_products))
            <h2 class="fs-4">Վերջին դիտվածները</h2>
            @endif
        </div>
        <div class="mobile-products" wire:ignore>
            <div class="d-flex gap-2 mb-3">
                <div class="swiper-seenSlider-left">
                    <img src="{{asset('frontend/images/icons/swiper-products-arrow-left.svg')}}" alt="">
                </div>
                <div class="swiper-seenSlider-right">
                    <img src="{{asset('frontend/images/icons/swiper-products-arrow-right.svg')}}" alt="">
                </div>
            </div>
            <div class="swiper seenSlider">
                <div class="swiper-wrapper pb-5">
                    @foreach($session_products as $session_product)
                    <div class="swiper-slide" >
                        <div class="product-card" >
                            <div class="product-card-img position-relative">
                                <a href="{{ route('product', ['slug' => $session_product->slug]) }}">
                                    <div class="image-wrapper">
                                        <ul>
                                            @if(count($session_product->gallery))
                                            @foreach($session_product->gallery as $gallery)
                                                @once
                                                    <li>
                                                        <img src="{{asset('images/products')}}/{{$session_product->image}}" class="img-fluid" alt="{{$product->name}}" />
                                                    </li>
                                                @endonce
                                                <li>
                                                    <img src="{{asset('images/gallery')}}/{{$gallery->image}}" class="img-fluid" alt="{{$product->name}}" />
                                                </li>
                                            @endforeach
                                            @else
                                                <li>
                                                    <img src="{{asset('images/products')}}/{{$session_product->image}}" class="img-fluid" alt="{{$product->name}}" />
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </a>
                                <div class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex {{($session_product->sale_percent)? 'justify-content-between' : 'justify-content-end'}}">
                                   @if($session_product->sale_percent)
                                    <span class="badge text-white bg-danger fs-7 rounded-0"> -{{number_format($session_product->sale_percent)}}% </span>
                                    @endif
                                    <div class="product-card-buttons-icons me-2" >
                                        @php($favorites = Cart::instance('wishlist')->content()->pluck('id'))
                                        @if($favorites->contains($session_product->id))
                                            <a class="bg-danger" wire:click.prevent="removeFromWishList('{{$session_product->id}}')">
                                                <div class="product-card-buttons-icon">
                                                    <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" class="favorite-btn">
                                                </div>
                                            </a>
                                        @else
                                            <a href="#" wire:click.prevent="addToWishList({{$session_product->id}},'{{$session_product->name}}',{{$session_product->price}})">
                                                <div class="product-card-buttons-icon">
                                                    <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" class="favorite-btn">
                                                </div>
                                            </a>
                                        @endif
                                        <a href="{{ route('product', ['slug' => $session_product->slug]) }}">
                                            <div class="product-card-buttons-icon">
                                                <img src="{{asset('frontend/images/icons/basket.svg')}}" alt="" class="bag-btn">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-body p-3">
                                <div class="product-title fs-6 my-2">
                                    <span class="text-primary">{{\Illuminate\Support\Str::limit($session_product->name,25)}}</span>
                                </div>
                                <div class="product-info fs-6 my-2">
                                    <p class="m-0">{!! $session_product->description !!}</p>
                                </div>
                                <div class="product-price fs-6 my-2">
                                    <span class="text-decoration-line-through fs-7 text-muted">{{($session_product->sale_price)?number_format($session_product->price) . ' ֏':null}}</span>
                                    <span class="fs-6 fw-bold">{{($session_product->sale_price != null) ? number_format($session_product->sale_price) :number_format($session_product->price)}}  ֏</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</main>



