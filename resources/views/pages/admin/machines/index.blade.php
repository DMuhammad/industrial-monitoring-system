@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h3 class="mt-2">Data Machines</h3>
                    <div class="d-none d-sm-inline-block">
                        <a href="{{ route('machines.create') }}" class="btn btn-primary rounded-3">
                            <i class="fas fa-plus mx-lg-1"></i> Add Machine
                        </a>
                    </div>
                    <div class="d-inline-block d-sm-none">
                        <button type="button" class="btn btn-primary rounded-3" data-bs-toggle="modal"
                            data-bs-target="#modalCreateData">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-hover" id="simple-datatables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Machine</th>
                                <th>Parent</th>
                                <th data-sortable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($machines as $machine)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $machine->machine_name }}</td>
                                    <td>{{ $machine->parentmachine->parent_name }}</td>
                                    <td>
                                        <form action="{{ route('machines.destroy', $machine->id) }}" method="post"
                                            class="form-delete">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="handleDelete(event)">
                                                <i class="far fa-trash-alt mx-lg-1"></i> Delete
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
