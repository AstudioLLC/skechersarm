@extends('layouts.base')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}
{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<main>
    <div class="row m-0">
        <div class="col-12 p-0">
            <img src="{{ asset('images/regbaner.png') }}" class="w-100" alt="">
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 shadow-sm  reg-window bg-white p-3">
                <p class="h3 mb-4 text-primary fs-4">Գրանցվել</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control rounded-0 border-0 border-bottom" name="email" placeholder="Էլ. փոստ / Հեռախոսահամար *" style="font-size: 14px;">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control rounded-0 border-0 border-bottom" name="password" placeholder="Գաղտնաբառ *" style="font-size: 14px;">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control rounded-0 border-0 border-bottom" name="password_confirmation" placeholder="Գաղտնաբառ կրկնում *" style="font-size: 14px;">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="policy">
                        <label class="form-check-label text-muted text-decoration-underline fs-7" for="policy">
                            Սեղմելով «գրանցվել» կոճակը, ես համաձայնվում եմ օգտատիրոջ տվյալների մշակման քաղաքականության հետ:
                        </label>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary rounded-0 w-100 py-2" type="submit">Գրանցվել</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
