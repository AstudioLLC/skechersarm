<div>
    <article class="product-card">
        <div class="product-card__promotion">
            <span>{{ $product->id }}</span>
        </div>

        <div class="product-card__footer">
            <a href="{{ route('admin.products') }}" class="product-card__button">See All Products</a>
        </div>
    </article>

    <div class="slide-card-body">
        <div class="row">
            @if($product->image)
            <div class="col-md-2">
                <img src="{{asset('images/products')}}/{{$product->image}}" alt="{{$product->id}}" class="show-image pb-3" >
            </div>
            @endif
            <div class="@if($product->image) col-md-10 @else col-12 @endif">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Disc.</th>
                                    <th scope="col">Disc.Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Is NEW</th>
                                    <th scope="col">TOP Seller</th>
                                    <th scope="col">1C Article</th>
                                    <th scope="col">Barcode</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">Brand</th>

                                </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <th scope="row">
                                            {{$product->id ?? null}}
                                        </th>
                                        <td>
                                            {{$product->name ?? null}}
                                        </td>
                                        <td>
                                            {{$product->price ?? null}}
                                        </td>
                                        <td>
                                            {{$product->sale_percent ?? null}}
                                        </td>
                                        <td>
                                            {{$product->sale_price ?? null}}
                                        </td>
                                        <td>
                                            {{$product->stock_status ?? null}}
                                        </td>
                                        <td>
                                            {{$product->quantity ?? null}}
                                        </td>
                                        <td>
                                            {{$product->is_new ?? null}}
                                        </td>
                                        <td>
                                            {{$product->top_seller ?? null}}
                                        </td>
                                        <td>
                                            {{$product->aritcle_1c ?? null}}
                                        </td>
                                        <td>
                                            {{$product->barcode ?? null}}
                                        </td>
                                        <td>
                                            {{$product->lable ?? null}}
                                        </td>
                                        <td>
                                            {{$product->brand->title ?? null}}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            {!! $product->description ?? null !!}
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <h5 class="text-center mt-4 mb-4">Gallery</h5>
        @foreach($product->gallery as $gallery)
            <div class="col-3">
                <img src="{{asset('images/gallery')}}/{{$gallery->image}}" alt="{{$product->name}}" class="img-fluid"/>
            </div>
        @endforeach
    </div>
</div>

