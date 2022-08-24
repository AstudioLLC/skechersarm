@extends('layouts.base')

@section('content')
{{--    <div class="row mt-4">--}}
{{--        @foreach($products as $product)--}}
{{--            <div class="col-lg-4 col-md-6 mb-4">--}}
{{--                <div class="card " style="width: 350px;">--}}
{{--                    <a--}}
{{--                        href="{{ route('product', ['slug' => $product->slug]) }}"--}}
{{--                    >--}}
{{--                        <img src="{{asset('images/products')}}/{{$product->image}}" alt="" style="width: 300px; height: 300px; object-fit: contain">--}}
{{--                    </a>--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title">--}}
{{--                            <a--}}
{{--                                href="{{ route('product', ['slug' => $product->slug]) }}"--}}
{{--                            >--}}
{{--                                {{ $product->name }}--}}
{{--                            </a>--}}
{{--                        </h4>--}}
{{--                        <h5>${{ $product->price }}</h5>--}}
{{--                        <p class="card-text">{{ Str::limit($product->description, 75) }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}

{{--    </div>--}}
{{--    @if(get_class($products) == 'Illuminate\Pagination\LengthAwarePaginator')--}}
{{--        <div class="d-flex justify-content-center">--}}
{{--            {{ $products->links() ?? '' }}--}}
{{--        </div>--}}
{{--    @endif--}}

    <livewire:frontend.shop.shop-component :products="$products" :selectedCategories="$selectedCategories"/>
@endsection
