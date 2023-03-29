@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h3 class="mt-2">Data Replacement</h3>
                    <a href="{{ route('replacements.create') }}" class="btn btn-primary rounded-3">
                        <i class="fas fa-plus mx-lg-1"></i> <span class="d-none d-sm-inline-block">Add Replacement</span>
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-hover" id="simple-datatables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Department</th>
                                <th>Parent</th>
                                <th>Machine</th>
                                <th>Part</th>
                                <th>Replacement HM</th>
                                <th>Date</th>
                                <th data-sortable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($replacements as $replacement)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $replacement->department->department_name }}</td>
                                    <td>{{ $replacement->parentmachine->parent_name }}</td>
                                    <td>{{ $replacement->machine->machine_name }}</td>
                                    <td>{{ $replacement->partmachine->part_name }}</td>
                                    <td>{{ number_format($replacement->replacement_hourmeter) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($replacement->input_date)) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            @can('admin')
                                                <a href="{{ route('replacements.edit', $replacement->id) }}"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-edit mx-lg-1"></i>
                                                    <span class="d-none d-sm-inline-block">Edit</span>
                                                </a>
                                            @endcan
                                            <form class="form-delete"
                                                action="{{ route('replacements.destroy', $replacement->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-delete"
                                                    onclick="handleDelete(event)">
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
