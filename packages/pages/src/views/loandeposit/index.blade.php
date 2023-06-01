@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Loan and Deposit Management</h1>

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
                                    type="button" role="tab" aria-controls="home" aria-selected="true">View List</button>
                            </li>
                        @endcan
                        @can('insurance_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Loan & Deposit</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Loan and Deposit List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Date</th>
                                                <th class="text-light" scope="col">Branch</th>
                                                <th class="text-light" scope="col">Loan</th>
                                                <th class="text-light" scope="col">Deposit</th>

                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        @php
                                            if (Auth::user()->IsAdmin) {
                                                $datas = $variables['loandeposit'];
                                            } else {
                                                $datas = Auth::user()
                                                    ?->employeeDetails?->branch?->loanDeposite()
                                                    ->get();
                                            }
                                        @endphp
                                        <tbody>
                                            @foreach ($datas as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>
                                                        @php
                                                            $date = \Carbon\Carbon::parse($data->created_date);
                                                            $dc = new \Nilambar\NepaliDate\NepaliDate();
                                                            $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
                                                            echo $nd['year'] . '-' . $nd['month'] . '-' . $nd['day'];
                                                        @endphp
                                                    </td>
                                                    <td>{{ $data->branch?->title }}</td>
                                                    <td>{{ $data->loan_issued }}</td>
                                                    <td>{{ $data->deposit }}</td>

                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('loandeposit_edit')
                                                                <a href="{{ route('loandeposit.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('loandeposit_delete')
                                                                <form action="{{ route('loandeposit.destroy', $data->id) }}"
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
                                        <h5 class="input-title">Add Loan and Deposit</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('loandeposit.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="Branch" class="input-label">Branch</label>
                                                    <div class="input-group has-validation">
                                                        @if (Auth::user()->IsAdmin)
                                                            <select id="Branch" class="form-select" name="branch_id"
                                                                required>
                                                                <option value="">Choose Branch...</option>
                                                                @foreach ($variables['branch'] as $data)
                                                                    <option value="{{ $data->id }}">{{ $data->title }}
                                                                    </option>
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
                                                <div class="col-4">
                                                    <label for="loan_issued" class="input-label">Loan</label>
                                                    <div class="input-group has-validation">
                                                        <input type="number" min="1" step="0.01" class="form-control" id="loan_issued"
                                                            name="loan_issued" placeholder="Loan*" required>
                                                        @error('loan_issued')
                                                            <div class="invalid-feedback">
                                                                required loan_issued
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="deposit" class="input-label">Deposit</label>
                                                    <div class="input-group has-validation">
                                                        <input type="number" min="1" step="0.01" class="form-control" id="deposit"
                                                            name="deposit" placeholder="Deposit*" required>
                                                        @error('deposit')
                                                            <div class="invalid-feedback">
                                                                required deposit
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container2">
                                            <div class="row">

                                                <div class="col-4">
                                                    <label for="created_date" class="input-label">Nepali Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control"
                                                            id="created_date_nepali" name="nepali_date"
                                                            placeholder="Date*" required>
                                                        @error('created_date')
                                                            <div class="invalid-feedback">
                                                                required Date
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="created_date" class="input-label">English Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="created_date"
                                                            name="created_date" readonly placeholder="Date*" required>
                                                        @error('created_date')
                                                            <div class="invalid-feedback">
                                                                required Date
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
        $('#created_date_nepali').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#created_date_nepali').on("dateChange", function(event) {

            var formattedDate = event.datePickerData.adDate.toISOString().substr(0,
                10); // Format the date as YYYY-MM-DD

            $('#created_date').val(formattedDate)
        });
    </script>
@stop
