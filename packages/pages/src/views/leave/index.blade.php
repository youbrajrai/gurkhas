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
            <h1>Leave Management</h1>

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
                        @can('leave_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">List Leave</button>
                            </li>
                        @endcan
                        @can('leave_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Leave</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Employee on Leave List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Branch</th>
                                                <th class="text-light" scope="col">Staff Name</th>
                                                <th class="text-light" scope="col">Leave From</th>
                                                <th class="text-light" scope="col">Leave To</th>
                                                <th class="text-light" scope="col">Leave Type</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        @php
                                            if (Auth::user()->IsAdmin) {
                                                $datas = $variables['leave'];
                                            } else {
                                                $datas = Auth::user()
                                                    ?->leaves()
                                                    ->get();
                                            }
                                        @endphp
                                        <tbody>
                                            @foreach ($datas as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $data->user->employeeDetails?->branch?->title }}</td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td>
                                                        @php
                                                            $date = \Carbon\Carbon::parse($data->leave_from);
                                                            $dc = new \Nilambar\NepaliDate\NepaliDate();
                                                            $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
                                                            echo $nd['year'] . '-' . $nd['month'] . '-' . $nd['day'];
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            $date = \Carbon\Carbon::parse($data->leave_to);
                                                            $dc = new \Nilambar\NepaliDate\NepaliDate();
                                                            $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
                                                            echo $nd['year'] . '-' . $nd['month'] . '-' . $nd['day'];
                                                        @endphp
                                                    </td>
                                                    <td>{{ $data->leave_type }}</td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('leave_edit')
                                                                <a href="{{ route('leave.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('leave_delete')
                                                                <form action="{{ route('leave.destroy', $data->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button
                                                                        onclick="return confirm('Do you want to delete this?')"
                                                                        style="border:none;background:none">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                            <div class="container-fluid d-flex">
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
                                        <h5 class="input-title">Register Leave</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('leave.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="staffname" class="input-label">Staff Name</label>
                                                    <div class="input-group has-validation">
                                                        @php
                                                            if (Auth::user()->IsAdmin) {
                                                                $users = $variables['user'];
                                                            } else {
                                                                $users = App\Models\User::whereHas('employeeDetails.branch', function ($query) {
                                                                    $query->where('id', Auth::user()?->employeeDetails?->branch->id);
                                                                })->get();
                                                            }
                                                        @endphp
                                                        <select id="staffname" class="form-select select2" name="user_id"
                                                            required>
                                                            <option value="">Choose Staff Name...</option>
                                                            @foreach ($users as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('user_id[]')
                                                            <div class="invalid-feedback">
                                                                Required staff name
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="leave-type" class="input-label">Leave Type</label>
                                                    <div class="input-group has-validation">
                                                        <select id="leave-type" class="form-select" name="leave_type"
                                                            required>
                                                            <option value="">Choose Leave Type...</option>
                                                            <option value="paid">Paid</option>
                                                            <option value="unpaid">UnPaid</option>
                                                            <option value="sick">Sick</option>
                                                        </select>
                                                        @error('leave_type')
                                                            <div class="invalid-feedback">
                                                                required leave-type
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="leave-from" class="input-label">Leave From</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="nepali-leave-from"
                                                               placeholder="Leave From*" required>
                                                        @error('leave_from')
                                                        <div class="invalid-feedback">
                                                            required leave-from
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group has-validation">
                                                        <input type="date" class="form-control" id="leave-from" name="leave_from"
                                                               value="{{ old('leave_from') }}"
                                                               placeholder="Leave From*" required readonly>
                                                        @error('leave_from')
                                                        <div class="invalid-feedback">
                                                            required leave-from
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="leave-to" class="input-label">Leave To</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="nepali-leave-to"
                                                               placeholder="Leave To*" required>
                                                        @error('leave_to')
                                                        <div class="invalid-feedback">
                                                            required leave-to
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group has-validation">
                                                        <input type="date" class="form-control" id="leave-to" name="leave_to"
                                                               value="{{ old('leave_to') }}" placeholder="Leave To*"
                                                               required readonly>
                                                        @error('leave_to')
                                                        <div class="invalid-feedback">
                                                            required leave-to
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
    <script>
        $('#nepali-leave-from').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#nepali-leave-from').on("dateChange", function(event) {

            let formattedDate = getDate(event.datePickerData.adDate); // Format the date as YYYY-MM-DD

            $('#leave-from').val(formattedDate)
        });
        $('#nepali-leave-to').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#nepali-leave-to').on("dateChange", function(event) {

            let formattedDate = getDate(event.datePickerData.adDate);  // Format the date as YYYY-MM-DD

            $('#leave-to').val(formattedDate)
        });
    </script>
@endsection
