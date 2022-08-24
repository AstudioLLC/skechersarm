
<div>
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateCity">
        <div class="row">
            <div class="col-md-7">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Title"/>
                    <third-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="thirdtabToggle01" name="third-tabs" value="1" checked />
                        <label class="thirdtabToggle01 intro" for="thirdtabToggle01" checked="checked">English</label>
                        <input type="radio" id="thirdtabToggle02" name="third-tabs" value="2" />
                        <label class="thirdtabToggle02" for="thirdtabToggle02">Armenian</label>
                        <input type="radio" id="thirdtabToggle03" name="third-tabs" value="3" />
                        <label class="thirdtabToggle03" for="thirdtabToggle03">Russian</label>
                        <third-tab-content>
                            <input type="text" name="title.en"  class="form-control  @error('title.en') form-control-alternative is-invalid @enderror title-en" id="en2" wire:model.defer="title.en" placeholder="Enter English Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" title="title.hy" class="form-control @error('title.hy') form-control-alternative is-invalid @enderror title-hy" id="hy2" wire:model.defer="title.hy" placeholder="Enter Armenian Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" title="title.ru" class="form-control @error('title.ru') form-control-alternative is-invalid @enderror title-ru" id="ru2" wire:model.defer="title.ru" placeholder="Enter Russian Title">
                        </third-tab-content>

                    </third-tab-container>
                    @error('title.en') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-5 d-grid align-content-around">
                <livewire:admin.supports.form-title name="Price"/>
                <input type="text" class="form-control @error('price') form-control-alternative is-invalid @enderror" wire:model.defer="price">
                @error('price') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">
            Save
        </button>
    </form>



</div>
@push('js')
    <script>
        CKEDITOR.replace('desc_en');
        CKEDITOR.instances.desc_en.on('change', function() {
        @this.set('description.en', this.getData());
        });
        CKEDITOR.replace('desc_hy');
        CKEDITOR.instances.desc_hy.on('change', function() {
        @this.set('description.hy', this.getData());
        });
        CKEDITOR.replace('desc_ru');
        CKEDITOR.instances.desc_ru.on('change', function() {
        @this.set('description.ru', this.getData());
        });
    </script>
@endpush


