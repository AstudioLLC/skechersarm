<div class="modal fade cart pe-0" id="cartModal" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="cart-modal modal-dialog modal-dialog-scrollable modal-fullscreen-md-down me-auto me-md-5 w-100">
        <div class="modal-content rounded-0">
            <div class="modal-header" style="border-bottom-style: dashed;">
                <p class="modal-title fs-7" id="staticBackdropLabel">Ձեր զամբյուղը</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if(Cart::instance('cart')->count() > 0)

            <div class="modal-body d-block">
                <!-- Cart Product -->
                @foreach(Cart::instance('cart')->content() as $item)
                <div class="cart-item">
                    <div class="cart-item-title text-limit-1">
                        <p class="fs-7">{{$item->model->name}}</p>
                    </div>

                    <div class="row m-0">
                        <div class="col-6 ps-0">
                            <div class="border position-relative">
                                <img src="{{asset('images/products')}}/{{$item->model->image}}" class="img-fluid" alt="{{$item->model->name}}">
                                @if($item->model->sale_percent)
                                <span class="position-absolute start-0 top-0 badge bg-danger rounded-0 fs-6 ms-1 mt-1">{{number_format($item->model->sale_percent)}} %</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex fs-7 justify-content-between">
                                <span class="fw-bold">Կոդ։</span>
                                <span class="text-muted">#{{$item->model->article_1c}}</span>
                            </div>
                            <div class="d-flex fs-7 justify-content-between">
                                <span class="fw-bold">Գույն։</span>
                                <span class="text-muted">Մոխրագույն</span>
                            </div>
                            <div class="d-flex fs-7 justify-content-between">
                                <span class="fw-bold">Չափ։</span>
                                <span class="text-muted">37</span>
                            </div>
                            @if($item->model->sale_price)
                            <div class="product-price fs-6 my-2">
                                <span class="text-decoration-line-through fs-7 text-muted me-2">{{$item->model->price}}</span>
                                <span class="fs-6 fw-bold">{{$item->model->sale_price}}</span>
                            </div>
                            @else
                            <div class="product-price fs-6 my-2">
                                <span class="fs-6 fw-bold">{{$item->model->price}}</span>
                            </div>
                            @endif

                            <div class="" style="width: 110px !important;">
                                <div class="input-group mb-1">
                                    <button class="btn border border-end-0 fs-6"  wire:click.prevent="decreaseQuantityCart('{{$item->rowId}}')">-</button>
                                    <input type="number" class="form-control border fs-7 text-center" value="{{$item->qty}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <button class="btn border border-start-0 fs-6" wire:click.prevent="increaseQuantityCart('{{$item->rowId}}')" max="{{$item->model->count}}">+</button>
                                </div>
                            </div>
                            <div class="product-price fs-6 my-2">
                                <span class="fs-6 fw-bold">{{ $item->model->sale_price ? $item->model->sale_price : $item->model->price }} ֏</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Cart Product End -->
            </div>
            <div class="modal-footer bg-light flex-column">
                <div class="d-flex justify-content-between w-100 fs-6">
                    <p class="m-0 fw-bold">Ընդամենը ՝</p>
                    <p class="m-0 fw-bold">{{Cart::instance('cart')->subtotal()}}</p>
                </div>
                <a href="#" class="btn text-decoration-underline fs-6" data-bs-toggle="modal" data-bs-target="#fastOrder">Արագ պատվեր</a>
                <a href="{{Auth::check() ? route('cabinet.cart') : route('login')}}" class="btn btn-primary w-100 rounded-1 fs-6">Պատվիրել</a>
            </div>
            @else
            <p class="text-center fs-7 mt-4 mb-2">Զամբյուղը դատարկ է</p>
            @endif
        </div>
    </div>
</div>
<livewire:frontend.blocks.home.fast-order-modal/>
