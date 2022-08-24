<div class="offcanvas-xl offcanvas-start" tabindex="-1" id="offcanvasCabinet" aria-labelledby="offcanvasCabinetLabel" >
    <div class="offcanvas-header mt-5 mt-xl-0">
    </div>

    <div class="offcanvas-body d-block mt-5 mt-xl-0 pt-5 pt-xl-0">

        <div class="cabinet-sidebar shadow-sm p-2">
            <a href="{{route('cabinet.settings')}}" class="text-reset text-decoration-none mb-3 d-block">
                <div class="row align-items-center m-0 w-100">
                    <div class="col-2 p-0">
                        <img src="{{asset('frontend/images/icons/cabinet/user.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 p-0">
                        <p class="m-0">Անձնական տվյալներ</p>
                    </div>
                    <div class="col-2 p-0"></div>
                </div>
            </a>
            <a href="{{route('cabinet.wishlist')}}" class="text-reset text-decoration-none mb-3 d-block">
                <div class="row align-items-center m-0 w-100">
                    <div class="col-2 p-0">
                        <img src="{{asset('frontend/images/icons/cabinet/heart.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 p-0">
                        <p class="m-0">Նախընտրածներ</p>
                    </div>
                    <div class="col-2 p-0">({{Cart::instance('wishlist')->count()}})</div>
                </div>
            </a>
            <a href="{{route('cabinet.cart')}}" class="text-reset text-decoration-none mb-3 d-block">
                <div class="row align-items-center m-0 w-100">
                    <div class="col-2 p-0">
                        <img src="{{asset('frontend/images/icons/cabinet/basket.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 p-0">
                        <p class="m-0">Զամբյուղ</p>
                    </div>
                    <div class="col-2 p-0">({{Cart::instance('cart')->count()}})</div>
                </div>
            </a>
            <a href="{{route('cabinet.ongoing.purchases')}}" class="text-reset text-decoration-none mb-3 d-block">
                <div class="row align-items-center m-0 w-100">
                    <div class="col-2 p-0">
                        <img src="{{asset('frontend/images/icons/cabinet/box.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 p-0">
                        <p class="m-0">Ընթացիկ  գնումներ</p>
                    </div>
                    <div class="col-2 p-0">({{$count_ongoing_purchases}})</div>
                </div>
            </a>
            <a href="{{route('cabinet.purchasing.archive')}}" class="text-reset text-decoration-none mb-3 d-block">
                <div class="row align-items-center m-0 w-100">
                    <div class="col-2 p-0">
                        <img src="{{asset('frontend/images/icons/cabinet/money.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 p-0">
                        <p class="m-0">Գնումների արխիվ</p>
                    </div>
                    <div class="col-2 p-0">({{$count_order_archive}})</div>
                </div>
            </a>
            <a href="{{route('cabinet.bonus-card')}}" class="text-reset text-decoration-none mb-3 d-block">
                <div class="row align-items-center m-0 w-100">
                    <div class="col-2 p-0">
                        <img src="{{asset('frontend/images/icons/cabinet/money.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 p-0">
                        <p class="m-0">Բոնուս քարտ</p>
                    </div>

                </div>
            </a>
            <a href="{{route('cabinet.password.change')}}" class="text-reset text-decoration-none mb-3 d-block">
                <div class="row align-items-center m-0 w-100">
                    <div class="col-2 p-0">
                        <img src="{{asset('frontend/images/icons/cabinet/settings.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 p-0">
                        <p class="m-0">Կարգավորումներ</p>
                    </div>
                    <div class="col-2 p-0"></div>
                </div>
            </a>
            <form method="post" action="{{ route('logout') }}">
             @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); closest('form').submit();" class="text-reset text-decoration-none mb-3 d-block">
                <div class="row align-items-center m-0 w-100">
                    <div class="col-2 p-0">
                        <img src="{{asset('frontend/images/icons/cabinet/exit.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-8 p-0">
                        <p class="m-0">Ելք համակարգից</p>
                    </div>
                    <div class="col-2 p-0"></div>
                </div>
            </a>
            </form>
        </div>
    </div>
</div>
