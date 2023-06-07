@extends('themes.layouts.app')
@section('header')
    <style>

    </style>
@endsection


@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Vendor Category Management</h1>
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

                    <a class="text-decoration-none" href="{{ route('vendorcategory.index') }}"><button
                            class="{{ request()->id != 'create' ? 'selected' : 'nav-tabs-decoy' }}">
                            List Vendor Category</button></a>


                    <a href="{{ route('vendorcategory.index', ['id' => 'create']) }}">
                        <button class="{{ request()->id == 'create' ? 'selected' : 'nav-tabs-decoy' }}">
                            Add Vendor Category
                        </button>
                    </a>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade {{ request()->id != 'create' ? 'show active' : '' }}" id="home"
                            role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">List of Vendor Category</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Vendor Category</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['vendorcategory'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $data->title }}</td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('vendorcategory_edit')
                                                                <a href="{{ route('vendorcategory.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('vendorcategory_delete')
                                                                <form action="{{ route('vendorcategory.destroy', $data->id) }}"
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
                                        <h5 class="input-title">Add Vendor Category</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('vendorcategory.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="col-4">
                                                <label for="vendor-type" class="input-label">Vendor Category</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" class="form-control" id="vendor-category"
                                                        name="title" placeholder="Vendor Category*" required>
                                                    @error('title')
                                                        <div class="invalid-feedback">
                                                            Required vendor-category title
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
