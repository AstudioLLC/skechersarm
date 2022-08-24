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
            <div class="col-12 col-xl-9 cabinet-info">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    @foreach($items as $key => $item)

                        <div class="accordion-item shadow-sm mb-4 border-0">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button justify-content-between flex-wrap" type="button" data-bs-toggle="collapse" data-bs-target="#orderId{{$key}}" aria-expanded="true" aria-controls="orderId1">
                                    <div class="acc-title">
                                        <p class="mb-1">Պատվերի Nº {{$item->order_id}}</p>
                                        <p class="mb-0">{{$item->created_at}}</p>
                                    </div>
                                    <div class="acc-status">
                                        <p class="mb-1">Պատվերի կարգավիճակ  - @if($item->status =='approved')Հաստատված է@endif
                                                                              @if($item->status=='sent')ուղարկվել է@endif
                                                                              @if($item->status=='pending')սպասվում է@endif
                                                                              @if($item->status=='shipping')Առաքվում է@endif

                                        </p>
                                        <p class="mb-0">Վճարման կարգավիճակ  - {{($item->is_paid == true)? 'Վճարված է' : 'Վճարված չէ' }}</p>
                                    </div>
                                </button>
                            </h2>
                            @foreach($item->orderItems as $orderItem)

                                <div id="orderId{{$key}}" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <div class="shopping-cart">
                                            <div class="shopping-cart-title d-none d-md-grid p-3 mb-3">
                                                <div class="shipping-cart-item title"></div>
                                                <div class="shipping-cart-item title">
                                                    Ապրանքի անվանում
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
                                                    Ընդհանուր գումար
                                                </div>
                                            </div>
                                            <div class="shopping-cart-info">
                                                <div class="shipping-cart-item shop-col-img">
                                                    <img src="{{asset('images/products')}}/{{$orderItem->product->image??null}}" alt="" class="shopping-cart-item-img">
                                                </div>
                                                <div class="shipping-cart-item shop-col-name">
                                                    <p class="m-0 d-block d-md-none">Ապրանքի անվանում</p>
                                                    <p class="m-0">{{$orderItem->product->name ?? null}}</p>
                                                </div>
                                                <div class="shipping-cart-item shop-col-price">
                                                    <p class="mb-3 d-block d-md-none text-start text-sm-center">Գին</p>
                                                    <div class="d-flex flex-row flex-sm-column align-items-center">
                                                        @if(isset($orderItem->product->sale_percent))
                                                        <span class="badge bg-danger rounded-0 fs-7">-{{$orderItem->product->sale_percent??null}}%</span>
                                                        @endif
                                                        <p class="text-muted badge d-block text-decoration-line-through m-0">
                                                            {{$orderItem->product->price ?? null}}</p>
                                                        <p class="m-0">{{$orderItem->product->sale_price ?? null}}</p>
                                                    </div>
                                                </div>
                                                <div class="shipping-cart-item shop-col-color">
                                                    <p class="mb-3 d-block d-md-none">Գույն</p>
                                                    <p class="m-0">Կանաչ</p>
                                                </div>
                                                <div class="shipping-cart-item shop-col-size">
                                                    <p class="mb-3 d-block d-md-none">Չափս</p>
                                                    <p class="m-0">{{$orderItem->size ?? null}}</p>
                                                </div>
                                                <div class="shipping-cart-item shop-col-quantity">
                                                    <p class="mb-3 d-block d-md-none">Քանակ</p>
                                                    <p>{{$orderItem->quantity ?? null}}</p>
                                                </div>
                                                <div class="shipping-cart-item shop-col-total">
                                                    <p class="mb-3 d-block d-md-none">Ընդհանուր գումար</p>
                                                    <div class="m-0 d-flex justify-content-between">{{$orderItem->price}} <a href="#"><img src="{{asset('images/icons/cabinet/delete.svg')}}" alt=""></a></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-end border-top pt-2">
                                <p class="fw-bold m-0">Ընդամենը՝ {{ $item->subtotal ?? null }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
