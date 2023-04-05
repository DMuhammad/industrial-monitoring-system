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
                                <th>Date</th>
                                <th data-sortable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hourmeters as $hourmeter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hourmeter->department->department_name }}</td>
                                    <td>{{ $hourmeter->parentmachine->parent_name }}</td>
                                    <td>{{ number_format($hourmeter->hourmeter) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($hourmeter->input_date)) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            <a href="{{ route('hourmeters.edit', $hourmeter->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit mx-lg-1"></i>
                                                <span class="d-none d-sm-inline-block">Edit</span>
                                            </a>
                                            <form class="form-delete"
                                                action="{{ route('hourmeters.destroy', $hourmeter->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-delete ondelete">
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
