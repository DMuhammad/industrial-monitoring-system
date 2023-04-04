@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header mt-3">
                    <h3 class="m-0">Update Department</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('departments.update', $department->id) }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="department_name" class="form-label">Department Name</label>
                            <input type="text" class="form-control @error('department_name') is_invalid @enderror"
                                id="department_name" name="department_name" value="{{ old('department_name', $department->department_name) }}" autofocus required>
                            @error('department_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pt-2 mb-3 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary" onclick="handleUpdate()">Save</button>
                            <a href="{{ route('departments.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
