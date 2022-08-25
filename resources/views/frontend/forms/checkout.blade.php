    <div class="d-flex gap-3 justify-content-end mt-3 take-away-radio">
        <div class="form-check shadow-sm p-2 ps-5 pe-4">
            <input class="form-check-input" type="radio" value="0" name="ship_method" id="takeAway">
            <label class="form-check-label" for="takeAway">
                Վերցնել խանութից
            </label>
        </div>
        <div class="form-check shadow-sm p-2 ps-5 pe-4">
            <input class="form-check-input" type="radio"  value="1" name="ship_method" id="delivery">
            <label class="form-check-label" for="delivery">
                Առաքում
            </label>
        </div>
    </div>
    <form method="post" action="{{route('place.order')}}">
        @csrf
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
        <div class="d-flex justify-content-end mt-4 gap-5 me-2 fw-bold">
            <p class="m-0">Ընդամենը՝</p>
            <p class="m-0">{{number_format(Cart::instance('cart')->subtotal)}} <small>֏</small> </p>
        </div>
        <input type="hidden" name="subtotal" value="{{Cart::instance('cart')->subtotal}}">
        <div class="d-flex justify-content-end mt-1 flex-wrap gap-2">
            <button class="btn btn-primary px-4 py-2 rounded-1" type="submit">Պատվիրել</button>
            {{--    <button class="btn btn-primary px-4 py-2 rounded-1" type="submit">Շարունակել պատվերը</button>--}}
        </div>
    </div>
    </form>
    <form method="post" action="{{route('place.order')}}">
        @csrf
    <div class="delivery" wire:ignore.self>
        <div class="row mt-4">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Քաղաք/բնակավայրը *</label>
                    <select class="form-select bg-light border-0 p-2 mt-2 " id="selectCity" wire:model="city" name="city" aria-label="Default select example">
                        <option value="">Choose City</option>
                        @foreach($delivery as $city)
                            <option  value="{{ $city->id }}">{{ $city->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Վարչական շրջանը *</label>
                    <select class="form-select bg-light border-0 p-2 mt-2"  wire:model="regions" name="district" aria-label="Default select example">
                        <option value="">Choose City</option>
                        @if (!is_null($region))
                            @foreach($region as $val)
                                <option  value="{{$val->id}}" >{{ $val->title }}</option>
                            @endforeach
                        @endif
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
                    <input class="form-check-input" type="radio" value="arca" name="online_payment_type" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55" height="35" viewBox="0 0 35 15">
                            <defs>
                                <clipPath id="clip-Artboard_4">
                                    <rect width="35" height="15"/>
                                </clipPath>
                            </defs>
                            <g id="Artboard_4" data-name="Artboard – 4" clip-path="url(#clip-Artboard_4)">
                                <g id="g4158" transform="translate(3 3)">
                                    <path id="polygon9" d="M32.669,24.657H30.383l1.429-8.847H34.1Z" transform="translate(-20.433 -15.651)" fill="#00579f"/>
                                    <path id="path11" d="M44.03,15.893A5.715,5.715,0,0,0,42,15.52c-2.261,0-3.832,1.2-3.86,2.923,0,1.27,1.139,1.977,2,2.4s1.183.712,1.183,1.1c0,.591-.712.865-1.372.865a4.582,4.582,0,0,1-2.168-.457l-.3-.143-.318,1.987a7.057,7.057,0,0,0,2.551.471c2.4,0,3.963-1.188,3.98-3.022,0-1.007-.6-1.779-1.922-2.409-.8-.405-1.286-.679-1.286-1.1s.411-.762,1.314-.762a3.92,3.92,0,0,1,1.709.339l.2.093.312-1.91Z" transform="translate(-23.505 -15.52)" fill="#00579f"/>
                                    <path id="path13" d="M52.332,21.515l.909-2.474s.191-.514.3-.849l.165.767s.433,2.119.547,2.557Zm2.82-5.71H53.384a1.128,1.128,0,0,0-1.193.734l-3.4,8.129h2.4s.394-1.1.476-1.331h2.94c.066.312.274,1.331.274,1.331H57Z" transform="translate(-28.763 -15.645)" fill="#00579f"/>
                                    <path id="path15" d="M22.22,15.81l-2.239,6.02L19.735,20.6a6.767,6.767,0,0,0-3.165-3.7l2.053,7.773h2.42l3.6-8.84Z" transform="translate(-14.183 -15.651)" fill="#00579f"/>
                                    <path id="path17" d="M15.927,15.8H12.243l-.033.175a7.675,7.675,0,0,1,5.555,4.632l-.8-4.062A.942.942,0,0,0,15.927,15.8Z" transform="translate(-12.21 -15.645)" fill="#faa61a"/>
                                </g>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55" height="35" viewBox="0 0 35 15">
                            <defs>
                                <clipPath id="clip-Artboard_2">
                                    <rect width="35" height="15"/>
                                </clipPath>
                            </defs>
                            <g id="Artboard_2" data-name="Artboard – 2" clip-path="url(#clip-Artboard_2)">
                                <g id="maestro" transform="translate(9.002 1)">
                                    <path id="Path_12397" data-name="Path 12397" d="M61.25,28.834V28.62h-.058l-.064.147-.064-.147h-.039v.214h.042v-.162l.058.139h.042l.058-.139v.162Zm-.353,0v-.177h.072V28.62H60.8v.038h.075v.177Z" transform="translate(-44.318 -20.423)" fill="#0099df"/>
                                    <path id="Path_12398" data-name="Path 12398" d="M37.106,17.2H32.28V8.53h4.826Z" transform="translate(-26.084 -7.646)" fill="#6c6bbd"/>
                                    <path id="Path_12399" data-name="Path 12399" d="M21.757,10.9a5.509,5.509,0,0,1,2.1-4.338,5.516,5.516,0,1,0,0,8.676A5.505,5.505,0,0,1,21.755,10.9" transform="translate(-14.939 -5.38)" fill="#eb001b"/>
                                    <path id="Path_12400" data-name="Path 12400" d="M47.634,10.9a5.516,5.516,0,0,1-8.924,4.338,5.524,5.524,0,0,0,0-8.676A5.516,5.516,0,0,1,47.634,10.9" transform="translate(-30.414 -5.38)" fill="#0099df"/>
                                    <path id="Path_12401" data-name="Path 12401" d="M32.75,37.489a.642.642,0,0,1,.231.042l-.1.3a.469.469,0,0,0-.2-.038c-.207,0-.312.135-.312.375v.822h-.32V37.527h.315V37.7a.435.435,0,0,1,.375-.214m-1.167.312h-.5v.664c0,.147.053.244.214.244a.57.57,0,0,0,.282-.083l.09.274a.769.769,0,0,1-.4.115c-.375,0-.507-.2-.507-.544V37.8h-.3v-.289h.3V37.08h.319v.447h.519Zm-4.082.315a.375.375,0,1,1,.75,0Zm1.1.13a.7.7,0,0,0-.692-.75.717.717,0,0,0-.75.75.724.724,0,0,0,.75.769.886.886,0,0,0,.6-.207l-.154-.237a.713.713,0,0,1-.428.154.4.4,0,0,1-.435-.375h1.084v-.124m1.4-.375a.964.964,0,0,0-.454-.124c-.177,0-.282.064-.282.173s.115.124.248.143l.15.023c.319.045.514.18.514.435s-.248.48-.668.48a1.032,1.032,0,0,1-.635-.192l.15-.248a.777.777,0,0,0,.488.154c.218,0,.334-.064.334-.177s-.083-.132-.259-.154l-.15-.023c-.327-.045-.507-.192-.507-.432s.24-.469.612-.469a1.092,1.092,0,0,1,.6.154Zm3.955-.049a.48.48,0,0,0-.18.034.45.45,0,0,0-.244.244.54.54,0,0,0-.034.192.51.51,0,0,0,.034.192.417.417,0,0,0,.1.15.435.435,0,0,0,.147.1.48.48,0,0,0,.18.034.488.488,0,0,0,.184-.034.435.435,0,0,0,.147-.1.417.417,0,0,0,.1-.15.447.447,0,0,0,.038-.192.469.469,0,0,0-.038-.192.45.45,0,0,0-.244-.244.488.488,0,0,0-.184-.034m0-.3a.814.814,0,0,1,.57.222.848.848,0,0,1,.165.244.833.833,0,0,1,.058.308.818.818,0,0,1-.058.308.8.8,0,0,1-.165.244.808.808,0,0,1-.252.165.923.923,0,0,1-.635,0,.75.75,0,0,1-.248-.165.687.687,0,0,1-.165-.244.818.818,0,0,1,0-.615.721.721,0,0,1,.165-.244.75.75,0,0,1,.248-.162.8.8,0,0,1,.315-.058m-8.285.745a.439.439,0,1,1,.12.333.439.439,0,0,1-.12-.333m1.186,0v-.719H26.5V37.7a.552.552,0,0,0-.462-.214.769.769,0,0,0,0,1.539.552.552,0,0,0,.462-.214v.177h.319ZM25.023,39v-.923a.548.548,0,0,0-.577-.582.567.567,0,0,0-.514.259.537.537,0,0,0-.484-.259.48.48,0,0,0-.428.218v-.18H22.7V38.99h.319v-.814a.346.346,0,0,1,.375-.375c.21,0,.319.139.319.375v.814h.323v-.814a.346.346,0,0,1,.375-.375c.218,0,.323.139.323.375v.814Z" transform="translate(-20.101 -26.053)" fill="#231f20"/>
                                    <path id="Path_12402" data-name="Path 12402" d="M55.431,41.7v.045h0Zm.034-.027a.067.067,0,0,1,.042,0,.049.049,0,0,1,0,.034.034.034,0,0,1,0,.027.071.071,0,0,1-.034,0l.045.049h-.034l-.038-.038h0v.049H55.42v-.135Zm0,.18a.094.094,0,0,0,.045,0l.034-.023a.135.135,0,0,0,.027-.038.139.139,0,0,0,0-.09l-.027-.034-.034-.027h-.09l-.038.027a.174.174,0,0,0-.023.034.139.139,0,0,0,0,.09.123.123,0,0,0,.023.038l.037.023a.094.094,0,0,0,.045,0m0-.259a.105.105,0,0,1,.058,0,.1.1,0,0,1,.049.03.135.135,0,0,1,.03.045.15.15,0,0,1,0,.058.111.111,0,0,1-.079.135h-.058a.154.154,0,0,1-.058,0,.135.135,0,0,1-.045-.03.143.143,0,0,1-.034-.049.124.124,0,0,1,0-.058.15.15,0,0,1,0-.058.1.1,0,0,1,.034-.045.075.075,0,0,1,.045-.03.109.109,0,0,1,.058,0" transform="translate(-40.79 -28.869)" fill="#231f20"/>
                                </g>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55" height="35" viewBox="0 0 35 15">
                            <defs>
                                <clipPath id="clip-Artboard_3">
                                    <rect width="35" height="15"/>
                                </clipPath>
                            </defs>
                            <g id="Artboard_3" data-name="Artboard – 3" clip-path="url(#clip-Artboard_3)">
                                <g id="Group_5732" data-name="Group 5732" transform="translate(9.002 1)">
                                    <path id="Path_12403" data-name="Path 12403" d="M32.008,38.643v.045h0Zm.031-.026a.057.057,0,0,1,.038,0,.049.049,0,0,1,0,.034.037.037,0,0,1,0,.026.047.047,0,0,1-.028,0l.042.049H32.06l-.035-.037h0v.049H32V38.6Zm0,.18a.063.063,0,0,0,.038,0l.035-.022a.08.08,0,0,0,.021-.037.1.1,0,0,0,0-.09.091.091,0,0,0-.021-.034l-.035-.026H32l-.035.026a.091.091,0,0,0-.021.034.1.1,0,0,0,0,.09.08.08,0,0,0,.021.037L32,38.8a.07.07,0,0,0,.042,0m0-.259a.09.09,0,0,1,.1.03.137.137,0,0,1,.028.045.163.163,0,0,1,0,.056.135.135,0,0,1,0,.056.119.119,0,0,1-.072.079h-.053a.129.129,0,0,1-.053,0,.119.119,0,0,1-.072-.079.135.135,0,0,1,0-.056.164.164,0,0,1,0-.056.137.137,0,0,1,.028-.045.088.088,0,0,1,.045-.03.092.092,0,0,1,.053,0M19.508,38.02a.421.421,0,0,1,.42-.416.445.445,0,0,1-.011.885.386.386,0,0,1-.3-.136.463.463,0,0,1-.11-.333m1.087,0v-.731h-.282v.176a.493.493,0,0,0-.423-.213.772.772,0,0,0,0,1.538.493.493,0,0,0,.423-.213v.176H20.6Zm9.864,0a.421.421,0,0,1,.421-.416.445.445,0,0,1-.015.885.387.387,0,0,1-.3-.138.463.463,0,0,1-.106-.331m1.087,0V36.7h-.293v.75a.493.493,0,0,0-.423-.213.772.772,0,0,0,0,1.538.493.493,0,0,0,.423-.213v.176h.293Zm-7.326-.484a.36.36,0,0,1,.344.373h-.689a.36.36,0,0,1,.344-.373m0-.285a.627.627,0,0,0-.484.216.75.75,0,0,0-.184.532.759.759,0,0,0,.186.552.632.632,0,0,0,.5.217.77.77,0,0,0,.55-.207l-.144-.236a.605.605,0,0,1-.389.154.352.352,0,0,1-.273-.1.419.419,0,0,1-.129-.279h1v-.12a.741.741,0,0,0-.171-.526.62.62,0,0,0-.469-.224m3.525.75a.421.421,0,0,1,.421-.416.445.445,0,0,1-.015.888.387.387,0,0,1-.3-.137.463.463,0,0,1-.106-.331m1.087,0v-.7h-.292v.176a.493.493,0,0,0-.423-.213.772.772,0,0,0,0,1.538.493.493,0,0,0,.423-.213v.176h.292Zm-2.752,0a.787.787,0,0,0,.2.554.728.728,0,0,0,.992.039l-.137-.255a.564.564,0,0,1-.344.131.47.47,0,0,1,0-.938.564.564,0,0,1,.344.131l.135-.259a.734.734,0,0,0-.986.036.785.785,0,0,0-.213.541m3.762-.75a.394.394,0,0,0-.344.213v-.176h-.271v1.463h.292v-.781c0-.24.1-.373.285-.373a.458.458,0,0,1,.182.034l.089-.3a.585.585,0,0,0-.207-.037m-7.831.146a.937.937,0,0,0-.547-.154c-.344,0-.56.176-.56.469,0,.236.165.373.464.432l.137.022c.16.022.234.068.234.154s-.106.176-.306.176a.67.67,0,0,1-.444-.154l-.137.247a.914.914,0,0,0,.581.191c.385,0,.612-.2.612-.479s-.179-.373-.471-.435l-.137-.022c-.124-.019-.227-.045-.227-.143s.1-.172.254-.172a.844.844,0,0,1,.419.124Zm3.783-.154a.394.394,0,0,0-.344.213v-.176h-.31v1.463h.31v-.816c0-.24.1-.373.285-.373a.458.458,0,0,1,.182.034l.089-.3a.585.585,0,0,0-.207-.037m-2.49.037h-.5v-.454h-.3v.447h-.271v.274h.271v.668c0,.341.12.544.468.544a.666.666,0,0,0,.365-.086l-.086-.274a.491.491,0,0,1-.258.082c-.144,0-.193-.1-.193-.244v-.692h.479Zm-4.393,1.453v-.919a.576.576,0,0,0-.145-.42.479.479,0,0,0-.385-.16.507.507,0,0,0-.471.259.483.483,0,0,0-.444-.259.426.426,0,0,0-.392.218v-.18H16.81v1.463H17.1v-.815a.364.364,0,0,1,.092-.276.3.3,0,0,1,.253-.1c.193,0,.292.139.292.373v.814h.3v-.811a.365.365,0,0,1,.086-.266.3.3,0,0,1,.241-.106c.2,0,.3.139.3.373v.814Z" transform="translate(-15.539 -25.815)" fill="#231f20"/>
                                    <path id="Path_12405" data-name="Path 12405" d="M36.6,17.2H31.77V8.53H36.6Z" transform="translate(-25.579 -7.641)" fill="#ff5f00"/>
                                    <path id="Path_12406" data-name="Path 12406" d="M21.245,10.894a5.506,5.506,0,0,1,2.1-4.336,5.514,5.514,0,1,0,0,8.673,5.5,5.5,0,0,1-2.1-4.336" transform="translate(-14.43 -5.374)" fill="#eb001b"/>
                                    <path id="Path_12407" data-name="Path 12407" d="M47.128,10.885A5.514,5.514,0,0,1,38.2,15.221a5.522,5.522,0,0,0,0-8.673,5.514,5.514,0,0,1,8.928,4.336" transform="translate(-29.907 -5.365)" fill="#f79e1b"/>
                                </g>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55" height="35" viewBox="0 0 35 15">
                            <defs>
                                <clipPath id="clip-Artboard_5">
                                    <rect width="35" height="15"/>
                                </clipPath>
                            </defs>
                            <g id="Artboard_5" data-name="Artboard – 5" clip-path="url(#clip-Artboard_5)">
                                <g id="arca" transform="translate(-102.9 -266.5)">
                                    <path id="Path_1" data-name="Path 1" d="M115.094,278.388l.053-.263a.566.566,0,0,1-.221-.053.656.656,0,0,1-.19-.147.305.305,0,0,1-.084-.19l-.527-6.677a.59.59,0,0,0-.105-.305.548.548,0,0,0-.221-.19.72.72,0,0,0-.305-.063h-3.4l-.074.263a.314.314,0,0,1,.158.053.363.363,0,0,1,.126.126.313.313,0,0,1,.053.158.234.234,0,0,1-.011.095c-.011.021-.011.053-.032.074l-3.36,6.509a.377.377,0,0,0-.042.116.4.4,0,0,0-.011.105.355.355,0,0,0,.126.274.508.508,0,0,0,.348.105h2.475l.053-.263a.423.423,0,0,1-.158-.032.257.257,0,0,1-.116-.095.324.324,0,0,1-.053-.126V277.8a.2.2,0,0,1,.021-.084l.463-.937h1.38l.105,1.169a.405.405,0,0,0,.169.337.812.812,0,0,0,.442.095h2.938Zm-3.749-4.413.095,1.285h-.653l.558-1.285Z" transform="translate(0 0)" fill="#2b2c6d"/>
                                    <path id="Path_2" data-name="Path 2" d="M191.376,288.459a.425.425,0,0,1,.19-.274.812.812,0,0,1,.442-.095h.495a1.26,1.26,0,0,0,.621-.137.811.811,0,0,0,.358-.432l.326-1.422h-.99a.927.927,0,0,0-.369.063.777.777,0,0,0-.263.179,1.443,1.443,0,0,0-.211.274c-.063.105-.137.232-.221.358h-.137c.021-.084.042-.158.053-.221a1.217,1.217,0,0,0,.021-.168.375.375,0,0,0-.126-.305.683.683,0,0,0-.432-.116H188.6l-.053.263a.263.263,0,0,1,.147.042.436.436,0,0,1,.126.116.355.355,0,0,1,.053.179v.095a.463.463,0,0,1-.021.105l-1.116,4.813a.724.724,0,0,0-.021.137.363.363,0,0,0-.011.095.278.278,0,0,0,.105.221.492.492,0,0,0,.263.095h2.854l.074-.263a.252.252,0,0,1-.147-.053.363.363,0,0,1-.126-.126.318.318,0,0,1-.053-.168v-.095a.205.205,0,0,1,.011-.084l.7-3.075Z" transform="translate(-72.29 -13.957)" fill="#2b2c6d"/>
                                    <path id="Path_3" data-name="Path 3" d="M243.014,276.5a.6.6,0,0,1-.495-.179.568.568,0,0,1-.053-.506l.632-2.707a1.448,1.448,0,0,1,.137-.411.66.66,0,0,1,.263-.274.95.95,0,0,1,.463-.095h1.158a1.085,1.085,0,0,0,.453-.084.572.572,0,0,0,.242-.232,1.585,1.585,0,0,0,.126-.358c.032-.105.053-.221.095-.369s.063-.284.095-.421a3.006,3.006,0,0,0,.063-.369h-3.886a2.275,2.275,0,0,0-.748.126,2.16,2.16,0,0,0-.685.4,2.6,2.6,0,0,0-.558.685,3.452,3.452,0,0,0-.369.979l-.632,2.749a7.376,7.376,0,0,0-.169.958,2.557,2.557,0,0,0,.032.811,1.328,1.328,0,0,0,.305.621,1.512,1.512,0,0,0,.663.4,3.488,3.488,0,0,0,1.085.137h2.57a1.885,1.885,0,0,0,.663-.095.783.783,0,0,0,.358-.253.922.922,0,0,0,.169-.4l.326-1.443h-.263a.3.3,0,0,1-.126.158,1.077,1.077,0,0,1-.221.105.939.939,0,0,1-.232.032h-1.464Z" transform="translate(-118.305)" fill="#2b2c6d"/>
                                    <path id="Path_4" data-name="Path 4" d="M304.359,290.686a1.23,1.23,0,0,1,.116-.337.473.473,0,0,1,.169-.158.422.422,0,0,1,.2-.032h.263l-.242,1.043a.443.443,0,0,1-.105.211.288.288,0,0,1-.2.084h-.084c-.084,0-.137-.011-.169-.053s-.053-.084-.053-.168a.363.363,0,0,1,.011-.095c0-.032.011-.074.011-.105l.084-.39Zm2.949-3.886h-3.9l-.242.969a.379.379,0,0,0-.021.116.432.432,0,0,0-.011.116.356.356,0,0,0,.116.305.673.673,0,0,0,.411.095h1.517a.292.292,0,0,1,.232.074.3.3,0,0,1,.021.263.339.339,0,0,1-.137.211.436.436,0,0,1-.242.063h-1.506a2.047,2.047,0,0,0-.906.19,1.67,1.67,0,0,0-.674.632,3.747,3.747,0,0,0-.453,1.19c-.011.084-.032.179-.053.284s-.032.19-.042.284-.021.169-.021.232a1.592,1.592,0,0,0,.147.748.739.739,0,0,0,.411.369,1.656,1.656,0,0,0,.632.105h.463a2.847,2.847,0,0,0,.569-.042,1.207,1.207,0,0,0,.39-.137,1.07,1.07,0,0,0,.284-.253,3.781,3.781,0,0,0,.263-.4h.137l-.032.147a.7.7,0,0,0,0,.295.366.366,0,0,0,.158.221.706.706,0,0,0,.369.084h2.58l.053-.263a.711.711,0,0,1-.147-.021.234.234,0,0,1-.137-.084.222.222,0,0,1-.063-.169.394.394,0,0,1,.011-.116c.011-.032.011-.084.021-.137l.885-3.791c.011-.053.021-.105.032-.169s.011-.126.021-.19a.91.91,0,0,0,.011-.158,1.138,1.138,0,0,0-.147-.59.855.855,0,0,0-.411-.358,1.472,1.472,0,0,0-.59-.116Z" transform="translate(-174.016 -14.583)" fill="#2b2c6d"/>
                                </g>
                            </g>
                        </svg>
                    </label>
                </div>
                <div class="form-check shadow-sm p-2 ps-5 pe-4 d-flex align-items-center justify-content-between gap-3">
                    <input class="form-check-input" type="radio" value="idram" name="online_payment_type" id="paymentWithIdram">
                    <label class="form-check-label" for="paymentWithIdram">
                        <img src="{{asset('frontend/images/icons/cabinet/Artboard6.svg')}}" alt="">
                    </label>
                </div>
            </div>
        </div>
        @if($deliveryprice && ($region) && ($regions))
            <div class="d-flex justify-content-end mt-4 gap-5 me-2 fw-bold">
                <p class="m-0">Առաքման գին՝</p>
                <p class="m-0">{{number_format($deliveryprice)}} <small>֏</small></p>
            </div>
        @endif
        <div class="d-flex justify-content-end mt-2 gap-5 me-2 fw-bold">
            <p class="m-0">Ընդամենը՝</p>

            <p class="m-0">@if($region && $regions && $deliveryprice) {{number_format($deliveryprice+Cart::instance('cart')->subtotal)}} <small> ֏</small>@else  {{number_format(Cart::instance('cart')->subtotal)}} <small>֏</small> @endif</p>
            @if($deliveryprice && ($region) && ($regions))
                <input type="hidden" name="delivery" value="{{$deliveryprice}}">
            @endif
            <input type="hidden" name="subtotal" value="@if($region && $regions && $deliveryprice) {{$deliveryprice+Cart::instance('cart')->subtotal}} @else  {{Cart::instance('cart')->subtotal}} @endif">
        </div>


        <div class="d-flex justify-content-end mt-1 flex-wrap gap-2">
            <button class="btn btn-primary px-4 py-2 rounded-1" type="submit">Պատվիրել</button>
            {{--    <button class="btn btn-primary px-4 py-2 rounded-1" type="submit">Շարունակել պատվերը</button>--}}
        </div>
    </div>
</form>
