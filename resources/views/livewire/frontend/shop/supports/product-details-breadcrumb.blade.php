<div class="container py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">Գլխավոր</a></li>
                @foreach($item->categories as $category)
{{--                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">{{$category->parentCategory->parentCategory->parentCategory->name ?? null}}</a></li>--}}

                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">{{$category->parentCategory->parentCategory->name ?? null}}</a></li>
                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">{{$category->parentCategory->name ?? null}}</a></li>
                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">{{$category->name ?? null}}</a></li>
                @endforeach
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{$item->name}}</li>
            </ol>
        </nav>
</div>
