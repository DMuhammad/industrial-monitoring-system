@extends('layouts.guest')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row justify-content-sm-center">
            <div class="col-12 col-xl-6 col-md-8">
                <div class="bg-white shadow-sm border rounded border-light p-4 p-lg-5 w-100">
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h1>Welcome Back!</h1>
                    </div>
                    <form action="{{ route('login.store') }}" class="mt-4" method="POST">
                        @csrf

                        <!-- Form Email -->
                        <div class="form-group mb-4">
                            <label for="email">Your Email</label>
                            <div class="input-group">
                                <span class="input-group-text text-secondary" id="basic-addon1">
                                    <i class="align-middle" data-feather="mail"></i>
                                </span>
                                <input id="email" class="form-control @error('email') is-invalid @enderror"
                                    type="email" name="email" placeholder="name@example.com" required
                                    value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form Password -->
                        <div class="form-group mb-4">
                            <label for="password">Your Password</label>
                            <div class="input-group">
                                <span class="input-group-text text-secondary" id="basic-addon2">
                                    <i class="align-middle" data-feather="lock"></i>
                                </span>
                                <input id="password" class="form-control" type="password" name="password"
                                    placeholder="Password" required autocomplete="current-password">
                            </div>
                        </div>
                        <!-- End of Form -->

                        <div class="d-flex justify-content-between align-items-top mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label mb-0" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <div>
                                <a href="/forgot-password" class="small text-right text-dark">
                                    Lost password?
                                </a>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Sign in</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <span class="fw-normal">
                            Not registered?
                            <a href="/register" class="fw-bold text-dark">Create account</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
