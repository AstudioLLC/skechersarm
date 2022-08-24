@foreach($items as $item)
    <div class="baners mt-4">
        <div class="row">
            <div class="col-12  mb-2">
                <a @if($item->url) href="{{ url($item->url ?? null)}} "@endif>
                    <img src="{{asset('images/homeBanners/')}}/{{$item->image ?? null}}" alt="" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
@endforeach
