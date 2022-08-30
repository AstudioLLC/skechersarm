<main>
    <!-- Breadcrumb -->
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-7"><a href="/" class="text-reset text-decoration-none">{{__('frontend.cart.Home')}}</a></li>
                <li class="breadcrumb-item fs-7"><a href="#" class="text-reset text-decoration-none">{{__('frontend.vacancies.Work')}}</a></li>
                <li class="breadcrumb-item fs-7 active" aria-current="page">{{ $item->title ?? null }}</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="container">
        <div class="main-title justify-content-start my-3">
            <h2 class="fs-4 p-0">{{ $item->title ?? null }}</h2>
        </div>
        <div class="row mb-3 w-100 m-0">
            <div class="col-12 p-0">
                <div class="row gap-3 mb-5">
                    <div class="col-lg-auto col-sm-4 col-12">
                        <span class="fs-7">{{__('frontend.vacancies.City')}}</span>
                        <p class="m-0 fw-bold text-primary">{{ $item->city ?? null }}</p>
                    </div>
                    <div class="col-lg-auto col-sm-4 col-12">
                        <span class="fs-7">{{__('frontend.vacancies.Deadline')}}</span>
                        <p class="m-0 fw-bold text-primary">{{ $item->deadline ?? null }}</p>
                    </div>
                    <div class="col-lg-auto col-sm-4 col-12">
                        <span class="fs-7">{{__('frontend.vacancies.Working schedule')}}</span>
                        <p class="m-0 fw-bold text-primary">{{ $item->schedule ?? null }}</p>
                    </div>
                    <div class="col-lg-auto col-sm-4 col-12">
                        <span class="fs-7">{{__('frontend.vacancies.Working hours')}}</span>
                        <p class="m-0 fw-bold text-primary">{{ $item->hours ?? null }}</p>
                    </div>
                    <div class="col-lg-auto col-sm-4 col-12">
                        <span class="fs-7">{{__('frontend.vacancies.Salary')}}</span>
                        <p class="m-0 fw-bold text-primary">{{ $item->sallery ?? null }}</p>
                    </div>
                    <div class="col-lg col-sm-12">
                        <div class="d-flex justify-content-lg-end justify-content-start mt-3">
                            <a href="#" class="btn btn-primary px-5 py-2 rounded-1" data-bs-toggle="modal" data-bs-target="#workModal">{{__('frontend.vacancies.Apply')}}</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-2">{{__('frontend.vacancies.Job Description')}}</h4>
                {{$item->description}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="workModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="margin-top: 150px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('frontend.vacancies.Apply for a job')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-1">
                    <p class="text-primary"><i>{{ $item->title ?? null }}</i></p>
                    <form >
                        @if($errors->any())
                            <h1>{{$errors}}</h1>
                        @endif
                        <div class="row w-100 m-0">
                            <div class="col-12 col-md-6 px-1">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Name')}}</label>
                                    <input type="text" wire:model.defer="name" class="form-control border border-secondary border-opacity-10 rounded-1 p-2" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 px-1">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Surname')}}</label>
                                    <input type="text" wire:model.defer="surname" class="form-control border border-secondary border-opacity-10 rounded-1 p-2" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 px-1">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Phone')}}</label>
                                    <input type="text" wire:model.defer="phone" class="form-control border border-secondary border-opacity-10 rounded-1 p-2" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 px-1">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Email')}}</label>
                                    <input type="text" wire:model.defer="email" class="form-control border border-secondary border-opacity-10 rounded-1 p-2" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-12 px-1">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{__('frontend.header.Notes')}}</label>
                                    <textarea type="text" wire:model.defer="notes" class="form-control border border-secondary border-opacity-10 rounded-1 p-2" id="exampleFormControlInput1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="file-drop-area">
                            <span class="choose-file-button">{{__('frontend.vacancies.Attach a file')}} </span>
                            <span class="file-message">(doc, docx, pdf)</span>
                            <input class="file-input" wire:model="file" type="file" multiple>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex-column align-items-stretch">
                    <button type="button" wire:click.prevent="store" class="btn btn-primary px-5 rounded-1">{{__('frontend.vacancies.Send')}}</button>
                </div>
            </div>
        </div>
    </div>
</main>
