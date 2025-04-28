@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="header bg-primary pb-6">

        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Form Kafe</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Manajemen Kafe</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('kafe.index') }}">Kafe</a></li>
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
                            action="{{ isset($data) ? route('kafe.update', $data->id) : route('kafe.store') }}">
                            @csrf
                            @if (isset($data))
                                @method('PATCH')
                            @endif
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama
                                    Kafe</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $data->nama ?? old('nama') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Alamat</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="{{ $data->alamat ?? old('alamat') }}"
                                        name="alamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Latitude</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text"
                                        value="{{ $data->latitude ?? old('latitude') }}" name="latitude">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Longitude</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text"
                                        value="{{ $data->longitude ?? old('longitude') }}" name="longitude">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input"
                                    class="col-md-2 col-form-label form-control-label">Status</label>
                                <label class="ml-2 mt-2 custom-toggle custom-toggle-success ">
                                    <input type="checkbox" checked="{{ $data->status ?? old('status') === 'buka' }}">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="Tutup"
                                        data-label-on="Buka"></span>
                                </label>
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
