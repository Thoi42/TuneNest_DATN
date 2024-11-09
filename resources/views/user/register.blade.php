@extends('user.layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
                    href="#tab-item-register" role="tab" aria-controls="tab-item-register"
                    aria-selected="true">Register</a>
            </li>
        </ul>
        <div class="tab-content pt-2" id="login_register_tab_content">
            <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel"
                aria-labelledby="register-tab">
                <div class="register-form">
                    <form method="POST" action="{{ route('user.postRegister') }}" name="register-form" class="needs-validation" novalidate="">
                        @csrf

                        <div class="form-floating mb-3">
                            <input class="form-control form-control_gray" name="name" value="{{ old('name') }}" 
                                autocomplete="name" autofocus="">
                            <label for="name">Name</label>

                            <!-- Hiển thị lỗi cho trường 'name' -->
                            @error('name')
                                <span class="error-message">* {{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="pb-3"></div>

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control form-control_gray" name="email"
                                value="{{ old('email') }}" autocomplete="email">
                            <label for="email">Email address *</label>

                            <!-- Hiển thị lỗi cho trường 'email' -->
                            @error('email')
                                <span class="error-message">* {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="pb-3"></div>

                        <div class="form-floating mb-3">
                            <input id="phone" type="text" class="form-control form-control_gray" name="phone"  
                                value="{{ old('phone') }}" autocomplete="phone">
                            <label for="phone">Phone *</label>

                            <!-- Hiển thị lỗi cho trường 'phone' -->
                            @error('phone')
                                <span class="error-message">* {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="pb-3"></div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control form-control_gray" name="password"
                                 autocomplete="new-password">
                            <label for="password">Password *</label>

                            <!-- Hiển thị lỗi cho trường 'password' -->
                            @error('password')
                                <span class="error-message">* {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password-confirm" type="password" class="form-control form-control_gray"
                                name="password_confirmation" autocomplete="new-password">
                            <label for="password-confirm">Confirm Password *</label>
                        </div>

                        <div class="d-flex align-items-center mb-3 pb-2">
                            <p class="m-0">Your personal data will be used to support your experience throughout this
                                website, to manage access to your account, and for other purposes described in our privacy policy.
                            </p>
                        </div>

                        <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>

                        <div class="customer-option mt-4 text-center">
                            <span class="text-secondary">Have an account?</span>
                            <a href="{{ route('user.login') }}" class="btn-text js-show-register">Login to your Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
