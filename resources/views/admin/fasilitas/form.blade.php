@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="header bg-primary pb-6">

        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Form Fasilitas</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Manajemen Kafe</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('fasilitas.index') }}">Fasilitas</a></li>
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
                            action="{{ isset($data) ? route('fasilitas.update', $data->id) : route('fasilitas.store') }}">
                            @csrf
                            @if (isset($data))
                                @method('PUT')
                            @endif
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama
                                    Fasilitas</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $data->nama ?? old('nama') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Deskripsi</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="{{ $data->deskripsi ?? old('deskripsi') }}"
                                        name="deskripsi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                    class="col-md-2 col-form-label form-control-label">Image</label>
                                    <div class="dropzone dropzone-multiple col-md-10" data-toggle="dropzone" data-dropzone-multiple data-dropzone-url="http://">
                                        <div class="fallback">
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFileUploadMultiple" multiple>
                                            <label class="custom-file-label" for="customFileUploadMultiple">Choose file</label>
                                          </div>
                                        </div>
                                        <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                          <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                              <div class="col-auto">
                                                <div class="avatar">
                                                  <img class="avatar-img rounded" src="..." alt="..." data-dz-thumbnail>
                                                </div>
                                              </div>
                                              <div class="col ml--3">
                                                <h4 class="mb-1" data-dz-name>...</h4>
                                                <p class="small text-muted mb-0" data-dz-size>...</p>
                                              </div>
                                              <div class="col-auto">
                                                <div class="dropdown">
                                                  <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                  </a>
                                                  <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item" data-dz-remove>
                                                      Remove
                                                    </a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </li>
                                        </ul>
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
