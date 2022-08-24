<main>

        <div class="container py-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                    <li class="breadcrumb-item fs-7 active" aria-current="page">Անձնական տվյալներ</li>
                </ol>
            </nav>
        </div>
    <div class="container">
        <a href="#" class="text-reset text-decoration-none d-xl-none h3 mb-3 d-block" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCabinet" aria-controls="offcanvasCabinet">
            <div class="main-title justify-content-start my-1">
                <span class="fs-4">
                    <i class="fa-light fa-user"></i>
                </span>
                <h1 class="fs-4 ps-0 mt-2">Անձնական տվյալներ</h1>
            </div>
        </a>
        <div class="row m-0">
            <div class="col-3">
            <livewire:frontend.cabinet.includes.left-panel-component/>
            </div>
            @foreach(Cart::instance('wishlist')->content() as $items)
                <?php $item = \App\Models\Product::where('id', $items->id)->first() ?>
                <div class="col-3 col-xl-2 p-1">
                    <div class="product-card">
                        <div class="product-card-img position-relative">
                            <a href="{{ route('product', ['slug' => $item->slug]) }}">
                                <div class="image-wrapper">
                                    <ul>
                                        @if(count($item->gallery))
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
                                        @else
                                            <li>
                                                <img src="{{asset('images/products')}}/{{$item->image}}" class="img-fluid" alt="{{$item->name}}" />
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </a>
                            <div wire:ignore.self class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex {{($item->sale_percent)? 'justify-content-between' : 'justify-content-end'}}">
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
                                <span class="text-primary">{{$item->name}}</span>
                            </div>
                            <div class="product-info fs-6 my-2">
                                <p class="m-0">{!! $item->description !!}</p>
                            </div>
                            <div class="product-price fs-6 my-2">
                                <span class="text-decoration-line-through fs-7 text-muted">{{($item->sale_price)?$item->price :null}}</span>
                                <span class="fs-6 fw-bold">{{($item->sale_price != null) ? $item->sale_price :$item->price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</main>
