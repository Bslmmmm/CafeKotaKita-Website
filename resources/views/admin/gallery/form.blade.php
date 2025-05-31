@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Form Gallery</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></li>
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
                            action="{{ isset($data) ? route('gallery.update', $data->id) : route('gallery.store') }}">
                            @csrf
                            @if (isset($data))
                                @method('PATCH')
                            @endif

                            <!-- Display validation errors if any -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="kafe_id" class="col-md-2 col-form-label form-control-label">Nama
                                    Kafe</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="kafe_id" name="kafe_id">
                                        <option value="">-- Pilih Kafe --</option>
                                        @foreach ($kafe as $d)
                                            <option value="{{ $d->id }}"
                                                {{ isset($data) && $data->kafe_id == $d->id ? 'selected' : '' }}>
                                                {{ $d->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                               <div class="form-group row">
                                <label for="type" class="col-md-2 col-form-label form-control-label">Tipe</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="type" name="type">
                                        <option value="">-- Pilih Tipe --</option>
                                            <option value="main_content"
                                                {{ isset($data) && $data->type == "main_content" ? 'selected' : '' }}>Main Content
                                            </option>
                                               <option value="menu_content"
                                                {{ isset($data) && $data->type == "menu_content" ? 'selected' : '' }}>Menu Content
                                            </option>
                                               <option value="other"
                                                {{ isset($data) && $data->type == "other" ? 'selected' : '' }}>Lainnya
                                            </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url"
                                    class="col-md-2 col-form-label form-control-label">Image</label>
                                <div class="col-md-10">
                                    <div class="custom-file">
                                        <input type="file" name="url" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" for="url">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @if (isset($data) && $data->url)
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label form-control-label">Current Image</label>
                                    <div class="col-md-10">
                                        <img src="{{ asset('storage/' . $data->url) }}" alt="Gallery Image"
                                            class="img-fluid mt-2" style="max-height: 200px;">
                                    </div>
                                </div>
                            @endif
                            <button type="submit"
                                class="btn btn-success float-right">{{ isset($data) ? 'Update' : 'Simpan' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    // Show filename when selecting file
    $('.custom-file-input').on('change', function() {
        let fileName = $(this)[0].files[0].name;
        $(this).next('.custom-file-label').html(fileName);
    });
</script>
@endpush
