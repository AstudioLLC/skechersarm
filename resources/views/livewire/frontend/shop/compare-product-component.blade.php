<div>
    <main>
        <div class="container">
            <div class="bredcrump my-4">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-reset text-decoration-none">Գլխավոր</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Աջակցություն</li>
                    </ol>
                </nav>
            </div>
            @if(Cart::instance('compare')->count() > 0)

            <h2 class="h3 mb-4 d-inline-block pb-3 border-bottom border-dark">Համեմատել</h2>
            <div class="swiper swiper-height compare-swiper mt-3 py-3 ps-0 pe-3">
                <div class="swiper-wrapper px-3">

                    @foreach(Cart::instance('compare')->content() as $item)

                    <div class="swiper-slide m-0">
                        <div class="card rounded-0 position-relative">
                            <div class="position-absolute top-0 end-0 mt-2 me-2">
                                <a href="#" wire:click.prevent="removeFromCompare('{{$item->id}}')">
                                    <img src="{{asset('frontend/images/icons/trash-btn.svg')}}" alt="">
                                </a>

                            </div>
                            <img src="{{asset('images/products')}}/{{$item->model->image}}" class="card-img-top rounded-0" alt="">
                            <div class="card-body p-0">
                                <div class="product-copmare-info p-2">
                                    <span>Չափը</span>
                                    <span>{{$item->model->size ?? null}}</span>
                                </div>
                                <div class="product-copmare-info p-2">
                                    <span>Գույն</span>
                                    <span>Կարմիր</span>
                                </div>
                                <div class="product-copmare-info p-2">
                                    <span>Տեքստիլ</span>
                                    <span>Բամբակ</span>
                                </div>
                                <div class="product-copmare-info p-2">
                                    <span>Երկարություն</span>
                                    <span>32 մմ.</span>
                                </div>
                                <div class="product-copmare-info p-2">
                                    <span>Սեզոն</span>
                                    <span>Ամառային</span>
                                </div>
                                <div class="product-copmare-info p-2">
                                    <span>Քաշ</span>
                                    <span>500գ.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            @else

                <h2 style="color: red;">Համեմատության դաշտը դատարկ է</h2>
                <a href="/" class="btn btn-success" style="margin-top: 20px;">Կատարել գնումներ</a>
            @endif
        </div>
    </main>
</div>
