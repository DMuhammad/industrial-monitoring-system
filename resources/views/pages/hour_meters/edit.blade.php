@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header mt-3">
                    <h3 class="m-0">Update Hour Meter</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('hourmeters.update', $hourmeter->id) }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-select select-item" name="department_id" id="department_id">
                                <option value="" selected disabled>--- Select Department ---</option>
                                @foreach ($departments as $department)
                                    @if (old('department_id', $hourmeter->department_id) == $department->id)
                                        <option value="{{ $department->id }}" selected>
                                            {{ $department->department_name }}
                                        </option>
                                    @else
                                        <option value="{{ $department->id }}">
                                            {{ $department->department_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="parent_id" class="form-label">Parent</label>
                            <select class="form-select select-item" name="parent_id" id="parent_id2">
                                <option value="" selected disabled>--- Select Parent ---</option>
                                @foreach ($parentmachines as $parentmachine)
                                    @if (old('parent_id', $hourmeter->parent_id) == $parentmachine->id)
                                        <option value="{{ $parentmachine->id }}" selected>
                                            {{ $parentmachine->parent_name }}
                                        </option>
                                    @else
                                        <option value="{{ $parentmachine->id }}">
                                            {{ $parentmachine->parent_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hourmeter" class="form-label">Hour Meter</label>
                            <input type="text" class="form-control @error('hourmeter') is_invalid @enderror"
                                id="hourmeter" name="hourmeter" value="{{ old('hourmeter', $hourmeter->hourmeter) }}"
                                required>
                            @error('hourmeter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="input_date" class="form-label">Input Date</label>
                            <input type="date" class="form-control @error('input_date') is_invalid @enderror"
                                id="input_date" name="input_date" value="{{ old('input_date', $hourmeter->input_date) }}"
                                required>
                            @error('input_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pt-2 mb-3 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary" onclick="handleUpdate()">Save</button>
                            <a href="{{ route('hourmeters.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
