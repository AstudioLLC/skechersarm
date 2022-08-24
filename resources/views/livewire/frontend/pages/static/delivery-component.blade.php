<main>
    <!-- Breadcrumb -->
    <div class="container py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{ $page->title }}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="main-title justify-content-start my-3">
            <h2 class="fs-4">{{ $page->title }}</h2>
        </div>
        <div class="row m-0 mb-4">
            <div class="col-12 p-0">
                <img src="{{asset('images/pages/'.$page->image)}}" class="w-100" alt="">
            </div>
        </div>
        <div class="row m-0">
            <div class="col-12 p-0 fs-6">
                {!! $page->content !!}
            </div>
        </div>
        @if($page->gallery)
            <div class="main-title justify-content-start my-3">
                <h2 class="fs-4">Պատկերասրահ</h2>
            </div>
            <div class="row">
                @foreach($page->gallery as $gallery)
                <a href="{{asset('images/gallery/').'/'.$gallery->image}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-6 col-sm-4 col-md-3 col-lg-2 mb-2 px-1">
                    <img src="{{asset('images/gallery/').'/'.$gallery->image}}" class="img-fluid">
                </a>
                @endforeach
            </div>
        @endif
    </div>
</main>

