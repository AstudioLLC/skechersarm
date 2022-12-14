<main>
    <!-- Breadcrumb -->

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">{{__('frontend.cart.Home')}}</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{__('frontend.cabinet.Personal information')}}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <a href="#" class="text-reset text-decoration-none d-xl-none h3 mb-3 d-block" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCabinet" aria-controls="offcanvasCabinet">
            <div class="main-title justify-content-start my-1">
                <span class="fs-4">
                    <i class="fa-light fa-user"></i>
                </span>
                <h1 class="fs-4 ps-0 mt-2">{{__('frontend.cabinet.Personal information')}}</h1>
            </div>
        </a>
        <div class="row m-0">
            <div class="col-3">
                <livewire:frontend.cabinet.includes.left-panel-component/>
            </div>
            <div class="col-12 col-xl-8 cabinet-info">
                <form wire:submit.prevent="save">
                    <div class="row m-0">
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Name')}}</label>
                                <input wire:model.defer="name" value="{{$name}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1" >
                            </div>
                        </div>
{{--                        <div class="col-12 col-md-6 col-xl-4">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="exampleFormControlInput1" class="form-label">???????????????? *</label>--}}
{{--                                <input wire:model.defer="last_name" value="{{$last_name}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1" placeholder="example">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Phone')}}</label>
                                <input wire:model.defer="phone" value="{{$phone}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Email')}}</label>
                                <input wire:model.defer="email" value="{{$email}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1">
                                @if ($errors->has('email')) <p style="color: red">{{$errors->first('email')}}</p> @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Gender')}}</label>
                            <div class="d-flex justify-content-xl-between">
                                <div class="form-check bg-light ps-5 py-3 pe-3">
                                    <input wire:model="gender" class="form-check-input" type="radio" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{__('frontend.header.Men')}}
                                    </label>
                                </div>
                                <div class="form-check bg-light ps-5 py-3 pe-3">
                                    <input wire:model="gender" class="form-check-input" type="radio" value="0" id="flexCheckDefault2">
                                    <label class="form-check-label" for="flexCheckDefault2">
                                        {{__('frontend.header.Women')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 2px dashed #c1c1c1;">
                <div class="row m-0">
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{__('frontend.setting.Region')}}</label>
                            <input wire:model.defer="region" value="{{$region}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{__('frontend.setting.City')}}</label>
                            <input wire:model.defer="city" value="{{$city}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{__('frontend.setting.Street')}}</label>
                            <input wire:model.defer="street" value="{{$street}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{__('frontend.setting.House')}}</label>
                            <input wire:model.defer="home" value="{{$home}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{__('frontend.setting.Apartment')}}</label>
                            <input wire:model.defer="house" value="{{$house}}" type="text" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary px-5 py-2 rounded-1">{{__('frontend.setting.Save changes')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
