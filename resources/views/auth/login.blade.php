@extends('admin.auth.layouts.auth-master')

@section('section')
    <div class="account-wrapper">
        <div class="account-header">
            <span class="inner-title">👋</span>
            <h6 class="sub-title">{{ __("Login") }} <span>{{ __(" Panel") }}</span></h6>
        </div>
        <form class="account-form" action="{{ setRoute('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="@error('email') is-invalid @enderror" title="Enter Email" required name="email" value="{{ old('email') }}" autofocus>
                <label>{{ __("Email") }}</label>
            </div>
            <div class="form-group show_hide_password">
                <input type="password" title="Enter password" required name="password">
                <button type="button" class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                <label>{{ __("Password") }}</label>
            </div>
            <button type="submit" class="btn--base w-100 btn-loading" style="background-color:#a10000;">{{ __("Login") }}</button>
            <a href="{{route('register')}}"  class="btn--base" style="background-color:green;">{{ __("Register") }}</a>
            <a href="{{route('home')}}" class="btn--base" style="background-color:blueviolet;">{{ __("Home") }}</a>
        </form>
    </div>
@endsection


@push('script')

@endpush
