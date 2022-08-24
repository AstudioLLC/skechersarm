
<main>
    <!-- Breadcrumb -->
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{$page->title ?? null}}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="main-title justify-content-start my-1">
            <h1 class="fs-4 ps-0">{{$page->title ?? null}}</h1>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-xl-3">
                <h5 class="text-primary ms-3">Կապվեք մեզ հետ</h5>
                <div class="row m-0">
                    <div class="col-12 col-md-6 col-xl-12 mb-3">
                        <div class="shadow-sm d-flex align-items-center p-2 gap-4">
                            <img src="{{asset('images/icons/contact-location.svg')}}" alt="">
                            <a href="#" class="text-reset text-decoration-none">{{$information->address}}</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-12 mb-3">
                        <div class="shadow-sm d-flex align-items-center p-2 gap-4">
                            <img src="{{asset('images/icons/contact-call.svg')}}" alt="">
                            <a href="tel:{{$information->phone}}" class="text-reset text-decoration-none">{{$information->phone}}</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-12 mb-3">
                        <div class="shadow-sm d-flex align-items-center p-2 gap-4">
                            <img src="{{asset('images/icons/contact-mail.svg')}}" alt="">
                            <a href="mailto:{{$information->email}}" class="text-reset text-decoration-none">{{$information->email}}</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-12 mb-3">
                        <div class="d-flex align-items-center gap-1">
                            @foreach($social_networks as $social)
                            <a href="{{$social->url}}" class="text-reset text-decoration-none">
                                <img src="{{asset('images/social_network').'/'.$social->image}}" alt="{{$social->title}}">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-9">
                <form   wire:submit.prevent="storeContact">

                    <div class="row m-0">
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="mb-3">
                                <label for="contactName" class="form-label text-muted">Անուն *</label>
                                <input type="text"  wire:model.defer="name" class="form-control form-control-lg rounded-0 border bg-light" id="contactName">
                                @error('name') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="mb-3">
                                <label for="contactEmail" class="form-label text-muted">Էլ. Փոստ *</label>
                                <input type="email"  wire:model.defer="email" class="form-control form-control-lg rounded-0 border bg-light" id="contactEmail">
                                @error('email') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="mb-3">
                                <label for="contactPhone" class="form-label text-muted">Հեռ.` *</label>
                                <input type="number"  wire:model.defer="phone" class="form-control form-control-lg rounded-0 border bg-light" id="contactPhone">
                                @error('phone') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="contactMessage" class="form-label text-muted">Հաղորդագրություն *</label>
                                <textarea class="form-control form-control-lg rounded-0 border bg-light"  wire:model.defer="message" rows="5" id="contactMessage"></textarea>
                                @error('message') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-primary rounded-0 py-2 px-5">Ուղարկել</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
