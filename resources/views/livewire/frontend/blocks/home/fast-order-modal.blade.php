<div  wire:ignore.self>
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="placeFastOrder" >

        <!-- Fast Order -->
        @if($errors->any())
            <h1>{{$errors}}</h1>
        @endif
        <div class="modal fade fast-order pe-0" id="fastOrder" tabindex="-1" aria-labelledby="fastOrderLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header justify-content-start bg-primary">
                        <img src="{{asset('frontend/images/logo-white.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="modal-body">
                        <p class="text-dark fs-5">{{__('frontend.header.Fast order')}}</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label text-muted">{{__('frontend.header.Name')}}</label>
                                        <input wire:model.defer="name" type="text" class="form-control form-control-lg border-0 border-bottom rounded-0" id="firstname">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label text-muted">{{__('frontend.header.Phone')}}</label>
                                        <input wire:model.defer="phone" type="number" class="form-control form-control-lg border-0 border-bottom rounded-0" id="phone">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-muted">{{__('frontend.header.Email')}}</label>
                                        <input wire:model.defer="email" type="email" class="form-control form-control-lg border-0 border-bottom rounded-0" id="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="message" class="form-label text-muted">{{__('frontend.header.Note')}}</label>
                                        <textarea wire:model.defer="notes" type="text" class="form-control form-control-lg border-0 border-bottom rounded-0" id="message"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer d-block border-top-0">
                        <div class="d-grid gap-2">
                        <button type="submit" href="#" class="btn btn-primary px-3">{{__('frontend.header.Send the order')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if($thankyou)
        <script>
            window.setTimeout(function() {
                window.location.href = '/';
            }, 3000);
        </script>
    @endif
</div>


