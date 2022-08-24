<main>
    <!-- Breadcrumb -->
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">Բլոգ</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{$item->title}}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="main-title justify-content-start my-3">
            <h2 class="fs-4 ps-0">{{$item->title}}</h2>
        </div>
        <div class="py-2">
            <span class="fs-7 text-primary">{{date_format($item->created_at, 'd.m.Y')}}</span>
        </div>
        <div class="row m-0 mb-4">
            <div class="col-12 p-0">
                <img src="{{asset('images/blogs')}}/{{$item->image}}" class="img-fluid" alt="{{$item->title}}">
            </div>
        </div>
        <div class="row m-0">
            <div class="col-12 p-0 fs-6">
                {!! $item->description !!}
            </div>
        </div>
        <div class="main-title justify-content-start my-3">
            @if(count($item->gallery))
            <h2 class="fs-4">Պատկերասրահ</h2>
            @endif
        </div>
        @if($item->gallery)
            <div class="row">
                @foreach($item->gallery as $gallery)
                    <a href="{{asset('images/gallery')}}/{{$gallery->image}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-6 col-sm-4 col-md-3 col-lg-2 mb-2 px-1">
                        <img src="{{asset('images/gallery')}}/{{$gallery->image}}" class="img-fluid">
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</main>
