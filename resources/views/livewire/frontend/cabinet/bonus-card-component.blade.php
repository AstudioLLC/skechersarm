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
                <img src="{{ asset('images/icons/cabinet/user-toggle.svg') }}" alt="">
                <h1 class="fs-4 ps-0">Անձնական տվյալներ</h1>
            </div>
        </a>
        <div class="row m-0">
            <div class="col-3">
                <livewire:frontend.cabinet.includes.left-panel-component/>
            </div>
            @if(auth()->user() && $showAddCard==0)
            <div class="col-12 col-xl-8 cabinet-info">
                <h1 class="fs-5">Կցել բոնուս քարտ</h1>
                <form action="{{ route('bonus.addCard') }}" method="post">
                    @csrf
                    <div class="shadow-sm p-3">
                        <div class="row m-0">
                            <div class="col-12 col-md-6 col-xl-4 px-0 px-md-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-labe fs-7 text-muted">Անուն</label>
                                    <input type="text" name="name" class="form-control rounded-0 border-0 border-bottom" id="exampleFormControlInput1">
                                    @if($errors->has('name'))
                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4 px-0 px-md-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput2" class="form-labe fs-7 text-muted">Ազգանուն</label>
                                    <input type="text" name="surname" class="form-control rounded-0 border-0 border-bottom" id="exampleFormControlInput2">
                                    @if($errors->has('surname'))
                                        <span style="color: red">{{ $errors->first('surname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4 px-0 px-md-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput3" class="form-labe fs-7 text-muted">Քարտի  Շտրիխ Կոդը 8 Նիշ՝</label>
                                    <input type="number" name="card_code" class="form-control rounded-0 border-0 border-bottom" id="exampleFormControlInput3">
                                    @if($errors->has('card_code'))
                                        <span style="color: red">{{ $errors->first('card_code') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary px-5 py-2 rounded-1">Պահպանել</button>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            @if(isset($code) && $code->status == 2)
                <div class="col-12 col-xl-8 cabinet-info">
                    <div class="shadow-sm p-3">
                        <div class="mb-3">Ձեր հայտը մերժված է</div>
                    </div>
                </div>
            @elseif(isset($code) && $code->status == 0)
                <div class="col-12 col-xl-8 cabinet-info">
                    <div class="shadow-sm p-3">
                        <div class="mb-3">Բոնուսքարտի տվյալներն ուղարկվեցին հաստատման, հաստատվելուն պես, այս էջում կտեսնեք Ձեր Barcode-ը․</div>
                    </div>
                </div>
            @endif

            @if(isset($bon_code) )

                <div class="col-12 col-xl-8 cabinet-info">
                    <div class="shadow-sm p-3">
                        <div class="d-flex flex-column align-items-center" >
                            <div class="mb-2 bar-code-block">{!! $bon_code !!}</div>
                            <div class="align-items-center" style="font-weight: 600">{!! $code->card_code !!}</div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</main>

