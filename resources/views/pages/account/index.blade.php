@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header mt-3">
                    <h3 class="m-0">Change Password</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('account.update', auth()->user()->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="oldPasswordInput" class="form-label">Old Password</label>
                            <input name="old_password" type="password"
                                class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input name="new_password" type="password"
                                class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control"
                                id="new_password_confirmation">
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-2">
                            <button class="btn btn-primary">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
