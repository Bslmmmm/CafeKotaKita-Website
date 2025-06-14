@extends('admin.layout.app')
@section('title', 'Admin - KafeKotaKita')
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
                        <a href="{{ route('kafe.create') }}" class="btn btn-sm btn-neutral">Tambah</a>
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
                                    <th>No Telp</th>
                                    <th>Genre</th>
                                    <th>Fasilitas</th>
                                    <th>Jam Buka</th>
                                    <th>Jam Tutup</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->alamat }}</td>
                                        <td>{{ $d->telp }}</td>
                                        <td>
                                            <div class="row">
                                                @foreach ($d->genre->chunk(3) as $chunk)
                                                    <div class="col-12">
                                                        @foreach ($chunk as $item)
                                                            <span
                                                                class="badge badge-primary mb-1">{{ $item->nama }}</span>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                @foreach ($d->fasilitas->chunk(3) as $chunk)
                                                    <div class="col-12">
                                                        @foreach ($chunk as $item)
                                                            <span
                                                                class="badge badge-primary mb-1">{{ $item->nama }}</span>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            {{$d->jam_buka}}
                                        </td>
                                        
                                        <td>
                                            {{$d->jam_tutup}}
                                        </td>
                                        <td class="table-actions">
                                            <a href="{{ route('kafe.edit', $d->id) }}" class="table-action"
                                                data-toggle="tooltip" data-original-title="Edit product">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            <form action="{{ route('kafe.destroy', $d->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="table-action table-action-delete btn btn-link p-0"
                                                    data-toggle="tooltip" data-original-title="Delete product"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
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
    </div>
    </div>
@endsection
