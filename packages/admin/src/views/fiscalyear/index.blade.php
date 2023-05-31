@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Fiscal Year Management</h1>

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
                        @can('fiscalyear_access')
                            <li class="nav-item" role="presentation">
                                {{-- <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Fiscal Year</button> --}}
                                <a class="text-decoration-none" href="{{ route('fiscalyear.index') }}"><button
                                        class="{{ request()->id != 'create' ? 'selected' : 'nav-tabs-decoy' }}">
                                        List Fiscal Years</button></a>
                            </li>
                        @endcan
                        @can('fiscalyear_create')
                            <a href="{{ route('fiscalyear.index', ['id' => 'create']) }}">
                                <button class="{{ request()->id == 'create' ? 'selected' : 'nav-tabs-decoy' }}">
                                    Add Fiscal Years
                                </button>
                            </a>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ request()->id != 'create' ? 'show active' : '' }}" id="home"
                            role="tabpanel" aria-labelledby="home-tab">

                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">List of Fiscal Year</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Fiscal Year</th>
                                                <th class="text-light" scope="col">Start Date</th>
                                                <th class="text-light" scope="col">End Date</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['fiscalyear'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $data->title }}</td>
                                                    <td>{{ $data->start_date }}</td>
                                                    <td>{{ $data->end_date }}</td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('fiscalyear_edit')
                                                                <a href="{{ route('fiscalyear.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('fiscalyear_delete')
                                                                <form action="{{ route('fiscalyear.destroy', $data->id) }}"
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
                        <div class="tab-pane fade {{ request()->id != 'create' ? '' : 'show active' }}" id="profile"
                            role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Fiscal Year</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('fiscalyear.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="title" class="input-label">Fiscal Year</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="title"
                                                            name="title" placeholder="Fiscal Year*" required>
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                                Required title
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="start_date" class="input-label">Start Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control date-picker"
                                                            id="start_date" name="start_date" placeholder="Start Date*"
                                                            required>
                                                        @error('start_date')
                                                            <div class="invalid-feedback">
                                                                Required start_date
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="end_date" class="input-label">End Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control date-picker"
                                                            id="end_date" name="end_date" placeholder="End Date*" required>
                                                        @error('end_date')
                                                            <div class="invalid-feedback">
                                                                Required end_date
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
            </div>
        </section>
    </main><!-- End #main -->
@endsection
