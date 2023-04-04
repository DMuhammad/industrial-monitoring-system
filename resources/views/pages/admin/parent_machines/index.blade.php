@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h3 class="mt-2">Data Parent Machines</h3>
                    <a href="{{ route('parentmachines.create') }}" class="btn btn-primary rounded-3">
                        <i class="fas fa-plus mx-lg-1"></i> <span class="d-none d-sm-inline-block">Add Parent</span>
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-hover" id="simple-datatables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Parent</th>
                                <th>Department</th>
                                <th data-sortable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parentmachines as $parentmachine)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $parentmachine->parent_name }}</td>
                                    <td>{{ $parentmachine->department->department_name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            <a href="{{ route('parentmachines.edit', $parentmachine->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit mx-lg-1"></i>
                                                <span class="d-none d-sm-inline-block">Edit</span>
                                            </a>
                                            <form action="{{ route('parentmachines.destroy', $parentmachine->id) }}"
                                                method="post" class="form-delete">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="handleDelete(event)">
                                                    <i class="far fa-trash-alt mx-lg-1"></i>
                                                    <span class="d-none d-sm-inline-block">Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
