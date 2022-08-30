<form action="{{route('search.result')}}"  method="post">
    @csrf
    <div class="d-flex justify-content-end h-100 align-items-center search-component">
        <div class="input-group w-100">
            <input type="text" name="search" class="form-control border-light fs-7" placeholder="{{__('frontend.header.Search')}}" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-light" type="submit" id="button-addon2">
                <img src="{{ asset('images/icons/search.svg') }}" class="img-fluid" alt="">
            </button>
        </div>
    </div>
</form>
