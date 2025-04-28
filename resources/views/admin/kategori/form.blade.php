@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="header bg-primary pb-6">

        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Form Kategori</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Manajemen Menu</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col col-lg-8">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST"
                            action="{{ isset($data) ? route('kategori.update', $data->id) : route('kategori.store') }}">
                            @csrf
                            @if (isset($data))
                                @method('PATCH')
                            @endif
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama
                                    Kategori</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $data->nama ?? old('nama') }}" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-success float-right">{{ isset($data) ? 'Update' : 'Simpan' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
