@extends('layouts.base')
@section('content')
<main>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center my-3">
            <img src="{{asset('frontend/images/404.svg')}}" alt="..." class="img-fluid">
            <p class="fs-7 mt-2 text-muted">Ձեր կողմից որոնվող էջը չի գտնվել</p>
            <div class="d-flex justify-content-end">
                <a href="/">
                <button class="btn btn-primary px-5 py-2 fs-7 rounded-1">Վերադառնալ գլխավոր էջ</button>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
