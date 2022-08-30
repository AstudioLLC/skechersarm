@extends('layouts.base')

@section('content')

<main>
    <div class="row m-0">
        <div class="col-12 p-0">
            <img src="{{ asset('images/regbaner.png') }}" class="w-100" alt="">
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 shadow-sm  reg-window bg-white p-3">
                <p class="h3 mb-4 text-primary fs-4">{{__('auth.register.Register')}}</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control rounded-0 border-0 border-bottom" name="email" placeholder="{{__('auth.register.Email')}}" style="font-size: 14px;">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control rounded-0 border-0 border-bottom" name="password" placeholder="{{__('auth.register.Password')}}" style="font-size: 14px;">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control rounded-0 border-0 border-bottom" name="password_confirmation" placeholder="{{__('auth.register.Repeat password')}}" style="font-size: 14px;">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="policy">
                        <label class="form-check-label text-muted text-decoration-underline fs-7" for="policy">
                            {{__('auth.register.data processing policy')}}
                        </label>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary rounded-0 w-100 py-2" type="submit">{{__('auth.register.Register')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
