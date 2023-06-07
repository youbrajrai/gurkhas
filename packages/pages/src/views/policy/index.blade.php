@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Policy-Product-Paper Management</h1>

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
                <div class="container-fluid">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @can('policy_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">List Policy</button>
                            </li>
                        @endcan
                        @can('policy_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Policy</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Policy-Product-Paper List</h5>
                                    </div>

                                    <section>

                                        <!--Table-->
                                        <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                            style="width:100%">
                                            <thead style="background-color: #29469d;">
                                                <tr>
                                                    <th class="text-light" scope="col">SN</th>
                                                    <th class="text-light" scope="col">Title</th>
                                                    <th class="text-light" scope="col">Desciption</th>
                                                    <th class="text-light" scope="col">Document</th>
                                                    <th class="text-light" scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($variables['policy'] as $key => $data)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ $data?->title }}</td>
                                                        <td>{!! $data?->description !!}</td>
                                                        <td><a target="_blank" class="bi bi-file-earmark-break-fill px-5"
                                                                href="{{ url(basename(storage_path()) . '/' . $data?->media?->file_path) }}"><i></i></a></td>
                                                        <td>
                                                            <div class="container-fluid d-flex">
                                                                @can('policy_edit')
                                                                    <a href="{{ route('policy.edit', $data->id) }}"><i
                                                                            class="bi bi-pencil-square"></i></a>
                                                                @endcan
                                                                @can('policy_delete')
                                                                    <form action="{{ route('policy.destroy', $data->id) }}"
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
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </section>
                                    </form>
                                    <!-- End Default Table Example -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Policy-Product Add</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('policy.store') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="title" class="input-label">Title</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="title"
                                                            name="title" required>
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                                Required title
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="document" class="input-label">Document</label>
                                                    <div class="input-group has-validation">
                                                        <input type="file" class="form-control" id="document"
                                                            name="file" placeholder="Document*" required>
                                                        @error('file')
                                                            <div class="invalid-feedback">
                                                                Required document
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid  p-2 input-container2">
                                            <div class="col-12">
                                                <label for="description" class="input-label">Description</label>
                                                <div class="input-group has-validation">
                                                    <textarea class="form-control" name="description" id="description" required></textarea>
                                                    @error('description')
                                                        <div class="invalid-feedback">
                                                            required description
                                                        </div>
                                                    @enderror

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
