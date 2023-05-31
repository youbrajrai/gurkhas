@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Notices Management</h1>

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
                                <h5 class="input-title">Add Notices</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post" action="{{ route('notice.store') }}"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="notice-title" class="input-label">Notice Title</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="notice-title" name="title"
                                                    placeholder="Notice Title*" required>
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        required File
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="date" class="input-label">File</label>
                                            <div class="input-group has-validation">
                                                <input type="file" class="form-control" id="File" name="file"
                                                    placeholder="File*" required>
                                                @error('file')
                                                    <div class="invalid-feedback">
                                                        required File
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="date" class="input-label">Date</label>
                                            <div class="input-group has-validation">
                                                <input type="date" class="form-control" id="on_date" name="on_date"
                                                    placeholder="Date*" required>
                                                @error('on_date')
                                                    <div class="invalid-feedback">
                                                        required on_date
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="notice-type" class="input-label">Notice Type</label>
                                            <div class="input-group has-validation">
                                                <select id="notice-type" name="notice_type_id" class="form-select" required>
                                                    <option value="">Choose Notice Type...</option>
                                                    @foreach ($variables['noticetype'] as $data)
                                                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('notice_type_id')
                                                    <div class="invalid-feedback">
                                                        required notice type
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container2">
                                    <label for="description" class="input-label">Description</label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="description" id="description" name="description" required></textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                required description
                                            </div>
                                        @enderror

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
        CKEDITOR.replace('description');
    </script>
@endsection
