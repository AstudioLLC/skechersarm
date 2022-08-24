<div>

    @if (!empty($items))
        <div class="gallery-section" id="gallery-section" >

            <div class="row">
                @foreach ($items as $gallery)
                    <div class="col-3 card mb-1">
                        <a href="{{asset('images/gallery')}}/{{$gallery->image}}" data-fancybox="group" data-caption="Gallery for About Us">
                            <img class="fancybox-img" src="{{asset('images/gallery')}}/{{$gallery->image}}" />
                        </a>
                        <button class="btn btn-outline-danger gallery-delete" wire:click.prevent="deleteGallery({{$gallery->id}})">Delete</button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <form wire:submit.prevent="addGallery" class="mt-4">
        @if ($images)
            Photo Preview:
            <div class="row">
                @foreach ($images as $img)
                    <div class="col-3 card me-1 mb-1 d-flex">
                        <img src="{{ $img->temporaryUrl() }}">
                    </div>
                @endforeach
            </div>
        @endif
        <div class="mb-3">
            <livewire:admin.supports.form-title name="Upload Gallery"/>
            <input type="file" class="form-control" wire:model="images" multiple>
            <div wire:loading wire:target="images">Uploading...</div>
            @error('images.*') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Image</button>
        <div wire:loading wire:target="save">process...</div>
    </form>

</div>
