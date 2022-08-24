<main>
    <div class="container" wire:ignore>

    @if($headerSlides)
        <livewire:frontend.blocks.home.header-slider-component :items="$headerSlides"/>
    @endif
{{--    @if($shopByCollections)--}}
{{--        <livewire:frontend.blocks.home.shop-by-collections-component :items="$shopByCollections"/>--}}
{{--    @endif--}}
    @if($newProducts)
        <livewire:frontend.blocks.home.new-products-component :items="$newProducts"/>
    @endif
        @if(count($newsBanner) && count($newsBanner2))
        <div class="baners mt-4">
            <div class="row">
            <livewire:frontend.blocks.home.shop-by-collections-component :items="$newsBanner" />
            <livewire:frontend.blocks.home.shop-by-collections-news-component :items="$newsBanner2" />
            </div>
        </div>
        @endif
    @if($discountedProducts)
        <livewire:frontend.blocks.home.discounted-products-component :items="$discountedProducts"/>
    @endif
        @if(count($discountsBanner))
            <livewire:frontend.blocks.home.shop-by-collections-discount-component :items="$discountsBanner"/>
        @endif
    @if($blogs)
        <livewire:frontend.blocks.home.blog-component :items="$blogs"/>
    @endif
{{--    @if($homeCategories)--}}
{{--        <livewire:frontend.blocks.home.shop-by-category-component :items="$homeCategories"/>--}}
{{--    @endif--}}
{{--    @if($topSellers)--}}
{{--        <livewire:frontend.blocks.home.top-seller-component :items="$topSellers"/>--}}
{{--    @endif--}}

{{--    @if($brands)--}}
{{--        <livewire:frontend.blocks.home.brands-component :items="$brands"/>--}}
{{--    @endif--}}
    </div>

</main>
