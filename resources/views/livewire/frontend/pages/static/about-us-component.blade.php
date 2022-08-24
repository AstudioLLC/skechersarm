<div>
    <main>
        <div class="container">
            <div class="bredcrump my-4">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-reset text-decoration-none">Գլխավոր</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title ?? null}}</li>
                    </ol>
                </nav>
            </div>
            <div class="title d-flex flex-column w-100 mb-3">
                <h2 class="text-left">{{$item->title ?? null}}</h2>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <img src="{{asset('frontend/images/ezgif.com-gif-maker.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-12">
                    {!! $item->content ?? null !!}
                </div>
            </div>
        </div>
    </main>
</div>
