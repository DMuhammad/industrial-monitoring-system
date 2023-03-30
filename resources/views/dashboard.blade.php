@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <h1 class="h2 mb-4 fw-bold">Dashboard</h1>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card border border-left-primary shadow pt-2 card-size">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col me-2">
                                    <h3 class="card-title mb-3">Departments</h3>
                                    <h1 class="card-text">{{ $departments }}</h1>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="fas fa-industry fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border border-left-primary shadow pt-2 card-size">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col me-2">
                                    <h3 class="card-title mb-3">Parent Machines</h3>
                                    <p class="h1">{{ $parentmachines }}</p>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="fas fa-th-large fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border border-left-primary shadow pt-2 card-size">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col me-2">
                                    <h3 class="card-title mb-3">Machines</h3>
                                    <p class="h1">{{ $machines }}</p>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="fas fa-cog fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border border-left-primary shadow pt-2 card-size">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col me-2">
                                    <h3 class="card-title mb-3">Part Machines</h3>
                                    <p class="h1">{{ $partmachines }}</p>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="fas fa-cogs fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="table-responsive p-3">
                            <table class="table table-hover" id="simple-datatables">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Parent</th>
                                        <th>Machine</th>
                                        <th>Part</th>
                                        <th>Standar HM</th>
                                        <th>HM Today</th>
                                        <th>Last Replacement</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($replacements as $replacement)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $replacement->parentmachine->parent_name }}</td>
                                            <td>{{ $replacement->machine->machine_name }}</td>
                                            <td>{{ $replacement->partmachine->part_name }}</td>
                                            <td>{{ $replacement->partmachine->standard_hourmeter }}</td>
                                            <td>{{ $replacement->partmachine->standard_hourmeter }}</td>
                                            <td>{{ number_format($replacement->replacement_hourmeter) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($replacement->input_date)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
