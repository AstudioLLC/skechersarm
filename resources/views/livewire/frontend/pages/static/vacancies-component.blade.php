<main>
    <!-- Breadcrumb -->
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">Աշխատանք</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="main-title justify-content-start my-3">
            <h2 class="fs-4 p-0">Աշխատանք</h2>
        </div>
        @forelse($items as $item)
        <div class="row mb-3 w-100 m-0">
            <div class="col-12 border border-dark rounded-2 p-3 border-opacity-10">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-primary">{{$item->title ?? null}}</h5>
                    <a href="{{route('vacancy.details',['id' => $item->id])}}" class="btn btn-primary px-4 fs-7 rounded-1">Դիմել</a>
                </div>
                <hr style="border-top: 2px dashed #c1c1c1;">
                <div class="row gap-4 mb-3">
                    <div class="col-auto">
                        <span>Աշխատանքային գրաֆիկ</span>
                        <p class="m-0 fw-bold text-primary">{{$item->schedule ?? null}}</p>
                    </div>
                    <div class="col-auto">
                        <span>Աշխատանքային Ժամեր</span>
                        <p class="m-0 fw-bold text-primary">{{$item->hours ?? null}}</p>
                    </div>
                    <div class="col-auto">
                        <span>Աշխատավարձ</span>
                        <p class="m-0 fw-bold text-primary">{{$item->salary ?? null}}</p>
                    </div>
                    <div class="col-auto">
                        <span>Քաղաք</span>
                        <p class="m-0 fw-bold text-primary">{{$item->city ?? null}}</p>
                    </div>
                    <div class="col-auto">
                        <span>Վերջնաժամկետ</span>
                        <p class="m-0 fw-bold text-primary">{{$item->deadline ?? null}}</p>
                    </div>
                </div>
                {{$item->description}}
            </div>
        </div>
        @empty
            <p>No Vacancies available</p>
        @endforelse
    </div>
</main>
