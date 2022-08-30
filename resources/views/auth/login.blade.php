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
                <p class="h3 mb-4 text-primary fs-4">{{__('auth.login.Login')}}</p>
                <div class="row m-0">
                    <div class="col-12 mb-4">
                        <span>{{__('auth.login.Login to social media')}}</span>
                    </div>
                    <div class="col-12 mb-4">
                        <a href="{{route('auth.facebook')}}" class="me-3"><img src="{{asset('frontend/images/icons/facebooklogin.svg')}}" class="img-fluid" alt=""></a>
                        <a href="{{route('auth.google')}}" class="me-3"><img src="{{asset('frontend/images/icons/gmail.svg')}}" class="img-fluid" alt=""></a>
                        <a href="#" class="me-3"><img src="{{asset('frontend/images/icons/mailru.svg')}}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="col-12 mb-4">
                        <span>{{__('auth.login.Enter your password')}}</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control rounded-0 border-0 border-bottom @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required  placeholder="{{__('auth.login.Name')}}" style="font-size: 14px;">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control rounded-0 border-0 border-bottom" name="password" placeholder="{{__('auth.login.Password')}}" style="font-size: 14px;">
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-reset" style="font-size: 14px;">{{__('auth.login.Forgot your password')}}</a>
                    @endif
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                        <label class="form-check-label" for="remember">--}}
{{--                            {{ __('Remember Me') }}--}}
{{--                        </label>--}}
{{--                    </div>--}}

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary rounded-0 w-100 py-2" type="submit">{{__('auth.login.Login')}}</button>
                        <a href="{{route('register')}}" class="btn btn-outline-primary rounded-0 w-100 py-2" type="submit">{{__('auth.login.Register')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
