<main>
    <!-- Breadcrumb -->
    <div class="container py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">Անձնական տվյալներ</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <a href="#" class="text-reset text-decoration-none d-xl-none h3 mb-3 d-block" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCabinet" aria-controls="offcanvasCabinet">
            <div class="main-title justify-content-start my-1">
                <img src="{{ asset('images/icons/cabinet/user-toggle.svg') }}" alt="">
                <h1 class="fs-4 ps-0">Անձնական տվյալներ</h1>
            </div>
        </a>
        <div class="row m-0">
            <div class="col-3">
                <livewire:frontend.cabinet.includes.left-panel-component/>
            </div>
            @if(Cart::instance('cart')->count() > 0)
            <div class="col-12 col-xl-9 cabinet-info">
{{--                <div class="accordion" id="accordionPanelsStayOpenExample">--}}
{{--                                    <div class="accordion-body">--}}
                                        <div class="shopping-cart">
                                            <div class="shopping-cart-title d-none d-md-grid p-3 bg-light mb-3">
                                                <div class="shipping-cart-item title"></div>
                                                <div class="shipping-cart-item title">
                                                    Ապրանք
                                                </div>
                                                <div class="shipping-cart-item title">
                                                    Գին
                                                </div>
                                                <div class="shipping-cart-item title">
                                                    Գույն
                                                </div>
                                                <div class="shipping-cart-item title">
                                                    Չափս
                                                </div>
                                                <div class="shipping-cart-item title">
                                                    Քանակ
                                                </div>
                                                <div class="shipping-cart-item title">
                                                    Գումար
                                                </div>
                                            </div>
                                            @foreach(Cart::instance('cart')->content() as $item)
                                            <div class="shopping-cart-info">
                                                <div class="shipping-cart-item shop-col-img">
                                                    <img src="{{asset('images/products')}}/{{$item->model->image}}" alt="" class="shopping-cart-item-img">
                                                </div>
                                                <div class="shipping-cart-item shop-col-name">
                                                    <p class="m-0 d-block d-md-none">Ապրանք</p>
                                                    <p class="m-0">{{$item->model->name}}</p>
                                                </div>
                                                <div class="shipping-cart-item shop-col-price">
                                                    <p class="mb-3 d-block d-md-none text-start text-sm-center">Գին</p>
                                                    <div class="d-flex flex-row flex-sm-column align-items-center">
                                                        @if($item->model->sale_percent)
                                                        <span class="badge bg-danger rounded-0 fs-7">{{'-'.number_format($item->model->sale_percent) .'%' ?? ''}}</span>
                                                        @endif
                                                        <p class="text-muted badge d-block text-decoration-line-through m-0">{{($item->model->sale_price)?$item->model->price . ' ֏':null}}</p>
                                                        <p class="m-0">{{($item->model->sale_price != null) ? $item->model->sale_price :$item->model->price}}  ֏</p>
                                                    </div>
                                                </div>
                                                <div class="shipping-cart-item shop-col-color">
                                                    <p class="mb-3 d-block d-md-none">Գույն</p>
                                                    <p class="m-0">Կանաչ</p>
                                                </div>
                                                <div class="shipping-cart-item shop-col-size">
                                                    <p class="mb-3 d-block d-md-none">Չափս</p>
                                                    <p class="m-0">{{$item->options->size}}</p>
                                                </div>
                                                <div class="shipping-cart-item shop-col-quantity">
                                                    <p class="mb-3 d-block d-md-none">Քանակ</p>
                                                    <div class="" style="width: 100px !important;">
                                                        <div class="input-group mb-1s">
                                                            <button class="btn border border-end-0 fs-6" wire:click.prevent="decreaseQuantityCart('{{$item->rowId}}')">-</button>
                                                            <input type="number" class="form-control border fs-7 text-center" value="{{$item->qty}}">
                                                            <button class="btn border border-start-0 fs-6"  wire:click.prevent="increaseQuantityCart('{{$item->rowId}}')">+</button>
                                                        </div>
                                                    </div>
                                                        {{--<p>{{$orderItem->quantity ?? null}}</p>--}}
                                                </div>
                                                <div class="shipping-cart-item shop-col-total">
                                                    <p class="mb-3 d-block d-md-none">Գումար</p>
                                                    <div class="m-0 d-flex justify-content-between">{{number_format($item->subtotal)}} ֏ <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')"><img src="{{asset('frontend/images/icons/cabinet/delete.svg')}}" alt=""></a></div>
                                                </div>
                                            </div>

{{--                                            <div class="d-flex justify-content-end border-top pt-2">--}}
{{--                                                <p class="fw-bold m-0">Ընդամենը՝ {{ $item->subtotal ?? null }}</p>--}}
{{--                                            </div>--}}
                                            @endforeach
                                        </div>

                        @include('frontend.forms.checkout',['storeAddresses' => $storeAddresses])
        </div>
            @else
                <div class="col-12 col-xl-9 cabinet-info text-center">

                    <h2 style="color: red;">Զամբյուղը դատարկ է</h2>
                    <a href="/" class="btn btn-success" style="margin-top: 20px;">Կատարել գնումներ</a>
                </div>
            @endif
        </div>
    </div>
</main>

