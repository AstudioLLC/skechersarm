
    <div>
        @if($errors->any())
            <h1>{{$errors}}</h1>
        @endif
        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateCategory">
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
                                <input type="text" class="form-control name-en" id="en" wire:model.defer="name.en"  placeholder="Enter English Title">
                            </tab-content>
                            <tab-content>
                                <input type="text" class="form-control name-hy" id="hy" wire:model.defer="name.hy" wire:keyup="generateSlug" placeholder="Enter Armenian Title">
                            </tab-content>
                            <tab-content>
                                <input type="text" class="form-control name-ru" id="ru" wire:model.defer="name.ru" placeholder="Enter Russian Title">
                            </tab-content>

                        </tab-container>
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-5 d-grid align-content-around">
                    <livewire:admin.supports.form-title name="Url"/>
                    <input type="text" class="form-control" wire:model="slug">
                </div>
            </div>

{{--            <div class="form-group has-danger" wire:ignore>--}}
{{--                <livewire:admin.supports.form-title name="Description"/>--}}
{{--                <sec-tab-container >--}}
{{--                    <!-- TAB CONTROLS -->--}}
{{--                    <input type="radio" id="sectabToggle01" name="sec-tabs" value="1" checked />--}}
{{--                    <label class="sectabToggle01 intro" for="sectabToggle01" checked="checked">English</label>--}}
{{--                    <input type="radio" id="sectabToggle02" name="sec-tabs" value="2" />--}}
{{--                    <label class="sectabToggle02" for="sectabToggle02">Armenian</label>--}}
{{--                    <input type="radio" id="sectabToggle03" name="sec-tabs" value="3" />--}}
{{--                    <label class="sectabToggle03" for="sectabToggle03">Russian</label>--}}
{{--                    <sec-tab-content>--}}
{{--                        <textarea type="text" class="form-control ckeditor description-en" id="desc_en" wire:model.defer="description.en" placeholder="Enter English Short"></textarea>--}}
{{--                    </sec-tab-content>--}}
{{--                    <sec-tab-content>--}}
{{--                        <textarea type="text" class="form-control ckeditor description-hy" id="desc_hy" wire:model.defer="description.hy" placeholder="Enter Armenian Short"></textarea>--}}
{{--                    </sec-tab-content>--}}
{{--                    <sec-tab-content>--}}
{{--                        <textarea type="text" class="form-control ckeditor description-ru" id="desc_ru" wire:model.defer="description.ru" placeholder="Enter Russian Short"></textarea>--}}
{{--                    </sec-tab-content>--}}

{{--                </sec-tab-container>--}}
{{--                @error('description') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--            </div>--}}
{{--@if($parent_id == null)--}}

            <div class="row">
                @if($item->category_id == null)
                <div class="col-md-6">
                    <div class="form-group ">
                        <livewire:admin.supports.form-title name="Image"/>
                        <div class="custom-file">
                            <div x-data="{ isUploading: false, progress: 1 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = true; progress = 100" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <input wire:model.defer="newimage" type="file" class="custom-file-input" id="customFile">
                                <div x-show.transition="isUploading" class="progress progress mt-2 rounded" >
                                    <div class="progress-bar bg-primary progress-bar-striped"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`" >
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>

                            <label class="custom-file-label" for="customFile">
                                @if ($newimage)
                                    {{ $newimage->getClientOriginalName() }}
                                @endif
                            </label>
                        </div>

                        @if ($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" class="img d-block mt-2 w-100 rounded uploading-image">
                        @elseif($image)
                            <img src="{{asset('images/category')}}/{{$image}}" class="img d-block mb-2 w-100 rounded uploading-image">
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
                                <input wire:model.defer="newimage2" type="file" class="custom-file-input" id="customFile">
                                <div x-show.transition="isUploading" class="progress progress mt-2 rounded" >
                                    <div class="progress-bar bg-primary progress-bar-striped"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`" >
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>

                            <label class="custom-file-label" for="customFile">
                                @if ($newimage2)
                                    {{ $newimage2->getClientOriginalName() }}
                                @endif
                            </label>
                        </div>

                        @if ($newimage2)
                            <img src="{{ $newimage2->temporaryUrl() }}" class="img d-block mt-2 w-100 rounded uploading-image">
                        @elseif($image_second)
                            <img src="{{asset('images/category')}}/{{$image_second}}" class="img d-block mb-2 w-100 rounded uploading-image">
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
                @endif
                @if(!empty($item->category_id))
                <div class="col-md-6">
                    <div class="form-group ">
                        <livewire:admin.supports.form-title name="Parent Category"/>
                        <div class="col-md-6">
                            <select wire:model.defer="parent_id" class="form-control">
{{--                                <option selected  value="{{$parent_id}}">{{ $selectedCategory->parentCategory()->exists() ? '-- ' .'('  .$selectedCategory->parentCategory->name. ') '. $selectedCategory->name : $selectedCategory->name  }}</option>--}}
                                @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}" @if($selectedCategory->id == ($parent->id || $parent->parentCategory->id)) selected @endif>{{ $parent->parentCategory()->exists() ? '-- ' .'('  .$parent->parentCategory->name. ') '. $parent->name : $parent->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @endif
                    <div class="col-md-3">
                        <div class="form-group ">
                            <livewire:admin.supports.form-title name="To Catalog"/>
                            <div class="form-check form-switch active-toggle" wire:ignore>
{{--                                <input class="form-check-input " wire:model.lazy="to_catalog" type="checkbox" role="switch" checked value="">--}}
                                                                @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'to_catalog'], key($item->id))
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <livewire:admin.supports.form-title name="To Footer"/>
                            <div class="form-check form-switch active-toggle" wire:ignore>
{{--                                <input class="form-check-input " wire:model.lazy="to_footer" type="checkbox" role="switch" checked value="">--}}
                                                                @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'to_footer'], key($item->id))
                            </div>
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
