<div>
    @if($errors->any())
        <h1>{{$errors}}</h1>
    @endif
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="store">
        <div class="row">
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
                            <input type="text" name="name.en"   class="form-control  @error('name.en') form-control-alternative is-invalid @enderror name-en" id="en2" wire:model.defer="name.en" placeholder="Enter English Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" name="name.hy" wire:keyup="generateSlug" class="form-control @error('name.hy') form-control-alternative is-invalid @enderror name-hy" id="hy2" wire:model.defer="name.hy" placeholder="Enter Armenian Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" name="name.ru" class="form-control @error('name.ru') form-control-alternative is-invalid @enderror name-ru" id="ru2" wire:model.defer="name.ru" placeholder="Enter Russian Title">
                        </third-tab-content>

                    </third-tab-container>
                    @error('name.en') <span class="text-danger">{{ $message }}</span>@enderror
                </div>


            </div>
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Url"/>
                    <input style="margin-top: 59px;" type="text" class="form-control @error('url') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Url" wire:model="url">
                    @error('url') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>




{{--        <div class="form-group has-danger">--}}
{{--            <livewire:admin.supports.form-title name="Description"/>--}}
{{--            <tab-container wire:ignore>--}}
{{--                <!-- TAB CONTROLS -->--}}
{{--                <input type="radio" id="tabToggle01" name="tabs" value="1" checked /><label class="tabToggle01 intro" for="tabToggle01" checked="checked">English</label>--}}
{{--                <input type="radio" id="tabToggle02" name="tabs" value="2" /><label class="tabToggle02" for="tabToggle02">Armenian</label>--}}
{{--                <input type="radio" id="tabToggle03" name="tabs" value="3" /><label class="tabToggle03" for="tabToggle03">Russian</label>--}}
{{--                <tab-content>--}}
{{--                    <textarea type="text" name="description.en" class="form-control description-en" id="desc_en" wire:model.defer="description.en" placeholder="Enter English Description"></textarea>--}}
{{--                </tab-content>--}}
{{--                <tab-content>--}}
{{--                    <textarea type="text" name="description.hy" class="form-control description-hy" id="desc_hy" wire:model.defer="description.hy" placeholder="Enter Armenian Description"></textarea>--}}
{{--                </tab-content>--}}
{{--                <tab-content>--}}
{{--                    <textarea type="text" name="description.ru" class="form-control description-ru" id="desc_ru" wire:model.defer="description.ru" placeholder="Enter Russian Description"></textarea>--}}
{{--                </tab-content>--}}


{{--            </tab-container>--}}
{{--            @error('description') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--        </div>--}}
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
                    <div class="col-6">
                        <div class="form-group has-danger">
                            <livewire:admin.supports.form-title name="Image Url"/>
                            <input style="margin-top: 59px;" type="text" class="form-control @error('image_url') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Url" wire:model="image_url">
                            @error('image_url') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Image Second"/>
                    <div class="custom-file">
                        <div x-data="{ isUploading: false, progress: 1 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = true; progress = 100" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <input wire:model.defer="image_second" type="file" class="custom-file-input" id="customFile">
                            <div x-show.transition="isUploading" class="progress progress mt-2 rounded" >
                                <div class="progress-bar bg-primary progress-bar-striped"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`" >
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>

                        <label class="custom-file-label" for="customFile">
                            @if ($image_second)
                                {{ $image_second->getClientOriginalName() }}
                            @endif
                        </label>
                    </div>

                    @if ($image_second)
                        <img src="{{ $image_second->temporaryUrl() }}" class="img d-block mt-2 w-100 rounded uploading-image">
                    @else
                        <img src="{{ $state['avatar_url'] ?? '' }}" class="img d-block mb-2 w-100 rounded">
                    @endif
                    <div class="col-6">
                        <div class="form-group has-danger">
                            <livewire:admin.supports.form-title name="Image Second Url"/>
                            <input style="margin-top: 59px;" type="text" class="form-control @error('image_second_url') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Url" wire:model="image_second_url">
                            @error('image_second_url') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="selectedParent" class="col-md124 col-form-label text-md-right">Parent Category</label>
                                <select wire:model="selectedParent" class="form-control">
                                    <option value="" selected>Choose Parent Category</option>
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    @if (!is_null($selectedParent))
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parent" class="col-md-12 col-form-label text-md-right">SubCategory</label>
                                    <select class="form-control" wire:model="parent">
                                        <option value="" selected>Choose SubCategory</option>
                                        @foreach($childrens as $child)
                                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    @endif
                    @if (!is_null($parent))
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="child" class="col-md-12 col-form-label text-md-right">Last Category</label>
                                <select class="form-control" wire:model="lastChild">
                                    <option value="" selected>Choose SubCategory</option>
                                    @foreach($lastChildrens as $lastChild)
                                        <option value="{{ $lastChild->id }}">{{ $lastChild->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif


                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <livewire:admin.supports.form-title name="To Catalog"/>
                        <div class="form-check form-switch active-toggle" wire:ignore>
                            <input class="form-check-input " wire:model.lazy="to_catalog" type="checkbox" role="switch" checked value="">
{{--                             @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'to_catalog'], key($item->id))--}}
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <livewire:admin.supports.form-title name="To Footer"/>
                        <div class="form-check form-switch active-toggle" wire:ignore>
                            <input class="form-check-input " wire:model.lazy="to_footer" type="checkbox" role="switch" checked value="">
{{--                             @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'to_footer'], key($item->id))--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">
            Save
        </button>

    </form>

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


