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
            <h1>Outstation Management</h1>

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
                        @can('outstation_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Outstation
                                    Employees</button>
                            </li>
                        @endcan
                        @can('outstation_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add Outstation
                                    Employees</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Outstation List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">#</th>
                                                <th class="text-light" scope="col">Employee</th>
                                                <th class="text-light" scope="col">Travel Place</th>
                                                <th class="text-light" scope="col">Out Time</th>
                                                <th class="text-light" scope="col">Estimated Time</th>
                                                <th class="text-light" scope="col">Actual Return Time</th>
                                                <th class="text-light" scope="col">Remarks</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        @php
                                            if (Auth::user()->IsAdmin) {
                                                $datas = $variables['outstation'];
                                            } else {
                                                $datas = Auth::user()
                                                    ?->outstations()
                                                    ->get();
                                            }
                                        @endphp
                                        <tbody>
                                            @foreach ($datas as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>

                                                    <td>{{ $data->user->name }}</td>
                                                    <td>{{ $data->travel_place }}</td>
                                                    <td>{{ $data->outtime }}</td>
                                                    <td>{{ $data->estimated_return_time }}</td>
                                                    <td>{{ $data->actual_return_time }}</td>
                                                    <td>{{ $data->remarks }}</td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('outstation_edit')
                                                                <a href="{{ route('outstation.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('outstation_delete')
                                                                <form action="{{ route('outstation.destroy', $data->id) }}"
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
                                    <!-- End Default Table Example -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">.
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Outstation Employees</h5>
                                    </div>
                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="Post"
                                        action="{{ route('outstation.store') }}" novalidate>
                                        @csrf
                                        @php
                                            if (Auth::user()->IsAdmin) {
                                                $users = $variables['user'];
                                            } else {
                                                $users = App\Models\User::whereHas('employeeDetails.branch', function ($query) {
                                                    $query->where('id', Auth::user()?->employeeDetails?->branch->id);
                                                })->get();
                                            }
                                        @endphp
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="employee" class="input-label">Employee</label>
                                                    <div class="input-group has-validation">
                                                        <select id="user_id" class="form-select select2" name="user_id"
                                                            required>
                                                            <option>Choose User...</option>
                                                            @foreach ($users as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            required employee
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="travel-place" class="input-label">Travel Place</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="travel-place"
                                                            name="travel_place" placeholder="Travel Place" required>
                                                        <div class="invalid-feedback">
                                                            required Travel Place
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container2">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="out-time" class="input-label">Out Time</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control date_time_picker" id="out-time"
                                                            name="outtime" value="{{old("outtime")}}" placeholder="Out Time*" required>
                                                        <div class="invalid-feedback">
                                                            required out-time
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="estimated-return-time" class="input-label">Estimiated
                                                        Return
                                                        Time</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control date_time_picker"
                                                            id="estimated-return-time" name="estimated_return_time" value="{{old("estimated_return_time")}}"
                                                            placeholder="Estimiated Return Time*" required>
                                                        <div class="invalid-feedback">
                                                            required estimated-return-time
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="actual-return-time" class="input-label">Actual Return
                                                        Time</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control date_time_picker"
                                                            id="actual-return-time" name="actual_return_time" value="{{old("actual_return_time")}}"
                                                            placeholder="Actual Return Time">
                                                        <div class="invalid-feedback">
                                                            required actual-return-time
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="col-4">
                                                <label for="remarks" class="input-label">Remarks</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" class="form-control" id="remarks"
                                                        name="remarks" placeholder="Remarks*" required>
                                                    <div class="invalid-feedback">
                                                        required remarks
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
