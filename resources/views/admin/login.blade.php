@extends('user.layouts.App_Use_Login_Ad')
@section('content')
    <main class="login-page pt-5">
        <section class="login-admin container d-flex justify-content-center align-items-center vh-100">
            <div class="card login-card p-5">
                <div class="row g-0">
                    <!-- Hình ảnh hoặc phần giới thiệu bên trái -->
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="login-image d-flex align-items-center justify-content-center h-100">
                            <img src="{{ asset('images/logo/logo.jpg') }}" alt="Admin Login"
                                class="img-fluid" />
                        </div>
                    </div>

                    <!-- Phần đăng nhập bên phải -->
                    <div class="col-lg-6 p-4">
                        <div class="login-form-wrapper">
                            <h2 class="text-center mb-4">Admin Login</h2>
                            <p class="text-center text-muted mb-4">
                                Welcome back! Please enter your credentials to access the admin panel.
                            </p>
                            <form method="POST" action="{{ route('admin.check_login') }}" name="login-form"
                                class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control form-control_gray" name="email" value=""
                                        autocomplete="email" type="email" placeholder="name@example.com" required>
                                    <label for="email">Email address *</label>
                                    @if ($errors->any())
                                        <span class="error-message">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <input id="password" type="password" class="form-control form-control_gray"
                                        name="password" placeholder="Password" required>
                                    <label for="password">Password *</label>
                                    @if ($errors->any())
                                        <span class="error-message">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>

                                <button class="btn btn-primary w-100 text-uppercase mb-3" type="submit">Log In</button>

                                <div class="customer-option text-center">
                                    <span class="text-secondary">No account yet?</span>
                                    <a href="{{ route('customer.register') }}" class="btn-text">Create Account</a> |
                                    <a href="{{ route('customer.forgot') }}" class="btn-text">Forgot Password</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <style>
        .login-page {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f2f5;
        }

        .login-admin {
            width: 60.625rem;
            max-width: 100%;
            padding: 0 4.6875rem;
        }

        /* Định dạng thẻ chính cho khung đăng nhập */
        .login-card {
            width: 100%;
            max-width: 850px;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
            background-color: #fff;
            overflow: hidden;
        }

        .login-image {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('../images/admin-background-pattern.svg');
            background-size: cover;
        }

        .login-image img {
            width: 80%;
            max-width: 250px;
            height: auto;
            filter: brightness(0.9);
        }
    </style>
@endsection
