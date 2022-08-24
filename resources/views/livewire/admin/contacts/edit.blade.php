<div>
    @if($errors->any())
        <h1>{{$errors}}</h1>
    @endif
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlide">
        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Name"/>
                    <input type="text" class="form-control @error('name') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Name" wire:model.defer="name">
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Email"/>
                    <input type="text" class="form-control @error('email') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Email" wire:model.defer="email">
                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group has-danger">
                <livewire:admin.supports.form-title name="Phone"/>
                <input type="text" class="form-control @error('phone') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Phone" wire:model.defer="phone">
                @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Message"/>
                        <textarea id="exampleFormControlInput1" placeholder="Enter Message" wire:model.defer="message" class="@error('message') form-control-alternative is-invalid @enderror" cols="70" rows="10"></textarea>
                    @error('message') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">
            Save
        </button>
    </form>



</div>

