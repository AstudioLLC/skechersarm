@extends('layouts.base')

@section('content')


{{--<main>--}}
{{--    <div class="container">--}}
{{--        <div class="bredcrump my-4">--}}
{{--            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item"><a href="#" class="text-reset text-decoration-none">Գլխավոր</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">Աջակցություն</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--        </div>--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-12 col-md-6">--}}
{{--                <h2 class="h3 mb-4"><span class="fs-6 text-muted">Մուտք</span>  /  Գրանցվել</h2>--}}
{{--                <div class="row m-0">--}}
{{--                    <a href="{{route('register')}}" class="btn btn-outline-success">Գրանցվել</a>--}}
{{--                    <div class="col-12 mb-4">--}}
{{--                        <span>Մուտք սոց․ ցանցերի միջոցով</span>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 mb-4">--}}
{{--                        <a href="#" class="me-3"><img src="{{asset('frontend/images/icons/facebooklogin.svg')}}" class="img-fluid" alt=""></a>--}}
{{--                        <a href="#" class="me-3"><img src="{{asset('frontend/images/icons/gmail.svg')}}" class="img-fluid" alt=""></a>--}}
{{--                        <a href="#" class="me-3"><img src="{{asset('frontend/images/icons/mailru.svg')}}" class="img-fluid" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 mb-4">--}}
{{--                        <span>կամ մուտքագրեք ձեր գաղտնաբառը և էլ․ փոստի հասցեն</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <form method="POST" action="{{ route('login') }}">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-4">--}}
{{--                        <input type="text" class="form-control rounded-0 border-0 border-bottom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Անուն *" style="font-size: 14px;">--}}
{{--                    </div>--}}
{{--                    <div class="mb-4">--}}
{{--                        <input type="password" class="form-control rounded-0 border-0 border-bottom @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Գաղտնաբառ *" style="font-size: 14px;">--}}
{{--                    </div>--}}
{{--                    @if (Route::has('password.request'))--}}
{{--                    <a href="{{ route('password.request') }}" class="text-reset" style="font-size: 14px;">Մոռացե՞Լ եք գաղտնաբառը?</a>--}}
{{--                    @endif--}}
{{--                    <div class="row mb-3">--}}
{{--                        <div class="col-md-6 offset-md-4">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                <label class="form-check-label" for="remember">--}}
{{--                                    {{ __('Remember Me') }}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="d-grid gap-2 mt-4">--}}
{{--                        <button class="btn btn-dark rounded-0 w-75 py-2" type="submit">Մուտք</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</main>--}}

<main>
    <div class="row m-0">
        <div class="col-12 p-0">
            <img src="{{ asset('images/regbaner.png') }}" class="w-100" alt="">
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 shadow-sm  reg-window bg-white p-3">
                <p class="h3 mb-4 text-primary fs-4">Մուտք</p>
                <div class="row m-0">
                    <div class="col-12 mb-4">
                        <span>Մուտք սոց․ ցանցերի միջոցով</span>
                    </div>
                    <div class="col-12 mb-4">
                        <a href="{{route('auth.facebook')}}" class="me-3"><img src="{{asset('frontend/images/icons/facebooklogin.svg')}}" class="img-fluid" alt=""></a>
                        <a href="{{route('auth.google')}}" class="me-3"><img src="{{asset('frontend/images/icons/gmail.svg')}}" class="img-fluid" alt=""></a>
                        <a href="#" class="me-3"><img src="{{asset('frontend/images/icons/mailru.svg')}}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="col-12 mb-4">
                        <span>կամ մուտքագրեք ձեր գաղտնաբառը և էլ․ փոստի հասցեն</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control rounded-0 border-0 border-bottom @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required  placeholder="Անուն *" style="font-size: 14px;">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control rounded-0 border-0 border-bottom" name="password" placeholder="Գաղտնաբառ *" style="font-size: 14px;">
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-reset" style="font-size: 14px;">Մոռացե՞Լ եք գաղտնաբառը?</a>
                    @endif
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                        <label class="form-check-label" for="remember">--}}
{{--                            {{ __('Remember Me') }}--}}
{{--                        </label>--}}
{{--                    </div>--}}

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary rounded-0 w-100 py-2" type="submit">Մուտք</button>
                        <a href="{{route('register')}}" class="btn btn-outline-primary rounded-0 w-100 py-2" type="submit">Գրանցվել</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
