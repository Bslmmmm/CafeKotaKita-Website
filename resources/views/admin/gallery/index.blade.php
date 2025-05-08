@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Gallery</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('gallery.create')}}" class="btn btn-sm btn-neutral">Tambah</a>
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
                                    <th>Nama Kafe</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->kafe ? $d->kafe->nama : 'Tidak Ada Kafe' }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $d->url) }}" alt="Gambar Gallery"
                                                 class="img-fluid" style="max-height: 80px;">
                                        </td>
                                        <td class="table-actions">
                                            <a href="{{route('gallery.edit', $d->id)}}" class="table-action" data-toggle="tooltip"
                                                data-original-title="Edit produk">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            <a href="#!" class="table-action table-action-delete" data-toggle="tooltip"
                                                data-original-title="Hapus produk"
                                                onclick="konfirmasiHapus('{{ route('gallery.destroy', $d->id) }}')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="form-hapus-{{ $d->id }}"
                                                  action="{{ route('gallery.destroy', $d->id) }}"
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
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
@endsection

@push('js')
<script>
    function konfirmasiHapus(url) {
        if (confirm('Apakah Anda yakin ingin menghapus galeri ini?')) {
            var form = document.createElement('form');
            form.action = url;
            form.method = 'POST';

            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endpush
