@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header mt-3">
                    <h3 class="m-0">Create a new parent</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('parentmachines.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-select select-item" name="department_id" id="department_id">
                                <option value="" selected disabled>--- Select Department ---</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">
                                        {{ $department->department_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="parent_name" class="form-label">Parent Name</label>
                            <input type="text" class="form-control @error('parent_name') is_invalid @enderror"
                                id="parent_name" name="parent_name" value="{{ old('parent_name') }}" autofocus required>
                            @error('parent_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pt-2 mb-3 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('parentmachines.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
