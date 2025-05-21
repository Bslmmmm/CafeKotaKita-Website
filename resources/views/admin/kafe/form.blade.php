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
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">No
                                    Telp</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="{{ $data->telp ?? old('telp') }}"
                                        name="telp">
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
                                <label for="jam_buka" class="col-md-2 col-form-label form-control-label">Jam Buka</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="time" name="jam_buka"
                                        value="{{ isset($data) ? \Carbon\Carbon::parse($data->jam_buka)->format('H:i') : old('jam_buka') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jam_tutup" class="col-md-2 col-form-label form-control-label">Jam Tutup</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="time" name="jam_tutup"
                                        value="{{ isset($data) ? \Carbon\Carbon::parse($data->jam_tutup)->format('H:i') : old('jam_tutup') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Genre</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="genre[]" id="exampleFormControlSelect1">
                                        <option disabled>-- Pilih Genre --</option>
                                        @foreach ($genre as $item)
                                            <option value="{{ $item->id }}"
                                                @if (optional($data)->genre?->contains('id', $item->id)) selected @endif>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Fasilitas</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="fasilitas[]" id="exampleFormControlSelect1">
                                        <option disabled>-- Pilih Fasilitas --</option>
                                        @foreach ($fasilitas as $item)
                                            <option value="{{ $item->id }}"
                                                @if (optional($data)->fasilitas?->contains('id', $item->id)) selected @endif>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('kafe.index') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit"
                                        class="btn btn-success">{{ isset($data) ? 'Update' : 'Simpan' }}</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
