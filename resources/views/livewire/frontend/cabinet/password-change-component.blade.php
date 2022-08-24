<main>
    <!-- Breadcrumb -->
    <div class="container py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">Գլխավոր</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">Անձնական տվյալներ</li>
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
                <h1 class="fs-4 ps-0 mt-2">Անձնական տվյալներ</h1>
            </div>
        </a>
        <div class="row m-0">
            <div class="col-3">
                <livewire:frontend.cabinet.includes.left-panel-component/>
            </div>
            <div class="col-12 col-xl-8 cabinet-info">
                <form wire:submit.prevent="save">
                <div class="row m-0">
                    <div class="col-12 col-md-6 col-xl-4 px-0 px-md-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password *</label>
                            <input type="password" wire:model="current_password" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1" placeholder="Current Password">
                        </div>
                        @if ($errors->has('current_password'))
                            <p style="color: red">{{$errors->first('current_password')}}</p>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-0 px-md-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password *</label>
                            <input type="password" wire:model="password" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1" placeholder="New Password">
                        </div>
                        @if ($errors->has('password'))
                            <p style="color: red">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-0 px-md-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password *</label>
                            <input type="password" wire:model="password_confirmation" class="form-control bg-light border-0 p-3" id="exampleFormControlInput1" placeholder="Confirm New Password">
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <p style="color: red">{{$errors->first('password_confirmation')}}</p>
                        @endif
                    </div>
                </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary px-5 py-2 rounded-1" >Պահպանել</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

