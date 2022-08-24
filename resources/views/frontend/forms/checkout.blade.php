<form method="post" action="{{route('place.order')}}">
    @csrf
    <div class="d-flex gap-3 justify-content-end mt-3 take-away-radio">
        <div class="form-check shadow-sm p-2 ps-5 pe-4">
            <input class="form-check-input" type="radio" value="0" name="ship_method" id="takeAway">
            <label class="form-check-label" for="takeAway">
                Վերցնել խանութից
            </label>
        </div>
        <div class="form-check shadow-sm p-2 ps-5 pe-4">
            <input class="form-check-input" type="radio" value="1" name="ship_method" id="delivery">
            <label class="form-check-label" for="delivery">
                Առաքում
            </label>
        </div>
    </div>
    <div class="take-away">
        <div class="row mt-4">
            @foreach($storeAddresses as $store)
            <div class="col-12 col-lg-4 mb-3">
                <div class="shadow-sm p-2 rounded-2 d-flex justify-content-between flex-row flex-wrap flex-lg-column">
                    <div class="d-flex justify-content-between mb-2 gap-3">
                        <label for="checkboxNoLabel">{{$store->title}}</label>
                        <input class="form-check-input" type="checkbox" name="stores" id="checkboxNoLabel" value="{{$store->title}}" aria-label="...">
                    </div>
                    <div class="d-flex gap-3 align-items-center mb-2">
                        <img src="{{asset('frontend/images/icons/cabinet/call.svg')}}" alt="">
                        <a href="tel:{{$store->telephone}}" class="text-reset text-decoration-none">{{$store->telephone}}</a>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <img src="{{asset('frontend/images/icons/cabinet/message.svg')}}" alt="">
                        <a href="mailto:{{$store->email}}" class="text-reset text-decoration-none">{{$store->email}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="shadow-sm map mt-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97584.07285783392!2d44.41852711570928!3d40.15336930086725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa2dab8fc8b5b%3A0x3d1479ae87da526a!2z0JXRgNC10LLQsNC9LCDQkNGA0LzQtdC90LjRjw!5e0!3m2!1sru!2s!4v1654607973209!5m2!1sru!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="delivery">
        <div class="row mt-4">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Քաղաք/բնակավայրը *</label>
                    <select class="form-select bg-light border-0 p-2 mt-2" name="city" aria-label="Default select example">
                        <option selected>Երևանում</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Վարչական շրջանը *</label>
                    <select class="form-select bg-light border-0 p-2 mt-2"  name="district" aria-label="Default select example">
                        <option selected>Շենգավիթ</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="checkoutAddress">Հասցե *</label>
                    <input type="text" class="form-control bg-light border-0 p-2 mt-2" id="checkoutAddress" placeholder="Tumanyan 42/1">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-md-6">
                <div class="form-group" for="message">
                    <label for="">Նշումները</label>
                    <textarea id="message" name="notes" class="form-control bg-light mt-2 border-0" rows="10"></textarea>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex">
                <div class="form-group d-flex flex-column flex-fill">
                    <label for="">Ծանուցում</label>
                    <div class="border mt-2 flex-fill py-4 px-3">
                        <p class="">Առաքման կանոններ</p>
                        <p>-Երևան՝ 1-3 աշխատանքային օր</p>
                        <p>-Երևան՝ 1-3 աշխատանքային օր</p>
                        <p>-Երևան՝ 1-3 աշխատանքային օր</p>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="text-end mt-4">Ընտրեք վճարման եղանակը</h6>
        <div class="d-flex gap-3 justify-content-end mt-3 flex-wrap pay-radio">
            <div class="form-check shadow-sm p-2 ps-5 pe-4">
                <input class="form-check-input" type="radio" name="payment_type" value="0" id="payOffline">
                <label class="form-check-label" for="payOffline">
                    Վճարել խանութում
                </label>
            </div>
            <div class="form-check shadow-sm p-2 ps-5 pe-4">
                <input class="form-check-input" type="radio" name="payment_type" value="1" id="payOnline">
                <label class="form-check-label" for="payOnline">
                    Վճարում օնլայն
                </label>
            </div>
        </div>
        <div class="pay-online">
            <div class="d-flex gap-3 justify-content-end mt-3 flex-wrap">
                <div class="form-check shadow-sm p-2 ps-5 pe-4 d-flex align-items-center justify-content-between gap-3">
                    <input class="form-check-input" type="radio" value="arca" name="online_payment_type" id="paymantWithArca">
                    <label class="form-check-label" for="paymantWithArca">
                        <img src="{{asset('frontend/images/icons/cabinet/Visa.png')}}" alt="">
                        <img src="{{asset('frontend/images/icons/cabinet/Maestro.png')}}" alt="">
                        <img src="{{asset('frontend/images/icons/cabinet/Maestro-1.png')}}" alt="">
                        <img src="{{asset('frontend/images/icons/cabinet/Arca.png')}}" alt="">

                    </label>
                </div>
                <div class="form-check shadow-sm p-2 ps-5 pe-4 d-flex align-items-center justify-content-between gap-3">
                    <input class="form-check-input" type="radio" value="idram" name="online_payment_type" id="paymentWithIdram">
                    <label class="form-check-label" for="paymentWithIdram">
                        <img src="{{asset('frontend/images/icons/cabinet/idram.png')}}" alt="">
                    </label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-4 gap-5 me-2 fw-bold">
            <p class="m-0">Ընդամենը՝</p>
            <p class="m-0">{{Cart::instance('cart')->subtotal}}</p>
        </div>
        <div class="d-flex justify-content-end mt-1 flex-wrap gap-2">
            <button class="btn btn-primary px-4 py-2 rounded-1" type="submit">Պատվիրել</button>
            {{--    <button class="btn btn-primary px-4 py-2 rounded-1" type="submit">Շարունակել պատվերը</button>--}}
        </div>
    </div>
</form>