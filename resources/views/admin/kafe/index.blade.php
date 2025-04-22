@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="header bg-primary pb-6">

        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Kafe</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Manajemen Kafe</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kafe</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('kafe.create')}}" class="btn btn-sm btn-neutral">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="table-responsive py-4 px-3">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->alamat }}</td>
                                        <td>{{ $d->latitude }}</td>
                                        <td>{{ $d->longitude }}</td>
                                        <td>{{ $d->status }}</td>
                                        <td class="table-actions">
                                            <a href="{{route('kafe.edit', $d->id)}}" class="table-action" data-toggle="tooltip"
                                                data-original-title="Edit product">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            <a href="#!" class="table-action table-action-delete" data-toggle="tooltip"
                                                data-original-title="Delete product">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
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
