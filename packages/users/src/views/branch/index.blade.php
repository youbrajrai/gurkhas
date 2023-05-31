@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Branch Management</h1>

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
                        @can('branch_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Branch List</button>
                            </li>
                        @endcan
                        @can('branch_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Branch</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Branch List</h5>
                                    </div>

                                    <section>
                                        <div class="table-responsive text-nowrap">
                                            <!--Table-->
                                            <table class="table text-nowrap table-striped" id="table"
                                                class="display nowrap" style="width:100%">
                                                <thead style="background-color: #29469d;">
                                                    <tr>
                                                        <th class="text-light" scope="col">SN</th>
                                                        <th class="text-light" scope="col">Branch Code</th>
                                                        <th class="text-light" scope="col">Branch Name</th>
                                                        <th class="text-light" scope="col">Location</th>
                                                        <th class="text-light" scope="col">Google Map</th>
                                                        <th class="text-light" scope="col">Branch Manager</th>
                                                        <th class="text-light" scope="col">Contact No.</th>
                                                        <th class="text-light" scope="col">Fax No.</th>
                                                        <th class="text-light" scope="col">Email Id</th>
                                                        <th class="text-light" scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($variables['branch'] as $key => $data)
                                                        <tr>
                                                            <th scope="row">{{ $key + 1 }}</th>
                                                            <td>{{ $data?->branch_code }}</td>
                                                            <td>{{ $data?->title }}</td>
                                                            <td>
                                                                @foreach (config('province') as $val)
                                                                    @if ($val['value'] == $data?->province)
                                                                        {{ $val['name'] }}
                                                                    @endif
                                                                @endforeach
                                                                ,{{ $data?->district }},{{ $data?->local_body }},{{ $data?->ward_no }}
                                                            </td>
                                                            <td>{{ $data?->link }}</td>
                                                            <td>{{ $data?->branch_manager?->user->name }}</td>
                                                            <td>{{ $data?->contact_no }}</td>
                                                            <td>{{ $data?->fax_no }}</td>
                                                            <td>{{ $data?->email }}</td>
                                                            <td>
                                                            <div class="container-fluid d-flex">
                                                                @can('branch_edit')
                                                                    <a href="{{ route('branch.edit', $data->id) }}"><i
                                                                            class="bi bi-pencil-square"></i></a>
                                                                @endcan
                                                                @can('branch_delete')
                                                                    <form action="{{ route('branch.destroy', $data->id) }}"
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
                                    </section>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Branches</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('branch.store') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="branch-cpde" class="input-label">Branch Code</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="branch_code"
                                                            name="branch_code" placeholder="Branch Code*" required>
                                                        @error('branch_code')
                                                            <div class="invalid-feedback">
                                                                required branch-cpde
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="branch-name" class="input-label">Branch Name</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="title"
                                                            name="title" placeholder="Branch Name*" required>
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                                required branch-name
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="link" class="input-label">Google Map</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="link"
                                                            name="link" placeholder="Google Map*" required>
                                                        @error('link')
                                                            <div class="invalid-feedback">
                                                                required link
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="col-4">
                                                    <label for="image" class="input-label">Branch Image</label>
                                                    <div class="input-group has-validation">
                                                        <input type="file" class="form-control" id="file"
                                                            name="file" placeholder="Image*" required>
                                                        @error('file')
                                                            <div class="invalid-feedback">
                                                                required image
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container2">
                                            <div class="row">
                                                <label for="location" class="input-label">Location</label>
                                                <div class="col-3">
                                                    <div class="input-group has-validation">
                                                        <select id="province" class="form-select" name="province"
                                                            required>
                                                            <option value="">Choose province...</option>
                                                            @foreach (config('province') as $val)
                                                                <option value={{ $val['value'] }}>{{ $val['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('province')
                                                            <div class="invalid-feedback">
                                                                required province
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="district"
                                                            name="district" placeholder="District*" required>
                                                        @error('district')
                                                            <div class="invalid-feedback">
                                                                required district
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="local_body"
                                                            name="local_body" placeholder="Local body*" required>
                                                        @error('local_body')
                                                            <div class="invalid-feedback">
                                                                required local-body
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group has-validation">
                                                        <input type="number" class="form-control" id="ward_no"
                                                            name="ward_no" placeholder="Ward no*" required>
                                                        @error('ward_no')
                                                            <div class="invalid-feedback">
                                                                required ward-no
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="contact_no" class="input-label">Contact No.</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="contact_no"
                                                            name="contact_no" placeholder="Contact No.*" required>
                                                        @error('contact_no')
                                                            <div class="invalid-feedback">
                                                                required contact_no
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="fax_no" class="input-label">Fax No.</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="fax_no"
                                                            name="fax_no" placeholder="Fax No.*" required>
                                                        @error('fax_no')
                                                            <div class="invalid-feedback">
                                                                required fax_no
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="mail_id" class="input-label">Mail ID</label>
                                                    <div class="input-group has-validation">
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="Mail ID*" required>
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                required mail_id
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
        </section>
    </main><!-- End #main -->
@endsection
