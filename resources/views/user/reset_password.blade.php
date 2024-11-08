@extends('user.layouts.app')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                        role="tab" aria-controls="tab-item-login" aria-selected="true">Reset Password</a>
                </li>
            </ul>
            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                    <div class="login-form">
                        <form method="POST" action="{{ route('customer.check_reset_password', ['token' => $token]) }}" name="login-form" class="needs-validation"
                            novalidate="">
                            @csrf
                            @method('POST')
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray " name="password" value=""
                                    autocomplete="new_password" autofocus="" type="text">
                                <label for="new_password">New password *</label>
                                @if ($errors->any())
                                    <span class="error-message"> *
                                        {{
                                            $errors->first('password')
                                        }}
                                    </span>
                                @endif
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input id="password" type="password" class="form-control form-control_gray "
                                    name="confirm-password" autocomplete="current-password">
                                <label for="customerPasswodInput">Confirm password *</label>
                                @if ($errors->any())
                                <span class="error-message"> *
                                    {{
                                        $errors->first('confirm-password')
                                    }}
                                </span>
                            @endif
                            </div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Reset Now</button>

                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
