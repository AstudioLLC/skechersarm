{{--@dd($product)--}}

<main>
    <!-- Breadcrumb -->
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">{{__('frontend.cart.Home')}}</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{__('frontend.search.Search results')}}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="main-title justify-content-start my-1">
            <h1 class="fs-4">{{__('frontend.search.Search results')}}</h1>
        </div>
        <div class="desctop-products d-none d-lg-block" wire:ignore>
            <div class="row m-0 gap-0">
                @foreach($product as $item)
                    <div class="col-3 col-xl-2 p-1">
                        <div class="product-card">
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
                                <div class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex {{($item->sale_percent)? 'justify-content-between' : 'justify-content-end'}}">
                                    @if($item->sale_percent)
                                    <span class="badge text-white bg-danger fs-7 rounded-0"> -{{number_format($item->sale_percent)}}% </span>
                                    @endif
                                    <div class="product-card-buttons-icons me-2">
                                        @php($favorites = Cart::instance('wishlist')->content()->pluck('id'))
                                        @if($favorites->contains($item->id))
                                            <a class="bg-danger" wire:click.prevent="removeFromWishList('{{$item->id}}')">
                                                <div class="product-card-buttons-icon">
                                                    <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" class="favorite-btn">
                                                </div>
                                            </a>
                                        @else
                                            <a href="#" wire:click.prevent="addToWishList({{$item->id}},'{{$item->name}}',{{$item->price}})">
                                                <div class="product-card-buttons-icon">
                                                    <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" class="favorite-btn">
                                                </div>
                                            </a>
                                        @endif
                                        <a href="{{ route('product', ['slug' => $item->slug]) }}">
                                            <div class="product-card-buttons-icon">
                                                <img src="{{asset('images/icons/bage.svg')}}" alt="" class="bag-btn">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-body p-3">
                                <div class="product-title fs-6 my-2">
                                    <span class="text-primary">{{$item->categories->first()->parentCategory->parentCategory->name}}</span>
                                </div>
                                <div class="product-info fs-6 my-2">
                                    <p class="m-0">{{$item->name}}</p>
                                </div>
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
                    @foreach($product as $item)
                        <div class="swiper-slide">
                            <div class="product-card">
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
                                    <div class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex {{($item->sale_percent)? 'justify-content-between' : 'justify-content-end'}}">
                                        @if($item->sale_percent)
                                        <span class="badge text-white bg-danger fs-7 rounded-0"> -{{number_format($item->sale_percent)}}% </span>
                                        @endif
                                        <div class="product-card-buttons-icons me-2">
                                            <a href="#">
                                                <div class="product-card-buttons-icon">
                                                    <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" class="favorite-btn">
                                                </div>
                                            </a>
                                            <a role="button" href="{{ route('product', ['slug' => $item->slug]) }}">
                                                <div class="product-card-buttons-icon">
                                                    <img src="{{ asset('frontend/images/icons/bage.svg') }}" alt="" class="bag-btn">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-body p-3">
                                    <div class="product-title fs-6 my-2">
                                        <span class="text-primary">{{$item->categories->first()->parentCategory->parentCategory->name}}</span>
                                    </div>
                                    <div class="product-info fs-6 my-2">
                                        <p class="m-0">{{$item->name}}</p>
                                    </div>
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
    </div>
</main>
