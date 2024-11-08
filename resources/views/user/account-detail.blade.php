@extends('user.layouts.app')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Account Details</h2>
        <div class="row">
            <div class="col-lg-3">
                <ul class="account-nav">
                    <li><a href="my-account.html" class="menu-link menu-link_us-s menu-link_active">Dashboard</a></li>
                    <li><a href="account-orders.html" class="menu-link menu-link_us-s">Orders</a></li>
                    <li><a href="account-address.html" class="menu-link menu-link_us-s">Addresses</a></li>
                    <li><a href="account-details.html" class="menu-link menu-link_us-s">Account Details</a></li>
                    <li><a href="account-wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></li>
                </ul>
            </div>
            <div class="col-lg-9">
                <form action="{{ route('customer.chek_profile') }}" method="POST">
                    @csrf
                    <div class="page-content my-account__edit">
                        <div class="my-account__edit-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ old('name', $user->name) }}" required>
                                        <label for="name">Name</label>
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Mobile Number" name="phone" value="{{ old('phone', $user->phone) }}" required>
                                        <label for="phone">Mobile Number</label>
                                        @error('phone')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email', $user->email) }}" required>
                                        <label for="email">Email Address</label>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <h5 class="text-uppercase mb-0">Password Change</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" placeholder="Old password">
                                        <label for="old_password">Old password</label>
                                        @error('old_password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="New password">
                                        <label for="new_password">New password</label>
                                        @error('new_password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm new password">
                                        <label for="new_password_confirmation">Confirm new password</label>
                                        @error('new_password_confirmation')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
