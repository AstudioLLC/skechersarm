<main>
    <!-- Breadcrumb -->
    <div class="container py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">{{__('frontend.cart.Home')}}</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{__('frontend.cabinet.Personal information')}}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <a href="#" class="text-reset text-decoration-none d-xl-none h3 mb-3 d-block" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCabinet" aria-controls="offcanvasCabinet">
            <div class="main-title justify-content-start my-1">
                <img src="{{ asset('images/icons/cabinet/user-toggle.svg') }}" alt="">
                <h1 class="fs-4 ps-0">{{__('frontend.cabinet.Personal information')}}</h1>
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
                                    {{__('frontend.cart.Product')}}
                                </div>
                                <div class="shipping-cart-item title">
                                    {{__('frontend.cart.Price')}}
                                </div>
                                <div class="shipping-cart-item title">
                                    {{__('frontend.cart.Color')}}
                                </div>
                                <div class="shipping-cart-item title">
                                    {{__('frontend.cart.Size')}}
                                </div>
                                <!-- <div class="shipping-cart-item title">
                                    Քանակ
                                </div> -->
                                <div class="shipping-cart-item title">
                                    {{__('frontend.cart.Amount')}}
                                </div>
                            </div>
                            @foreach(Cart::instance('cart')->content() as $item)
                            <div class="shopping-cart-info align-items-end">
                                <div class="shipping-cart-item d-flex d-sm-block align-items-center mt-3 mt-lg-0 shop-col-img">
                                    <img src="{{asset('images/products')}}/{{$item->model->image}}" alt="" class="shopping-cart-item-img">
                                </div>
                                <div class="shipping-cart-item d-flex d-sm-block align-items-center mt-3 mt-lg-0 shop-col-name">
                                    <p class="mb-0 d-block d-md-none me-3 me-sm-0">{{__('frontend.cart.Product Name')}}</p>
                                    <p class="m-0">{{$item->model->name}}</p>
                                </div>
                                <div class="shipping-cart-item d-flex d-sm-block align-items-center mt-3 mt-lg-0 shop-col-price">
                                    <p class="mb-0 d-block d-md-none me-3 me-sm-0 text-start text-sm-center">{{__('frontend.cart.Price')}}</p>
                                    <div class="d-flex flex-row flex-sm-column align-items-center">
                                        <p class="m-0">{{($item->model->sale_price != null) ? $item->model->sale_price :$item->model->price}}  ֏</p>
                                    </div>
                                </div>
                                <div class="shipping-cart-item d-flex d-sm-block align-items-center mt-3 mt-lg-0 shop-col-color">
                                    <p class="mb-0 d-block d-md-none me-3 me-sm-0">{{__('frontend.cart.Color')}}</p>
                                    <p class="m-0">Կանաչ</p>
                                </div>
                                <div class="shipping-cart-item d-flex d-sm-block align-items-center mt-3 mt-lg-0 shop-col-size">
                                    <p class="mb-0 d-block d-md-none me-3 me-sm-0">{{__('frontend.cart.Size')}}</p>
                                    <p class="m-0">{{$item->options->size}}</p>
                                </div>
                                <!-- <div class="shipping-cart-item mt-3 mt-lg-0 shop-col-quantity">
                                    <p class="mb-0 d-block d-md-none me-3 me-sm-0">Քանակ</p>
                                    <p class="m-0">{{$item->qty}}</p>
                                    {{--<p>{{$orderItem->quantity ?? null}}</p>--}}
                                </div> -->
                                <div class="shipping-cart-item d-flex d-sm-block align-items-center mt-3 mt-lg-0 shop-col-total">
                                    <p class="mb-0 d-block d-md-none me-3 me-sm-0">{{__('frontend.cart.Total amount')}}</p>
                                    <div class="m-0 d-flex justify-content-between"><span class="me-3">{{$item->subtotal}} </span><a href="#" wire:click.prevent="destroy('{{$item->rowId}}')"><img src="{{asset('frontend/images/icons/cabinet/delete.svg')}}" alt=""></a></div>
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

                        <h2 style="color: red;">{{__('frontend.header.Cart is empty')}}</h2>
                        <a href="/" class="btn btn-success" style="margin-top: 20px;">{{__('frontend.cart.Make purchases')}}</a>
                    </div>
                    @endif
                </div>
            </div>
        </main>
