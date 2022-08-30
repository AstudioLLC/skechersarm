<div>
    <main>
        <div class="container">
            <div class="bredcrump my-4">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-reset text-decoration-none">{{__('frontend.cart.Home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title ?? null}}</li>
                    </ol>
                </nav>
            </div>
            <h2 class="d-inline-block border-bottom border-dark pb-2">{{$title ?? null}}</h2>
            @forelse($items as $key => $item)
            <div class="quetion">
                <button class="btn text-decoration-underline" type="button" data-bs-toggle="collapse" data-bs-target="#quetionId{{$key}}" aria-expanded="false" aria-controls="quetionId1">
                    <h6>{{$item->question ?? null}}</h6>
                </button>
                <div class="collapse" id="quetionId{{$key}}">
                    <div class="card card-body border-0 border-bottom">
                        {{$item->answer ?? null}}
                    </div>
                </div>
            </div>
            @empty
                <span>No items </span>
            @endforelse
        </div>
    </main>
</div>
