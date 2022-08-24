<div class="col d-none d-xl-block category">
    <ul class="nav text-white">
        <li class="nav-item">
            <a class="nav-link  ps-0 pe-2 fs-7 text-reset py-3" style="cursor: pointer">Կատալոգ</a>
            <div class="mega-menu">
                <div class="container position-relative bg-light pt-4">
                    <ul class="nav flex-column">
                        @foreach($frontCategories as $parentCategory)
                        <li class="nav-item">
                            <a class="nav-link fs-6 fw-normal text-dark" aria-current="page" style="cursor: pointer" >{{$parentCategory->name}}
{{--                                ({{ $parentCategory->products_count }})--}}
                            </a>
                            <div class="sub-mega-menu bg-white h-100 pt-3">
                                <div class="row justify-content-between m-0 bg-white p-3 pt-2">
                                    @foreach($parentCategory->childCategories as $category)
                                    <div class="col-3">
                                        <a class="nav-link fs-6 fw-bold ps-0 text-dark active" aria-current="page" href="{{ route('category', [$parentCategory, $category->slug]) }}">
                                        <p class="fw-bold fs-7 text-dark ps-3 mb-2"> {{$category->name}}
{{--                                            ({{ $category->products_count }})--}}
                                        </p>
                                        </a>
                                        <ul class="nav flex-column">
                                            @foreach($category->childCategories->take(8) as $childCategory)
                                            <li class="nav-item">
                                                <a class="nav-link fs-7 text-dark " aria-current="page" href="{{ route('category', [$parentCategory, $category, $childCategory->slug]) }}">{{$childCategory->name}}
{{--                                                    ({{ $childCategory->products_count }})--}}
                                                </a>
                                                @foreach($childCategory->childCategories as $lastCategory)
                                                    <a href="{{ route('category',
                                                    [$parentCategory, $category, $childCategory->slug,$lastCategory->slug])}}">{{$lastCategory->name}}</a>
                                                @endforeach
                                            </li>
                                            @endforeach
                                        </ul>
                                        <a href="#" class="text-decoration-underline text-primary fs-7 ps-3">Բոլորը</a>
                                    </div>
                                    @endforeach
                                        <div class="col-3">
                                            @if(count($collections))
                                            <p class="fw-bold fs-7 text-dark ps-3 mb-2">Հավաքածուներ</p>
                                            @endif
                                            <ul class="nav flex-column">
                                                @foreach($collections as $collection)
                                                <li class="nav-item">
                                                    <a class="nav-link fs-7 text-dark active" aria-current="page"
                                                       href="{{route('collection.details',[ 'url'=>$collection->url])}}">{{$collection->title}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <a href="#" class="text-decoration-underline text-primary fs-7 ps-3">Բոլորը</a>
                                        </div>
                                    <div class="col-3">
                                        <div class="banner mb-3">
                                            <a href="{{$parentCategory->image_url}}">
                                            <img src="{{asset('images/category')}}/{{$parentCategory->image}}" class="w-100" alt="">
                                            </a>
                                        </div>
                                        <div class="banner">
                                            <a href="{{$parentCategory->image_second_url}}">
                                            <img src="{{asset('images/category')}}/{{$parentCategory->image_second}}" class="w-100" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>
        @if($headerPages)
            @foreach($headerPages as $headerPage)

                <li class="nav-item">
                    <a class="nav-link ps-0 pe-2 fs-7 text-reset py-3 @if(Request::getPathInfo() == '/'.$headerPage->url) cat-active @endif" href="{{$headerPage->route}}">
{{--                        @if($headerPage->image)--}}
{{--                        <img src="{{asset('images/pages/')}}/{{$headerPage->image}}" alt="" class="me-2">--}}
{{--                        @endif--}}
                    {{$headerPage->title ?? null}}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
