@extends('layouts.guest')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row justify-content-sm-center">
            <div class="col-12 col-xl-6 col-md-8">
                <div class="bg-white shadow-sm border rounded border-light p-4 p-lg-5 w-100">
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h3 class="mb-0">Welcome Back!</h3>
                    </div>
                    <form action="#" class="mt-4" method="POST">
                        <!-- Form Email -->
                        <div class="form-group mb-4">
                            <label for="email">Your Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" placeholder="name@example.com" id="email"
                                    autofocus required>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form Password -->
                        <div class="form-group mb-4">
                            <label for="password">Your Password</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" placeholder="Password" class="form-control" id="password" required>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <div class="d-flex justify-content-between align-items-top mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember">
                                <label class="form-check-label mb-0" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <div>
                                <a href="/forgot-password" class="small text-right text-decoration-none text-dark">
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
                            <a href="/register" class="fw-bold text-decoration-none text-dark">Create account</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
