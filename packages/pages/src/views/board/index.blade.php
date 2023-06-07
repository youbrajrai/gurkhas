@extends('themes.layouts.app')
@section('header')
    <style>
        .select2 {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Board Management</h1>

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
                        @can('board_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Board
                                    Members</button>
                            </li>
                        @endcan
                        @can('board_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add Board
                                    Members</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Board List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Department</th>
                                                <th class="text-light" scope="col">Name</th>
                                                <th class="text-light" scope="col">Position</th>
                                                <th class="text-light" scope="col">Joined Date</th>
                                                <th class="text-light" scope="col">Photo</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['board'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>
                                                        {{ $data->user?->employeeDetails?->department?->title }}
                                                    </td>
                                                    <td>
                                                        {{ $data->user?->name }}
                                                    </td>
                                                    <td>
                                                        {{ $data->user->employeeDetails?->position?->title }}
                                                    </td>
                                                    <td>{{ $data->joined_date }}</td>
                                                    <td><a target="_blank"
                                                            href="{{ url(basename(storage_path()) . '/' . $data->user?->media?->file_path) }}"><i
                                                                class="bi bi-image px-5"></i></a></td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('board_edit')
                                                                <a href="{{ route('board.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('board_delete')
                                                                <form action="{{ route('board.destroy', $data->id) }}"
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
                                        <h5 class="input-title">Add Board Members</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('board.store') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="name" class="input-label">Employee</label>
                                                    <div class="input-group has-validation">
                                                        <select id="name" name="user_id" class="form-select select2"
                                                            required>
                                                            <option value="">Choose Employee...</option>
                                                            @foreach ($variables['user'] as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('user_id')
                                                            <div class="invalid-feedback">
                                                                Required name
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="joined_date" class="input-label">Joined Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control date-picker"
                                                            id="joined_date" name="joined_date"
                                                            placeholder="Joined Date**" required>
                                                        @error('joined_date')
                                                            <div class="invalid-feedback">
                                                                Required joined_date
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
        $(function() {
            $('.select2').select2();
        });
    </script>
@endsection
