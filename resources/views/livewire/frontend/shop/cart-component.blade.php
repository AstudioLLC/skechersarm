<main id="main" class="main-site p-4" >

    <div class="container">


        <div class=" main-content-area">

            <div class="wrap-iten-in-cart">
                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Հաջողությամբ </strong>{{Session::get('success_message')}}
                    </div>
                @endif
                @if(Cart::instance('cart')->count() > 0)
                    <h3 class="box-title">Ապրանքի անվանում</h3>
                    <ul class="products-cart">
                        @foreach(Cart::instance('cart')->content() as $item)
                            <li class="pr-cart-item">
                                <span>{{$item->options->size}}</span>
                                <div class="product-image">
                                    <figure><img style="width: 200px; height: 200px;" src="{{asset('images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" >{{$item->model->name}}</a>
                                </div>
                                    <div class="price-field produtc-price"><p class="price">{{$item->model->price}} ֏</p></div>

                                <div class="quantity">
                                    <div class="quantity-input">
                                        <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                        <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                        <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                                    </div>
                                </div>
                                <div class="price-field sub-total"><p class="price">{{$item->subtotal}} ֏</p></div>
                                <div class="delete">
                                    <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-delete" title="">
                                        <span>Delete from your cart</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Պատվերի տվյալներ</h4>
                            <p class="summary-info"><span class="title">Գումար</span><b class="index">{{Cart::instance('cart')->subtotal()}} դրամ</b></p>
                            {{--                    <p class="summary-info"><span class="title">Tax</span><b class="index">{{Cart::instance('cart'->tax()}}</b></p>--}}
                            <p class="summary-info"><span class="title">Առաքում</span><b class="index" style="color: red;">Անվճար</b></p>
                            <p class="summary-info total-info "><span class="title">Ընդհանուր</span><b class="index">{{Cart::instance('cart')->subtotal()}} դրամ</b></p>
                        </div>
                        <div class="checkout-info">
                            {{--                                <label class="checkbox-field">--}}
                            {{--                                    <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>--}}
                            {{--                                </label>--}}
                            <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Հաստատել պատվերը</a>
                            <a class="link-to-shop" href="/shop">Շարունակել գնումները<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                        <div class="update-clear">
                            <a class="btn btn-clear" wire:click.prevent="destroyAll()" href="#">Դատարկել Զամբյուղը</a>
                            {{--                                <a class="btn btn-update" href="#">Update Shopping Cart</a>--}}
                        </div>
                    </div>
                @else
                    <center><h2 style="color: red;">Զամբյուղը դատարկ է</h2></center>
                    <center><a href="/shop" class="btn btn-success" style="margin-top: 20px;">Կատարել գնումներ</a></center>
                @endif
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
