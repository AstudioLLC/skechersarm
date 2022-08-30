<header>
    <div class="container-fluid flex-fill d-flex align-items-center">
        <div class="container py-3">
            <div class="row">
                <div class="col-6 px-1">
                    <div class="d-flex align-items-center h-100">
                        <div class="logo me-3">
                            <a href="/">
                                <img src="{{ asset('images/logo.svg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="header-phone">
                            <a href="tel:{{$information->phone}}" class="text-decoration-none text-reset">
                                <div class="d-flex align-items-center">
                                    <div class="header-phone-icon me-2">
                                        <!-- <img src="{{ asset('images/icons/header-phone.svg') }}" class="img-fluid" alt=""> -->
                                        <span class="fs-3 text-primary">
                                            <i class="fa-solid fa-phone-arrow-down-left"></i>
                                        </span>
                                    </div>
                                    <div class="header-phone-info d-none d-lg-block">
                                        <p class="mb-0 fs-7">{{__('frontend.header.Call center')}}</p>
                                        <p class="mb-0 fs-6 fw-bold text-primary">{{$information->phone}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-block p-0 d-xl-none">
                    <div class="d-flex h-100 align-items-center justify-content-end">
                        <ul class="nav text-white align-items-center flex-nowrap">
                            <li class="nav-item mx-2">
                                <a class="nav-link p-0 fs-7 text-reset active" aria-current="page" href="{{Auth::check() ? route('cabinet.settings') : route('login')}}">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-5 text-primary">
                                            <i class="fa-light fa-user"></i>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link p-0 fs-7 text-reset active" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-5 text-primary">
                                            <i class="fa-light fa-cart-shopping"></i>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link p-0 fs-7 text-reset active" aria-current="page" href="{{route('favorite.products')}}">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-5 text-primary">
                                            <i class="fa-light fa-heart"></i>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span class="fs-3 text-primary toggleDrawerr d-inline-block text-center" style="transform: rotateY(180deg); cursor: pointer;">
                                    <i class="fa-solid fa-bars-sort"></i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 px-1 d-none d-xl-block">
                    <livewire:frontend.blocks.home.header-search-component/>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-primary d-none d-xl-block">
        <div class="container">
            <div class="row justify-content-end justify-content-xl-between">
                @if($frontCategories)
                <livewire:frontend.blocks.home.header-category-component/>
                @endif
                <div class="col-auto">
                    <ul class="nav text-white">
                        <li class="nav-item ms-4 ms-lg-2">
                            <a class="nav-link ps-0 pe-2 fs-7 text-reset py-3" aria-current="page" href="{{Auth::check() ? route('cabinet.settings') : route('login')}}">
                                <div class="d-flex align-items-center">
                                    <span class="fs-6">
                                        <i class="fa-light fa-user"></i>
                                    </span>
                                    @if(Auth::check())
                                    <span class="ms-1 d-lg-inline-block">
                                        {{(\Illuminate\Support\Facades\Auth::user()->name)?
                                            Illuminate\Support\Facades\Auth::user()->name : __('frontend.header.My account')}}
                                        </span>
                                        @else
                                        <span class="ms-1 d-none d-lg-inline-block">{{__('frontend.header.Login')}}</span>
                                        @endif
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ms-4 ms-lg-2">
                                <a class="nav-link ps-0 pe-2 fs-7 py-3 text-reset" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-6">
                                            <i class="fa-light fa-cart-shopping"></i>
                                        </span>
                                        <span class="ms-1 d-none d-lg-inline-block">{{__('frontend.header.Basket')}}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ms-4 ms-lg-2">
                                <a class="nav-link ps-0 pe-2 fs-7 py-3 text-reset" aria-current="page" href="{{route('favorite.products')}}">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-6">
                                            <i class="fa-light fa-heart"></i>
                                        </span>
                                        <span class="ms-1 d-none d-lg-inline-block">{{__('frontend.header.Favorite')}}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ms-4 ms-lg-2 dropdown" wire:ignore>
                                <a class="nav-link ps-0 pe-2 fs-7 py-3 text-reset dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('frontend/images/icons/'.LaravelLocalization::getCurrentLocale().'.png')}}" class="img-fluid" alt="">
                                </a>
                                <ul class="dropdown-menu laguage-bar" aria-labelledby="navbarDropdown">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if(LaravelLocalization::getCurrentLocale() !== $localeCode)
                                    <li>
                                        <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img src="{{asset('frontend/images/icons/'.$localeCode.'.png')}}" class="img-fluid" alt=""></a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav id="drawerr" class="drawerr--init d-xl-none" tabindex="-1">
        <div class="drawerr-container">
            <div class="drawerr-navigation-container"></div>
            <ul>
                @foreach($frontCategories as $parentCategory)
                <li>
                    <a href="#">{{$parentCategory->name}}</a>
                    <ul>
                        @foreach($parentCategory->childCategories as $category)
                        <li>
                            <a href="#"> {{$category->name}}</a>
                            <ul>
                                @foreach($category->childCategories as $childCategory)
                                <li>
                                    <!-- Ստեղ if else-ը ոնց պետքա գրելեմ, մնումա պայմանը ճիշտ գրվի որ true-ի դեպքում նոր ես if-ը աշխատի իսկ true տի տա են դեպքում եթե կան ենթակատեգորիաներ -->
                                    @if($childCategory->childCategories)
                                    <a href="#">{{$childCategory->name}}</a>
                                    <ul>
                                        @foreach($childCategory->childCategories as $lastCategory)
                                        <li>
                                            <a href="{{ route('category',[$parentCategory, $category, $childCategory->slug,$lastCategory->slug])}}">{{$lastCategory->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <a href="{{ route('category', [$parentCategory, $category, $childCategory->slug]) }}">{{$childCategory->name}}</a>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
<div class="d-flex">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    @if(LaravelLocalization::getCurrentLocale() !== $localeCode)
    <a class="border-0" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img src="{{asset('frontend/images/icons/'.$localeCode.'.png')}}" class="img-fluid" alt=""></a>
    @endif
    @endforeach
</div>
<livewire:frontend.blocks.home.header-search-component/>
</div>
</nav>
<div class="drawer-bacdrop"></div>
<livewire:frontend.blocks.home.header-basket-modal/>
