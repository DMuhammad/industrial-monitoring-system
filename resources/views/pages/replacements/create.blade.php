@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header mt-3">
                    <h3 class="m-0">Create a new replacement</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('replacements.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
                            <label for="parent_id" class="form-label">Parent</label>
                            <select class="form-select select-item" name="parent_id" id="parent_id">
                                <option value="" selected disabled>--- Select Parent ---</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="machine_id" class="form-label">Machine</label>
                            <select class="form-select select-item" name="machine_id" id="machine_id">
                                <option value="" selected disabled>--- Select Machine ---</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="part_id" class="form-label">Part</label>
                            <select class="form-select select-item" name="part_id" id="part_id">
                                <option value="" selected disabled>--- Select Part ---</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="replacement" class="form-label">Replacement Hour Meter</label>
                            <input type="text" class="form-control @error('replacement_hourmeter') is_invalid @enderror"
                                id="replacement" name="replacement_hourmeter" value="{{ old('replacement_hourmeter') }}" required>
                            @error('replacement')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="input_date" class="form-label">Input Date</label>
                            <input type="date" class="form-control @error('input_date') is_invalid @enderror"
                                id="input_date" name="input_date" value="{{ date('Y-m-d') }}" required>
                            @error('input_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pt-2 mb-3 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary" onclick="handleCreate()">Save</button>
                            <a href="{{ route('replacements.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
