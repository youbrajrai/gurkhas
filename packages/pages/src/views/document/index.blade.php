@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Documents Management</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @can('document_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Document
                                    List</button>
                            </li>
                        @endcan
                        @can('document_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Document</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Documents</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Document Type</th>
                                                <th class="text-light" scope="col">Sub Document Type</th>
                                                <th class="text-light" scope="col">Document Title</th>
                                                <th class="text-light" scope="col">Document</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['document'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $data?->sub_document_type?->document_type->title }}</td>
                                                    <td>{{ $data?->sub_document_type?->title }}</td>
                                                    <td>{{ $data?->title }}</td>
                                                    <td>
                                                        @foreach ($data->media as $photo)
                                                            <a target="_blank" class="bi bi-file-earmark-break-fill px-5"
                                                                href="{{ url(basename(storage_path()) . '/' . $photo?->file_path) }}"><i></i></a>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('document_edit')
                                                                <a href="{{ route('document.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('document_delete')
                                                                <form action="{{ route('document.destroy', $data->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button
                                                                        onclick="return confirm('Do you want to delete this?')"
                                                                        style="border:none;background:none">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- End Default Table Example -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Documents</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('document.store') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="document-type" class="input-label">Document Type</label>
                                                    <div class="input-group has-validation">
                                                        <select id="document-type" class="form-select" required>
                                                            <option value="">Choose Document Type...</option>
                                                            @foreach ($variables['documenttype'] as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('document_type_id')
                                                            <div class="invalid-feedback">
                                                                required document-type
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="sub-document-type" class="input-label">Sub Type</label>
                                                    <div class="input-group has-validation">
                                                        <select id="sub-document-type" name="sub_document_type_id"
                                                            class="form-select" required>
                                                        </select>
                                                        @error('sub_document_type_id')
                                                            <div class="invalid-feedback">
                                                                required sub-document-type
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container2">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="document_title" class="input-label">Document Title</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="document_title"
                                                            name="title" placeholder="Document Title*" required>
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                                required document_title
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="file_upload" class="input-label">File Upload</label>
                                                    <div class="input-group has-validation">
                                                        <input type="file" class="form-control" id="file_upload"
                                                            name="file[]" multiple placeholder="File Upload*" required>
                                                        @error('file')
                                                            <div class="invalid-feedback">
                                                                required file_upload
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-start">
                                            <button type="submit" class="btn"
                                                style="background-color: #0b2982; color:white">Submit</button>
                                            <button type="reset" class="btn"
                                                style="background-color: #b80000; color:white">Reset</button>
                                        </div>
                                    </form><!-- Vertical Form -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#document-type', function() {
                // console.log("change happenn");
                var document_type_id = $(this).val();
                var div = $(this).parent();
                // console.log(div);
                var op = '';
                // console.log(document_type_id);
                $.ajax({
                    type: 'get',
                    url: "{{ route('findSubDocument') }}",
                    data: {
                        'id': document_type_id
                    },
                    success: function(data) {
                        // console.log("sucess");
                        // console.log(data);
                        op +=
                            '<option value="0" selected disabled>Select Sub Document Type</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].title +
                                '</option>';
                        }
                        document.getElementById("sub-document-type").innerHTML = op;
                    },
                    error: function(data) {}
                });
            });
        });
        $(document).ready(function() {
            $(document).on('change', '#document-type', function() {
                console.log("change happenn");
                var document_type_id = $(this).val();
                var div = $(this).parent();
                console.log(div);
                var op = '';
                console.log(document_type_id);
                $.ajax({
                    type: 'get',
                    url: "{{ route('findSubDocument') }}",
                    data: {
                        'id': document_type_id
                    },
                    success: function(data) {
                        // console.log("sucess");
                        // console.log(data);
                        op += '<option value="0" selected disabled>Select Sub Type</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].title +
                                '</option>';
                        }
                        document.getElementById("sub-document-type").innerHTML = op;
                    },
                    error: function(data) {}
                });
            });
        });
    </script>
@endsection
