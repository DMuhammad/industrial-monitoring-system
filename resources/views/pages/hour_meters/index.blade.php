@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h3 class="mt-2">Data Hour Meters</h3>
                    <a href="{{ route('hourmeters.create') }}" class="btn btn-primary rounded-3">
                        <i class="fas fa-plus mx-lg-1"></i> <span class="d-none d-sm-inline-block">Add HM</span>
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-hover" id="simple-datatables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Department</th>
                                <th>Parent</th>
                                <th>Hour Meter</th>
                                <th>Created At</th>
                                <th data-sortable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hourmeters as $hourmeter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hourmeters->department->department_name }}</td>
                                    <td>{{ $hourmeters->parentmachine->parent_name }}</td>
                                    <td>{{ $hourmeters->base_hourmeter }}</td>
                                    <td>{{ $hourmeters->created_at }}</td>
                                    <td>
                                        <form action="{{ route('parentmachines.destroy', $parentmachine->id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-delete">
                                                <i class="far fa-trash-alt mx-lg-1"></i>
                                                <span class="d-none d-sm-inline-block">Delete</span>
                                            </button>
                                        </form>
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
