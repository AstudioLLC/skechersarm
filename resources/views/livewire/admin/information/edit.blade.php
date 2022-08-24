<div>
    @if($errors->any())
        <h1>{{$errors}}</h1>
    @endif
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlide">
        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger" >
                    <livewire:admin.supports.form-title name="Address"/>
                    <sec-tab-container wire:ignore>
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="sectabToggle01" name="sec-tabs" value="1" checked />
                        <label class="sectabToggle01 intro" for="sectabToggle01" checked="checked">English</label>
                        <input type="radio" id="sectabToggle02" name="sec-tabs" value="2" />
                        <label class="sectabToggle02" for="sectabToggle02">Armenian</label>
                        <input type="radio" id="sectabToggle03" name="sec-tabs" value="3" />
                        <label class="sectabToggle03" for="sectabToggle03">Russian</label>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('address.en') form-control-alternative is-invalid @enderror address-en" id="en" wire:model.defer="address.en" placeholder="Enter English Address">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('address.hy') form-control-alternative is-invalid @enderror address-hy" id="hy" wire:model.defer="address.hy" placeholder="Enter Armenian Address">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" class="form-control @error('address.ru') form-control-alternative is-invalid @enderror address-ru" id="ru" wire:model.defer="address.ru" placeholder="Enter Russian Address">
                        </sec-tab-content>

                    </sec-tab-container>
                    @error('address') <span class="text-danger">{{ $message }}</span>@enderror
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
                    <livewire:admin.supports.form-title name="Map"/>
                    <input type="text" class="form-control @error('map') form-control-alternative is-invalid @enderror" id="exampleFormControlInput1" placeholder="Enter Map" wire:model.defer="map">
                    @error('map') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-light py-3 px-5 text-black w-100">
            Save
        </button>
    </form>



</div>

