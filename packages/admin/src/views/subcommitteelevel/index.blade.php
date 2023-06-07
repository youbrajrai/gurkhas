@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sub-Committee Level Management</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @can('subcommitteelevel_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Sub-Committee Level
                                    List</button>
                            </li>
                        @endcan
                        @can('subcommitteelevel_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add Sub-Committee Level</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">List of Sub-Committee Levels</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Sub-Committee Level</th>
                                                <th class="text-light" scope="col">Parent Committee Level</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['subcommitteelevel'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $data->title }}</td>
                                                    <td>{{ $data?->committee_level?->title }}</td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('subcommitteelevel_edit')
                                                                <a href="{{ route('subcommitteelevel.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('subcommitteelevel_delete')
                                                                <form
                                                                    action="{{ route('subcommitteelevel.destroy', $data->id) }}"
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
                                        <h5 class="input-title">Add Sub-Committee Levels</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('subcommitteelevel.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="col-4">
                                                <label for="sub-committee-level" class="input-label">Sub-Committee
                                                    Level</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" class="form-control" id="sub-committee-level"
                                                        name="title" placeholder="Sub Committee Level*" required>
                                                    @error('title')
                                                        <div class="invalid-feedback">
                                                            Required sub-sub-committee-level title
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label for="sub-committee-level" class="input-label">Committee Level</label>
                                                <div class="input-group has-validation">
                                                    <select id="sub-committee-level" name="committee_level_id"
                                                        class="form-select" required>
                                                        <option value="">Choose Committee Level...</option>
                                                        @foreach ($variables['committeelevel'] as $data)
                                                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('committee_level_id')
                                                        <div class="invalid-feedback">
                                                            Required sub-committee-level
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
            </div>
        </section>
    </main><!-- End #main -->
@endsection
