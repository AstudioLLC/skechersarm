<main>
    <!-- Breadcrumb -->
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{$page->title}}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="main-title justify-content-start my-1">
            <h1 class="fs-4 ps-0">{{$page->title}}</h1>
        </div>
        <div class="row">
            @foreach($items as  $item)
            <div class="col-12 shadow-sm rounded-1 p-3 mb-3">
                <div class="row p-0">
                    <div class="col-12 col-lg -6">
                        <h4 class="d-inline-block border-bottom border-dark pb-2">{{$item->title}}</h4>
                        <div class="stores-logo mt-2">
                            <img src="{{asset('frontend/images/logo-sm.svg')}}" alt="">
                        </div>
                        <div class="row p-0 mt-4 gap-3">
                            <div class="col-5">
                                <img src="{{asset('frontend/images/icons/stores/location.svg')}}" alt="">
                                <span class="ms-2"><a href="#" class="text-decoration-none text-reset">{{ $item->location }}</a></span>
                            </div>
                            <div class="col-5">
                                <img src="{{asset('frontend/images/icons/stores/phone.svg')}}" alt="">
                                <span class="ms-2"><a href="tel:+374 93 00 00 00" class="text-decoration-none text-reset">{{ $item->telephone }}</a></span>
                            </div>
                            <div class="col-5">
                                <img src="{{asset('frontend/images/icons/stores/phone.svg')}}" alt="">
                                <span class="ms-2"><a href="tel:+374 93 00 00 00" class="text-decoration-none text-reset">{{ $item->sec_telephone }}</a></span>
                            </div>
                            <div class="col-5">
                                <img src="{{asset('frontend/images/icons/stores/mail.svg')}}" alt="">
                                <span class="ms-2"><a href="mailto:" class="text-decoration-none text-reset">{{ $item->email }}</a></span>
                            </div>
                        </div>
                       <div class="mt-3">{{$item->description}}</div>
                    </div>
                    <div class="col-12 col-lg -6">
                        <div class="row m-0">

                            @foreach($item->gallery as $photo)
                                <div class="col-6 col-sm-3 mb-3">
                                    <img src="{{asset('images/gallery/')}}/{{$photo->image}}" class="w-100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
