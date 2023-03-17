@extends('layouts.guest')

@section('content')
    <div class="container mt-3 mt-md-5 pt-3 pt-md-5">
        <div class="row justify-content-sm-center ">
            <div class="col-12 col-xl-6 col-md-8 d-flex align-items-center justify-content-center">
                <div class="bg-white shadow-sm border border-light rounded p-4 p-lg-5 w-100">
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h3 class="mb-0">Create Account</h3>
                    </div>
                    <form action="#" class="mt-4" method="POST">
                        <!-- Form Name-->
                        <div class="form-group mt-4 mb-4">
                            <label for="name">Your Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input id="name" type="name" class="form-control" placeholder="Full Name" autofocus
                                    required>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form Email-->
                        <div class="form-group mt-4 mb-4">
                            <label for="email">Your Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control" placeholder="name@example.com"
                                    autofocus required>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form Password -->
                        <div class="form-group mb-4">
                            <label for="password">Your Password</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon4">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" placeholder="Password" class="form-control" id="password"
                                    name="password" required>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form Confirm Password -->
                        <div class="form-group mb-4">
                            <label for="confirm_password">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon5">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" placeholder="Confirm Password" class="form-control"
                                    id="confirm_password" name="confirm_password" required>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Sign in</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <span class="fw-normal">
                            Already have an account?
                            <a href="/login" class="fw-bold text-decoration-none text-dark">Login here</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
