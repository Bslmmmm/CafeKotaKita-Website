@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="header bg-primary pb-6">

        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Form Menu</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Manajemen Menu</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Menu</a></li>
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
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ isset($data) ? route('menu.update', $data->id) : route('menu.store') }}">
                            @csrf
                            @if (isset($data))
                                @method('PATCH')
                            @endif
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama
                                    Menu</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $data->nama ?? old('nama') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama
                                    Kafe</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="kafe_id" id="exampleFormControlSelect1">
                                        <option>-- Pilih Kafe --</option>
                                        @foreach ($kafe as $d)
                                            <option value="{{ $d->id }}"
                                                @isset($data)
                                            @selected($d->id == $data->kafe_id)
                                        @endisset>
                                                {{ $d->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Harga</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="harga"
                                        value="{{ $data->harga ?? old('harga') }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label form-control-label">Image</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" value="{{ $data->image ?? old('image') }}"
                                        name="image" id="customFileLang" lang="en" multiple
                                        onchange="previewImage(this);">

                                    <!-- Image Preview -->
                                    @if (isset($data) && $data->image)
                                        <img id="gambar-preview" src="{{ asset('storage/' . $data->image) }}"
                                            alt="Gambar Pratinjau"
                                            style="max-width: 50%; margin-top: 20px; display: block;">
                                    @else
                                        <img id="gambar-preview" src="#" alt="Gambar Pratinjau"
                                            style="max-width: 50%; margin-top: 20px; display: none;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Kategori</label>
                                <div class="container">
                                    <div class="row">
                                        @if ($kategori->count() == 0)
                                            <p class="text-danger">Tidak ada kategori tersedia. Tambahkan kategori terlebih
                                                dahulu.</p>
                                        @else
                                            @foreach ($kategori as $item)
                                                <div class="col-3">
                                                    <input type="checkbox" name="kategori[]" value="{{ $item->id }}"
                                                        @if (isset($data) && $data->kategori->contains('id', $item->id)) checked @endif />
                                                    {{ $item->nama }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Status</label>
                                <label class="ml-2 mt-2 custom-toggle custom-toggle-success ">
                                    <input type="checkbox" name="status"
                                        checked="{{ $data->status ?? old('status') === 'tersedia' }}">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="Habis"
                                        data-label-on="Tersedia"></span>
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
