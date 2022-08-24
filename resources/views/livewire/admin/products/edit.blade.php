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
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
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
                            <input type="text" name="name.en"    class="form-control  @error('name.en') form-control-alternative is-invalid @enderror name-en" id="en2" wire:model.defer="name.en" placeholder="Enter English Title">
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
                    <input style="margin-top: 59px;" type="text" class="form-control @error('url') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Url" wire:model="slug">
                    @error('url') <span class="text-danger">{{ $message }}</span>@enderror
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
        <div class="row">
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Price"/>
                    <input type="number" class="form-control" wire:model="price" wire:keyup="canAddSalePercent"  placeholder="Enter Price">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Discount Percent"/>
                    <input type="number" class="form-control"  @if(empty($price)) readonly  @endif wire:model="sale_percent" wire:keyup="generateSalePrice" placeholder="Enter discount percent">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Discount Price"/>
                    <input class="form-control" wire:model="sale_price" readonly>
                </div>
            </div>
{{--            <div class="col-2">--}}
{{--                <div class="form-group ">--}}
{{--                    <livewire:admin.supports.form-title name="Rating"/>--}}
{{--                    <input type="text" class="form-control" wire:model.defer="rating" placeholder="Enter Rating">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-2">--}}
{{--                <div class="form-group ">--}}
{{--                    <livewire:admin.supports.form-title name="Label"/>--}}
{{--                    <input type="text" class="form-control" wire:model.defer="label" placeholder="Enter Label">--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Barcode"/>
                    <input type="text" class="form-control" wire:model.defer="barcode" placeholder="Enter Barcode">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="1C Article"/>
                    <input type="text" class="form-control" wire:model.defer="article_1c" placeholder="Enter 1C Article">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Collections"/>
                    <select wire:model.defer="brand_id" class="form-control">
                        <option value="" >Choose Collection</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Quantity"/>
                    <input type="text" class="form-control" wire:model.defer="quantity" placeholder="Enter QTY">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Is New"/>
                    <div class="form-check form-switch active-toggle">
                        <input class="form-check-input " wire:model.lazy="is_new" type="checkbox" role="switch" value="">
                    </div>
                </div>
            </div>
{{--            <div class="col-2">--}}
{{--                <div class="form-group ">--}}
{{--                    <livewire:admin.supports.form-title name="Top Seller"/>--}}
{{--                    <div class="form-check form-switch active-toggle">--}}
{{--                        <input class="form-check-input " wire:model.lazy="top_seller" type="checkbox" role="switch" value="">--}}
{{--                        @livewire('admin.supports.toggle-switch',  ['model' => $item, 'field' => 'top_seller'], key($item->id))--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Collection"/>
                    <div class="form-check form-switch active-toggle">
                        <input class="form-check-input " wire:model.lazy="collection" type="checkbox" role="switch"  checked value="">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Is Sale"/>
                    <div class="form-check form-switch active-toggle">
                        <input class="form-check-input " wire:model.lazy="other" type="checkbox" role="switch"  checked value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
                        <img src="{{asset('images/products')}}/{{$image}}" class="img d-block mb-2 w-100 rounded uploading-image">
                    @endif
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="Parent Category"/>
                    <div class="col-md-6" >

                        <select wire:model.defer="parent_category"  class="form-control">

                            <option  >Choose parent Category</option>
                            @foreach($categories as $category)
                                <option  value="{{ $category->id }}" >
                                    @if(isset($category->parentCategory->parentCategory->parentCategory->name ))
                                        {{$category->parentCategory->parentCategory->parentCategory->name  . ' / ' }}
                                    @endif
                                    @if(isset($category->parentCategory->parentCategory->name ))
                                        {{$category->parentCategory->parentCategory->name  . ' / ' }}
                                    @endif
                                    @if(isset($category->parentCategory->name))
                                        {{  $category->parentCategory->name  . ' / ' }}
                                    @endif
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
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


