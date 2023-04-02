@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header mt-3">
                    <h3 class="m-0">Create a new part</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('partmachines.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="machine_id" class="form-label">Machine</label>
                            <select class="form-select select-item" name="machine_id" id="machine_id">
                                <option value="" selected disabled>--- Select Machine ---</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}">
                                        {{ $machine->machine_name . ' ( ' . $machine->parentmachine->parent_name . ' )' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="part_name" class="form-label">Part Name</label>
                            <input type="text" class="form-control @error('part_name') is_invalid @enderror"
                                id="part_name" name="part_name" value="{{ old('part_name') }}" autofocus required>
                            @error('part_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="standard_hourmeter" class="form-label">Standard HM</label>
                            <input type="text" class="form-control @error('standard_hourmeter') is_invalid @enderror"
                                id="standard_hourmeter" name="standard_hourmeter" value="{{ old('standard_hourmeter') }}"
                                autofocus required>
                            @error('standard_hourmeter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pt-2 mb-3 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary" onclick="handleCreate()">Save</button>
                            <a href="{{ route('partmachines.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
