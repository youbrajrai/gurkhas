@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Insurance Management</h1>

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
                        @can('insurance_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Insurance
                                    List</button>
                            </li>
                        @endcan
                        @can('insurance_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Insurance Policy</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Insurance List</h5>
                                    </div>

                                    <section style="min-height: 30vw">

                                        <!--Table-->
                                        <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                            style="width:100%">
                                            <!--Table head-->
                                            <thead style="background-color: #29469d;">
                                                <tr>
                                                    <th class="text-light" scope="col">SN</th>
                                                    <th class="text-light" scope="col">Branch</th>
                                                    <th class="text-light" scope="col">Insurance Name</th>
                                                    <th class="text-light" scope="col">Insurance Amount</th>
                                                    <th class="text-light" scope="col">Insurance Company</th>
                                                    <th class="text-light" scope="col">Insurance Start Date</th>
                                                    <th class="text-light" scope="col">Insurance Expiry Date</th>
                                                    <th class="text-light" scope="col">Insurance File</th>
                                                    <th class="text-light" scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    if (Auth::user()->IsAdmin) {
                                                        $datas = $variables['insurance'];
                                                    } else {
                                                        $datas = Auth::user()
                                                            ?->employeeDetails?->branch?->insurances()
                                                            ->get();
                                                    }
                                                @endphp
                                                @foreach ($datas as $key => $data)
                                                    <tr>
                                                        <th scope="row">{{ $key + 1 }}</th>
                                                        <td>{{ $data?->branch->title }}</td>
                                                        <td>{{ $data?->name }}</td>
                                                        <td>{{ $data?->insurance_amount }}</td>
                                                        <td>{{ $data?->insurance_company }}</td>
                                                        <td>
                                                            @php
                                                                $date = \Carbon\Carbon::parse($data->insurance_start_date);
                                                                $dc = new \Nilambar\NepaliDate\NepaliDate();
                                                                $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
                                                                echo $nd['year'] . '-' . $nd['month'] . '-' . $nd['day'];
                                                            @endphp
                                                        </td>
                                                        <td>
                                                            @php
                                                                $date = \Carbon\Carbon::parse($data->insurance_expiry_date);
                                                                $dc = new \Nilambar\NepaliDate\NepaliDate();
                                                                $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
                                                                echo $nd['year'] . '-' . $nd['month'] . '-' . $nd['day'];
                                                            @endphp
                                                        </td>
                                                        <td><a target="_blank"
                                                                href="{{ url(basename(storage_path()) . '/' . $data?->media?->file_path) }}"><i
                                                                    class="bi bi-file-earmark-break-fill px-5"></i></a></td>
                                                        <td>
                                                            <div class="container-fluid d-flex">
                                                                @can('insurance_edit')
                                                                    <a href="{{ route('insurance.edit', $data->id) }}"><i
                                                                            class="bi bi-pencil-square"></i></a>
                                                                @endcan
                                                                @can('insurance_delete')
                                                                    <form action="{{ route('insurance.destroy', $data->id) }}"
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

                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Insurance Policy</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" action='{{ route('insurance.store') }}'
                                        method="post" enctype="multipart/form-data" novalidate>
                                        @csrf

                                        <div class="container-fluid  p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="insurance_name" class="input-label">Insurance Name</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" name="name"
                                                            id="insurance_name" placeholder="Insurance Name*" required>
                                                        @error('name')
                                                            <div class="invalid-feedback d-block">
                                                                required insurance_name
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="Branch" class="input-label">Branch</label>
                                                    <div class="input-group has-validation">
                                                        @if (Auth::user()->IsAdmin)
                                                            <select id="Branch" class="form-select" name="branch_id"
                                                                required>
                                                                <option value="">Choose Branch...</option>
                                                                @foreach ($variables['branch'] as $data)
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select id="Branch" class="form-select" name="branch_id"
                                                                required>
                                                                <option
                                                                    value="{{ Auth::user()->employeeDetails->branch->id }}">
                                                                    {{ Auth::user()->employeeDetails->branch->title }}
                                                                </option>
                                                            </select>
                                                        @endif
                                                        @error('branch_id')
                                                            <div class="invalid-feedback d-block">
                                                                required Branch
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="container-fluid  p-2 input-container2">
                                            <div class="col-8">
                                                <label for="file_upload" class="input-label">Insurance File Upload</label>
                                                <div class="input-group has-validation">
                                                    <input type="file" class="form-control" id="file_upload"
                                                        name="file" placeholder="Insurance File Upload*" required>
                                                    @error('file')
                                                        <div class="invalid-feedback">
                                                            Required file_upload
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container-fluid  p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="insurance_amount" class="input-label">Insurance
                                                        Amount</label>
                                                    <div class="input-group has-validation">
                                                        <input type="number" min="1" step="0.01"
                                                            class="form-control" name="insurance_amount"
                                                            id="insurance_amount" placeholder="Insurance Amount*"
                                                            required>
                                                        @error('insurance_amount')
                                                            <div class="invalid-feedback d-block">
                                                                required insurance_amount
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="insurance_company" class="input-label">Insurance
                                                        Company</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control"
                                                            name="insurance_company" id="insurance_company"
                                                            placeholder="Insurance Company*" required>
                                                        @error('insurance_company')
                                                            <div class="invalid-feedback d-block">
                                                                required insurance_company
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid  p-2 input-container2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="insurance_start_date" class="input-label">Issued
                                                        On</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="nepali-start-date"
                                                            placeholder="Insurance Start date*" required>
                                                        @error('insurance_start_date')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group has-validation">
                                                        <input type="date" class="form-control"
                                                            name="insurance_start_date" id="start-date"
                                                            placeholder="Insurance Start date*" required readonly>
                                                        @error('insurance_start_date')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="insurance_expiry_date" class="input-label">Expires
                                                        On</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="nepali-end-date"
                                                            placeholder="Insurance Expiry date*" required>
                                                        @error('insurance_expiry_date')
                                                            <div class="invalid-feedback d-block">
                                                                required insurance_expiry_date
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group has-validation">
                                                        <input type="date" class="form-control"
                                                            name="insurance_expiry_date" id="end-date"
                                                            placeholder="Insurance Expiry date*" required readonly>
                                                        @error('insurance_expiry_date')
                                                            <div class="invalid-feedback d-block">
                                                                required insurance_expiry_date
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
        $('#nepali-start-date').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#nepali-start-date').on("dateChange", function(event) {

            let formattedDate = getDate(event.datePickerData.adDate); // Format the date as YYYY-MM-DD

            $('#start-date').val(formattedDate)
        });
        $('#nepali-end-date').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#nepali-end-date').on("dateChange", function(event) {

            let formattedDate = getDate(event.datePickerData.adDate); // Format the date as YYYY-MM-DD

            $('#end-date').val(formattedDate)
        });
    </script>
@endsection
