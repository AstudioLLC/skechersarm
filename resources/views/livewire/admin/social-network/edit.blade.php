<div>
    @if($errors->any())
        <h1>{{$errors}}</h1>
    @endif
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlide">

        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Title"/>
                    <input type="text" class="form-control @error('url') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Title" wire:model.defer="title">
                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
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
                    @else
                        <img src="{{asset('images/social_network')}}/{{$image}}" class="img d-block mb-2 w-100 rounded uploading-image">
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



</div>

