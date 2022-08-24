<div>

    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="store">

        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Button"/>
                    <sec-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="sectabToggle01" name="sec-tabs" value="1" checked />
                        <label class="sectabToggle01 intro" for="sectabToggle01" checked="checked">English</label>
                        <input type="radio" id="sectabToggle02" name="sec-tabs" value="2" />
                        <label class="sectabToggle02" for="sectabToggle02">Armenian</label>
                        <input type="radio" id="sectabToggle03" name="sec-tabs" value="3" />
                        <label class="sectabToggle03" for="sectabToggle03">Russian</label>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('button.en') form-control-alternative is-invalid @enderror button-en" id="en" wire:model.defer="button.en" placeholder="Enter English Title">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('button.hy') form-control-alternative is-invalid @enderror button-hy" id="hy" wire:model.defer="button.hy" placeholder="Enter Armenian Title">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('button.ru') form-control-alternative is-invalid @enderror button-ru" id="ru" wire:model.defer="button.ru" placeholder="Enter Russian Title">
                        </sec-tab-content>

                    </sec-tab-container>
                    @error('button') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-6">
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
                            <input type="text" name="title.en" class="form-control @error('title.en') form-control-alternative is-invalid @enderror title-en" id="en2" wire:model.defer="title.en" placeholder="Enter English Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" name="title.hy" class="form-control @error('title.hy') form-control-alternative is-invalid @enderror title-hy" id="hy2" wire:model.defer="title.hy" placeholder="Enter Armenian Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" name="title.ru" class="form-control @error('title.ru') form-control-alternative is-invalid @enderror title-ru" id="ru2" wire:model.defer="title.ru" placeholder="Enter Russian Title">
                        </third-tab-content>

                    </third-tab-container>
                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                </div>


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
                    <textarea type="text" name="description.en" class="form-control description-en" id="en" wire:model.defer="description.en" placeholder="Enter English Description"></textarea>
                </tab-content>
                <tab-content>
                    <textarea type="text" name="description.hy" class="form-control description-hy" id="hy" wire:model.defer="description.hy" placeholder="Enter Armenian Description"></textarea>
                </tab-content>
                <tab-content>
                    <textarea type="text" name="description.ru" class="form-control description-ru" id="ru" wire:model.defer="description.ru" placeholder="Enter Russian Description"></textarea>
                </tab-content>


            </tab-container>
            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
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
        <div class="col-6">
            <div class="form-group has-danger">
                <livewire:admin.supports.form-title name="Url"/>
                <input type="text" class="form-control @error('url') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Url" wire:model.defer="url">
                @error('url') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
        <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">
            Save
        </button>

    </form>




