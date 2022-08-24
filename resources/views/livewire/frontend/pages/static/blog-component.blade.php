<main>
    <!-- Breadcrumb -->
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{$title ?? null}}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="main-title justify-content-start my-1">
            <h1 class="fs-4">{{$title ?? null}}</h1>
        </div>
        <div class="row blog">
            @forelse($items as $item)
            <div class="col-6 mb-3 col-md-4 col-lg-3">
                <a href="{{route('blog.details',['url' => $item->url])}}" class="text-decoration-none text-reset">
                    <div class="card border-0">
                        <img src="{{asset('images/blogs')}}/{{$item->sec_image}}" class="card-img-top" alt="">
                        <div class="card-body ps-0">
                            <h2 class="card-title fw-bold text-limit-2 fs-6">{{$item->title}}</h2>
                            <span class="fs-7">{{date_format($item->created_at, 'd.m.Y')}}</span>
                            <p class="card-text mt-2 text-limit-2 text-muted fs-7">{{$item->short}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @empty
                <span>No Blogs</span>
            @endforelse
        </div>
    </div>
</main>
