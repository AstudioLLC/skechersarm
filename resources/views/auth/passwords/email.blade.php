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
                <p class="h3 mb-4 text-primary fs-4">{{__('auth.email.Password recovery')}}</p>
                <p class="fs-7 text-muted mb-5">{{__('auth.email.Send the password reset link')}}</p>
                @if (session('status'))
                     <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                     </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-5">
                        <input type="text" class="form-control rounded-0 border-0 border-bottom @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required   placeholder="{{__('auth.email.Email')}}" style="font-size: 14px;">
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary rounded-0 w-100 py-2" type="submit">{{__('auth.email.Send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection
