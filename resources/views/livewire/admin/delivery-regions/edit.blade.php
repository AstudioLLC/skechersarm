@if($this->saved == false)

    <div>
        <div wire:ignore.self>
            @if($errors->any())
                <div class="alert alert-dark" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateRegion">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group has-danger" wire:ignore>
                        <livewire:admin.supports.form-title name="Title"/>
                        <tab-container >
                            <!-- TAB CONTROLS -->
                            <input type="radio" id="tabToggle01" name="tabs" value="1" checked />
                            <label class="tabToggle01 intro" for="tabToggle01" checked="checked">English</label>
                            <input type="radio" id="tabToggle02" name="tabs" value="2" />
                            <label class="tabToggle02" for="tabToggle02">Armenian</label>
                            <input type="radio" id="tabToggle03" name="tabs" value="3" />
                            <label class="tabToggle03" for="tabToggle03">Russian</label>
                            <tab-content>
                                <input type="text" class="form-control title-en" id="en" wire:model.defer="title.en" placeholder="Enter English Title">
                            </tab-content>
                            <tab-content>
                                <input type="text" class="form-control title-hy" id="hy" wire:model.defer="title.hy"  placeholder="Enter Armenian Title">
                            </tab-content>
                            <tab-content>
                                <input type="text" class="form-control title-ru" id="ru" wire:model.defer="title.ru" placeholder="Enter Russian Title">
                            </tab-content>

                        </tab-container>
                        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
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


@else
    <livewire:admin.delivery-regions.delivery-region-component />
@endif
