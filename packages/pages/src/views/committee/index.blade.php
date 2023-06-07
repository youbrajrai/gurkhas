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
            <h1>Committee Management</h1>

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
                        @can('committee_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Committee
                                    List</button>
                            </li>
                        @endcan
                        @can('committee_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add Committee
                                    Member</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Committee List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Committe Level</th>
                                                <th class="text-light" scope="col">Sub Committe Level</th>
                                                <th class="text-light" scope="col">Department</th>
                                                <th class="text-light" scope="col">Name</th>
                                                <th class="text-light" scope="col">Position</th>
                                                <th class="text-light" scope="col">Joined Date</th>
                                                <th class="text-light" scope="col">Photo</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['committee'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>
                                                        {{ $data->subcommitteelevel?->committee_level?->title }}
                                                    </td>
                                                    <td>
                                                        {{ $data->subcommitteelevel?->title }}
                                                    </td>
                                                    <td>
                                                        {{ $data->user->employeeDetails?->department?->title }}
                                                    </td>
                                                    <td>
                                                        {{ $data->user?->name }}
                                                    </td>
                                                    <td>
                                                        {{ $data?->position }}
                                                    </td>
                                                    <td>{{ $data->joined_date }}</td>
                                                    <td><a target="_blank"
                                                            href="{{ url(basename(storage_path()) . '/' . $data->user?->media?->file_path) }}"><i
                                                                class="bi bi-image px-5"></i></a></td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('committee_edit')
                                                                <a href="{{ route('committee.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('committee_delete')
                                                                <form action="{{ route('committee.destroy', $data->id) }}"
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
                                        <h5 class="input-title">Add Committee Members</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('committee.store') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="committe-level" class="input-label">Committe Level</label>
                                                    <div class="input-group has-validation">
                                                        <select id="committee-level" class="form-select" required>
                                                            <option value="">Choose...</option>
                                                            @foreach ($variables['committeelevel'] as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('committee_level_id')
                                                            <div class="invalid-feedback">
                                                                Required committe-level
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="sub-committe-level" class="input-label">Sub Committe
                                                        Level</label>
                                                    <div class="input-group has-validation">
                                                        <select id="sub-committee-level" name="sub_committee_level_id"
                                                            class="form-select" required>
                                                        </select>
                                                        @error('sub_committee_level_id')
                                                            <div class="invalid-feedback">
                                                                Required sub-committe-level
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
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
                                                                required name
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="position" class="input-label">Position</label>
                                            <div class="input-group has-validation">
                                                <select id="position" name="position" class="form-select" required>
                                                    <option value="">Choose Position...</option>
                                                    <option value="Coordinator">Coordinator</option>
                                                    <option value="Member">Member</option>
                                                    <option value="Member Secretary">Member Secretary</option>
                                                </select>
                                                @error('position')
                                                    <div class="invalid-feedback">
                                                        required position
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="joined_date" class="input-label">Joined Date</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker" id="joined_date"
                                                    name="joined_date" placeholder="Joined Date**" required>
                                                @error('joined_date')
                                                    <div class="invalid-feedback">
                                                        required joined_date
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
    <script>
        $(document).ready(function() {
            $(document).on('change', '#committee-level', function() {
                console.log("change happenn");
                var committee_level_id = $(this).val();
                var div = $(this).parent();
                console.log(div);
                var op = '';
                console.log(committee_level_id);
                $.ajax({
                    type: 'get',
                    url: "{{ route('findSubCommitteeLevel') }}",
                    data: {
                        'id': committee_level_id
                    },
                    success: function(data) {
                        // console.log("sucess");
                        // console.log(data);
                        op += '<option value="0" selected disabled>Select Sub Type</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].title +
                                '</option>';
                        }
                        document.getElementById("sub-committee-level").innerHTML = op;
                    },
                    error: function(data) {}
                });
            });
        });
    </script>
@endsection
