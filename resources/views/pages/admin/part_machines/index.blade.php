@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h3 class="mt-2">Data Part Machines</h3>
                    <a href="{{ route('partmachines.create') }}" type="button" class="btn btn-primary rounded-3">
                        <i class="fas fa-plus mx-lg-1"></i> <span class="d-none d-sm-inline-block">Add Part</span>
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-hover" id="simple-datatables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Part Name</th>
                                <th>Standard HM</th>
                                <th>Machine</th>
                                <th data-sortable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partmachines as $partmachine)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $partmachine->part_name }}</td>
                                    <td>{{ number_format($partmachine->standard_hourmeter) }}</td>
                                    <td>{{ $partmachine->machine->machine_name }}</td>
                                    <td>
                                        <form action="{{ route('partmachines.destroy', $partmachine->id) }}" method="post"
                                            class="form-delete">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="handleDelete(event)">
                                                <i class="far fa-trash-alt mx-lg-1"></i>
                                                <span class="d-none d-sm-inline-block ">Delete</span>
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
