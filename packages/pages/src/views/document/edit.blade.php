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

                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-center mb-3">
                                <h5 class="input-title">Edit Documents</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post"
                                action="{{ route('document.update', $item->id) }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="document-type" class="input-label">Document Type</label>
                                            <div class="input-group has-validation">
                                                <select id="document-type" class="form-select" required>
                                                    <option value="">Choose...</option>
                                                    @foreach ($variables['documenttype'] as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $item->sub_document_type->document_type->id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->title }}</option>
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
                                            <label for="sub-type" class="input-label">Sub Document Type</label>
                                            <div class="input-group has-validation">
                                                <select id="sub-document-type" name="sub_document_type_id"
                                                    class="form-select" required>
                                                    <option value="">Choose Sub Document Type...</option>
                                                    @foreach ($variables['subdocumenttype'] as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $item->sub_document_type_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sub_document_type_id')
                                                    <div class="invalid-feedback">
                                                        required sub-type
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
                                                    value="{{ old('title', $item->title) }}" name="title"
                                                    placeholder="Document Title*" required>
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
                                                <input type="file" class="form-control" id="file_upload" name="file[]"
                                                    multiple placeholder="File Upload*">
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
    </script>
@endsection
