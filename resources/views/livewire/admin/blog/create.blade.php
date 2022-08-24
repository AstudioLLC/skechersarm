
    <div>
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateBlog">
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
                            <input type="text" title="title.hy" wire:keyup="generateSlug" class="form-control @error('title.hy') form-control-alternative is-invalid @enderror title-hy" id="hy2" wire:model.defer="title.hy" placeholder="Enter Armenian Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" title="title.ru" class="form-control @error('title.ru') form-control-alternative is-invalid @enderror title-ru" id="ru2" wire:model.defer="title.ru" placeholder="Enter Russian Title">
                        </third-tab-content>

                    </third-tab-container>
                    @error('title.en') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-5 d-grid align-content-around">
                <livewire:admin.supports.form-title name="Url"/>
                <input type="text" class="form-control @error('url') form-control-alternative is-invalid @enderror" wire:model.defer="url">
                @error('url') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group has-danger">
            <livewire:admin.supports.form-title name="Description"/>
            <tab-container wire:ignore>
                <!-- TAB CONTROLS -->
                <input type="radio" id="tabToggle01" name="tabs" value="1" checked /><label class="tabToggle01 intro" for="tabToggle01" checked="checked">English</label>
                <input type="radio" id="tabToggle02" name="tabs" value="2" /><label class="tabToggle02" for="tabToggle02">Armenian</label>
                <input type="radio" id="tabToggle03" name="tabs" value="3" /><label class="tabToggle03" for="tabToggle03">Russian</label>
                <tab-content>
                    <textarea type="text" name="description.en" class="form-control description-en" id="desc_en" wire:model.defer="description.en" placeholder="Enter English Description"></textarea>
                </tab-content>
                <tab-content>
                    <textarea type="text" name="description.hy" class="form-control description-hy" id="desc_hy" wire:model.defer="description.hy" placeholder="Enter Armenian Description"></textarea>
                </tab-content>
                <tab-content>
                    <textarea type="text" name="description.ru" class="form-control description-ru" id="desc_ru" wire:model.defer="description.ru" placeholder="Enter Russian Description"></textarea>
                </tab-content>


            </tab-container>
            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-2">
            <div class="form-group ">
                <livewire:admin.supports.form-title name="Show home"/>
                <div class="form-check form-switch active-toggle">
                    <input class="form-check-input " wire:model.lazy="to_home" type="checkbox" role="switch" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Image"/>
                    <div class="custom-file">
                        <div x-data="{ isUploading: false, progress: 1 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = true; progress = 100" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <input wire:model.defer="image" type="file" class="custom-file-input" id="customFile">
                            <div x-show.transition="isUploading" class="progress progress mt-2 rounded" >
                                <div class="progress-bar bg-primary progress-bar-striped"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`" >
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>

                        <label class="custom-file-label" for="customFile">
                            @if ($image)
                                {{ $image->getClientOriginalName() }}
                            @endif
                        </label>
                    </div>

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="img d-block mt-2 w-100 rounded uploading-image">
                    @else
                        <img src="{{ $state['avatar_url'] ?? '' }}" class="img d-block mb-2 w-100 rounded">
                    @endif
                </div>

            </div>
{{--            <div class="col-md-6">--}}
{{--                <div class="form-group ">--}}
{{--                    <livewire:admin.supports.form-title name="Second Image"/>--}}
{{--                    <div class="custom-file">--}}
{{--                        <div x-data="{ isUploading: false, progress: 1 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = true; progress = 100" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">--}}
{{--                            <input wire:model.defer="sec_image" type="file" class="custom-file-input" id="customFile">--}}
{{--                            <div x-show.transition="isUploading" class="progress progress mt-2 rounded" >--}}
{{--                                <div class="progress-bar bg-primary progress-bar-striped"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`" >--}}
{{--                                    <span class="sr-only">40% Complete (success)</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <label class="custom-file-label" for="customFile">--}}
{{--                            @if ($sec_image)--}}
{{--                                {{ $sec_image->getClientOriginalName() }}--}}
{{--                            @endif--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    @if ($sec_image)--}}
{{--                        <img src="{{ $sec_image->temporaryUrl() }}" class="img d-block mt-2  rounded uploading-image">--}}
{{--                    @else--}}
{{--                        <img src="{{ $state['avatar_url'] ?? '' }}" class="img d-block mb-2 w-100 rounded">--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="col-4">
            <div class="form-group has-danger" wire:ignore>
                <livewire:admin.supports.form-title name="Seo Title"/>
                <sec-tab-container >
                    <!-- TAB CONTROLS -->
                    <input type="radio" id="sectabToggle01" name="sec-tabs" value="1" checked />
                    <label class="sectabToggle01 intro" for="sectabToggle01" checked="checked">English</label>
                    <input type="radio" id="sectabToggle02" name="sec-tabs" value="2" />
                    <label class="sectabToggle02" for="sectabToggle02">Armenian</label>
                    <input type="radio" id="sectabToggle03" name="sec-tabs" value="3" />
                    <label class="sectabToggle03" for="sectabToggle03">Russian</label>
                    <sec-tab-content>
                        <input type="text" name="seo_title.en"   class="form-control  @error('seo_title.en') form-control-alternative is-invalid @enderror name-en" id="en3" wire:model.defer="seo_title.en" placeholder="Enter English Seo Title">
                    </sec-tab-content>
                    <sec-tab-content>
                        <input type="text" name="seo_title.hy" class="form-control @error('seo_title.hy') form-control-alternative is-invalid @enderror name-hy" id="hy3" wire:model.defer="seo_title.hy" placeholder="Enter Armenian Seo Title">
                    </sec-tab-content>
                    <sec-tab-content>
                        <input type="text" name="seo_title.ru" class="form-control @error('seo_title.ru') form-control-alternative is-invalid @enderror name-ru" id="ru3" wire:model.defer="seo_title.ru" placeholder="Enter Russian Seo Title">
                    </sec-tab-content>

                </sec-tab-container>
                @error('seo_title.en') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group has-danger" wire:ignore>
                <livewire:admin.supports.form-title name="Seo Description"/>
                <four-tab-container >
                    <!-- TAB CONTROLS -->
                    <input type="radio" id="fourtabToggle01" name="four-tabs" value="1" checked />
                    <label class="fourtabToggle01 intro" for="fourtabToggle01" checked="checked">English</label>
                    <input type="radio" id="fourtabToggle02" name="four-tabs" value="2" />
                    <label class="fourtabToggle02" for="fourtabToggle02">Armenian</label>
                    <input type="radio" id="fourtabToggle03" name="four-tabs" value="3" />
                    <label class="fourtabToggle03" for="fourtabToggle03">Russian</label>
                    <four-tab-content>
                        <input type="text" name="seo_description.en"   class="form-control  @error('seo_description.en') form-control-alternative is-invalid @enderror name-en" id="en4" wire:model.defer="seo_description.en" placeholder="Enter English Seo Description">
                    </four-tab-content>
                    <four-tab-content>
                        <input type="text" name="seo_description.hy" class="form-control @error('seo_description.hy') form-control-alternative is-invalid @enderror name-hy" id="hy4" wire:model.defer="seo_description.hy" placeholder="Enter Armenian Seo Description">
                    </four-tab-content>
                    <four-tab-content>
                        <input type="text" name="seo_description.ru" class="form-control @error('seo_description.ru') form-control-alternative is-invalid @enderror name-ru" id="ru4" wire:model.defer="seo_description.ru" placeholder="Enter Russian Seo Description">
                    </four-tab-content>

                </four-tab-container>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group has-danger">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Seo Keywords"/>
                    <five-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="fivetabToggle01" name="five-tabs" value="1" checked />
                        <label class="fivetabToggle01 intro" for="fivetabToggle01" checked="checked">English</label>
                        <input type="radio" id="fivetabToggle02" name="five-tabs" value="2" />
                        <label class="fivetabToggle02" for="fivetabToggle02">Armenian</label>
                        <input type="radio" id="fivetabToggle03" name="five-tabs" value="3" />
                        <label class="fivetabToggle03" for="fivetabToggle03">Russian</label>
                        <five-tab-content>
                            <input type="text" name="seo_keywords.en"   class="form-control  @error('seo_keywords.en') form-control-alternative is-invalid @enderror name-en" id="en4" wire:model.defer="seo_keywords.en" placeholder="Enter English Seo Keywords">
                        </five-tab-content>
                        <five-tab-content>
                            <input type="text" name="seo_keywords.hy" class="form-control @error('seo_keywords.hy') form-control-alternative is-invalid @enderror name-hy" id="hy4" wire:model.defer="seo_keywords.hy" placeholder="Enter Armenian Seo Keywords">
                        </five-tab-content>
                        <five-tab-content>
                            <input type="text" name="seo_keywords.ru" class="form-control @error('seo_keywords.ru') form-control-alternative is-invalid @enderror name-ru" id="ru4" wire:model.defer="seo_keywords.ru" placeholder="Enter Russian Seo Keywords">
                        </five-tab-content>

                    </five-tab-container>
                </div>
                @error('seo_keywords') <span class="text-danger">{{ $message }}</span>@enderror
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


