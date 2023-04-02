@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header mt-3">
                    <h3 class="m-0">Create a new machine</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('machines.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="parent_id" class="form-label">Parent</label>
                            <select class="form-select select-item" name="parent_id" id="parent_id">
                                <option value="" selected disabled>--- Select Parent ---</option>
                                @foreach ($parentmachines as $parentmachine)
                                    <option value="{{ $parentmachine->id }}">
                                        {{ $parentmachine->parent_name . ' ( ' . $parentmachine->department->department_name . ' )' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="machine_name" class="form-label">Machine Name</label>
                            <input type="text" class="form-control @error('machine_name') is_invalid @enderror"
                                id="machine_name" name="machine_name" value="{{ old('machine_name') }}" autofocus required>
                            @error('machine_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pt-2 mb-3 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary" onclick="handleCreate()">Save</button>
                            <a href="{{ route('machines.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
