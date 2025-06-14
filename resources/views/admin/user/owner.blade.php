@extends('admin.layout.app')
@section('title', 'Admin - KafeKotaKita')
@section('content')
    <div class="header bg-primary pb-6">

        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Owner</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Manajemen User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Owner</li>
                            </ol>
                        </nav>
                    </div>
                    {{-- <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('menu.create')}}" class="btn btn-sm btn-neutral">Tambah</a>
                    </div> --}}
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
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NPWP</th>
                                    <th>No Telp</th>
                                    <th>Nama Kafe</th>
                                    <th>Surat Ijin Kepemilikan</th>
                                    <th>Surat Ijin Usaha</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no =1; @endphp
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->user->nama }}</td>
                                        <td>{{ $d->npwp }}</td>
                                        <td>{{ $d->user->no_telp }}</td>
                                        <td>{{ $d->kafe->nama ?? "" }}</td>

                                        <td>
                                            <img src="{{ asset('storage/' . $d->foto_surat_kepemilikan) }}"
                                                class="img-fluid" style="max-height: 80px;">
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $d->foto_surat_ijin_usaha) }}" class="img-fluid"
                                                style="max-height: 80px;">
                                        </td>

                                        <td>
                                            <span
                                                class="badge mb-1 {{ $d->status == 'aktif' ? 'badge-success' : 'badge-warning' }}">
                                                {{ $d->status }}
                                            </span>
                                        </td>
                                        <td class="table-actions">
                                            <a href="{{ route('user.validasi', ['id' => $d->id]) }}" class="table-action"
                                                data-toggle="tooltip" data-original-title="Validasi">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            <a href="{{ route('user.tolakValidasi', ['id' => $d->id]) }}" class="table-action table-action-delete" data-toggle="tooltip"
                                                data-original-title="Nonaktif">
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
