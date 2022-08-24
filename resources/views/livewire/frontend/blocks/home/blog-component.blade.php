<div class="main-title justify-content-start justify-content-lg-center my-3">
    @if(count($items))
    <h2>Բլոգ</h2>
    @endif
</div>
<div class="row ">
    @foreach($items as $item)
    <div class="col-6 mb-3 col-md-4 col-lg-3">
        <a href="{{route('blog.details',['url' => $item->url])}}" class="text-decoration-none text-reset">
            <div class="card border-0">
                <img src="{{asset('images/blogs')}}/{{$item->sec_image}}" class="card-img-top" alt="">
                <div class="card-body ps-0">
                    <h2 class="card-title fw-bold text-limit-2 fs-6">{{$item->title}}</h2>
                    <span class="fs-7">{{date_format($item->created_at, 'Y-m-d')}}</span>
                    <p class="card-text mt-2 text-limit-2 text-muted fs-7">{{$item->short}}</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
