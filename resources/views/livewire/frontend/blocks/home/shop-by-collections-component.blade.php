@foreach($items as $item)
        <div class="col-12 col-lg-6 mb-2">
            <a @if($item->url) href="{{ url($item->url ?? null)}} "@endif>
                <img src="{{asset('images/homeBanners/')}}/{{$item->image ?? null}}" class="w-100" alt="">
            </a>
        </div>
@endforeach


