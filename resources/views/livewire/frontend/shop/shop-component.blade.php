<main>
    <!-- Breadcrumb -->
    <div class="container py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">Կատալոգ</a></li>
                @foreach($selCategories as $selCategory)
                    @if(!$loop->last)
                        <li class="breadcrumb-item fs-7">
                            @if(empty($selCategory->parentCategory))
                                <a href="{{route('category', [$selCategory->slug])}}" class="text-reset text-decoration-none">{{$selCategory->name}}</a></li>
                    @else
                        <a href="{{ route('category', [$selCategory->parentCategory, $selCategory])}}" class="text-reset text-decoration-none">{{$selCategory->name}}</a></li>
                    @endif
                    @else
                        <li class="breadcrumb-item fs-7 active" aria-current="page">{{$selCategory->name}}</li>
                    @endif
                @endforeach

            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="row m-0">
            <div class="col-3">
                <div class="offcanvas-lg offcanvas-start filter-offcanvas" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Responsive offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body d-block">
                        @foreach($category->filters as $filt)
                        <div class="accordion fs-3" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item border-start-0 border-end-0 rounded-0">
                                @if(count($filt->criteries))
                                <p class="accordion-header" id="menuItemTitle2{{$filt->id}}">
                                    <button class="accordion-button fs-6 text-muted collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#menuItem2{{$filt->id}}" aria-expanded="false" aria-controls="menuItem2{{$filt->id}}">
                                        {{$filt->title}}
                                    </button>
                                </p>
                                @endif
                                <div id="menuItem2{{$filt->id}}" class="accordion-collapse collapse" aria-labelledby="menuItemTitle2{{$filt->id}}">
                                    <div class="accordion-body px-0">
                                        <div class="product-ratio">
                                            @php $available_criteries = \DB::table('product_criteria')->whereIn('product_id',$products)->pluck('criteria_id')->toArray() @endphp
                                            @foreach($filt->criteries as $criteria)
                                                @if(in_array($criteria->id,$available_criteries))
                                                    <input type="checkbox" class="btn-check"  value="{{$criteria->id}}" wire:model="filter" id="flexCheckDefault{{$criteria->id}}"  wire:click="deleteFromDB({{ $criteria->id }})">
                                                    <label class="btn radio-btn-outline fs-7 mb-1 py-1 px-4 rounded-1" for="flexCheckDefault{{$criteria->id}}">{{$criteria->title}}</label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 px-0 px-lg-2">
                <h1 class="text-decoration-underline fs-4 text-underline-offset-2">@foreach($selCategories as $selCategory) @if($loop->last){{ $selCategory->name }}@endif @endforeach</h1>
                <div class="row m-0">
                    <div class="col-6 d-flex justify-content-start align-items-center ps-0">
                        <button class="btn d-lg-none ps-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
                            <img src="{{asset('images/icons/filter.svg')}}" alt="">
                        </button>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle fs-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Դասակարգել
                            </button>
                            <ul class="dropdown-menu fs-6" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">A-Z</a></li>
                                <li><a class="dropdown-item" href="#">Best</a></li>
                                <li><a class="dropdown-item" href="#">Something Best</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="desctop-products2">
                    <div class="row m-0 gap-0">
                        @foreach($items as $item)
                        <div class="col-6 col-sm-4 col-xl-3 p-1">
                            <div class="product-card">
                                <div class="product-card-img position-relative">
                                    <a href="{{ route('product', ['slug' => $item->slug]) }}">
                                        <div class="image-wrapper">
                                            @if(count($item->gallery))
                                            <ul>
                                                    @foreach($item->gallery as $gallery)
                                                        @once
                                                            <li>
                                                                <img src="{{asset('images/products')}}/{{$item->image}}" class="img-fluid" alt="{{$item->name}}" />
                                                            </li>
                                                        @endonce
                                                        <li>
                                                            <img src="{{asset('images/gallery')}}/{{$gallery->image}}" class="img-fluid" alt="{{$item->name}}" />
                                                        </li>
                                                    @endforeach
                                            </ul>
                                            @else
                                                    <img src="{{asset('images/products')}}/{{$item->image}}" class="img-fluid" alt="{{$item->name}}" />
                                            @endif
                                        </div>
                                    </a>
                                    <div class="w-100 align-items-end product-card-buttons position-absolute bottom-0 start-50 translate-middle-x d-flex {{($item->sale_percent)? 'justify-content-between' : 'justify-content-end'}}">
                                        @if($item->sale_percent)
                                        <span class="badge text-white bg-danger fs-7 rounded-0">-{{number_format($item->sale_percent)}}%</span>
                                        @endif
                                        <div class="product-card-buttons-icons me-2">
                                            @php($favorites = Cart::instance('wishlist')->content()->pluck('id'))
                                            @if($favorites->contains($item->id))
                                                <a class="bg-danger" wire:click.prevent="removeFromWishList('{{$item->id}}')">
                                                    <div class="product-card-buttons-icon">
                                                        <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" class="favorite-btn">
                                                    </div>
                                                </a>
                                            @else
                                                <a href="#" wire:click.prevent="addToWishList({{$item->id}},'{{$item->name}}',{{$item->price}})">
                                                    <div class="product-card-buttons-icon">
                                                        <img src="{{asset('frontend/images/icons/product-favorite.svg')}}" alt="" class="favorite-btn">
                                                    </div>
                                                </a>
                                            @endif
                                            <a href="{{ route('product', ['slug' => $item->slug]) }}">
                                                <div class="product-card-buttons-icon">
                                                    <img src="{{ asset('frontend/images/icons/bage.svg') }}" alt="" class="bag-btn">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-body p-3">
                                    <div class="product-title fs-6 my-2">
                                        <span class="text-primary">{{$item->categories->first()->parentCategory->parentCategory->name}}</span>
                                    </div>
                                    <div class="product-info fs-6 my-2">
                                        <p class="m-0">{{$item->name}}</p>
                                    </div>
                                    <div class="product-price fs-6 my-2">
                                        <span class="text-decoration-line-through fs-7 text-muted">{{($item->sale_price)?number_format($item->price). ' ֏' :null}} </span>
                                        <span class="fs-6 fw-bold">{{($item->sale_price != null) ? number_format($item->sale_price) :number_format($item->price)}} ֏</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
