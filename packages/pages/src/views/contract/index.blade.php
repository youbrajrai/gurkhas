@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Contract Management</h1>

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
                        @can('contract_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Contract
                                    List</button>
                            </li>
                        @endcan
                        @can('contract_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Contracts</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Contract List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Contract Name</th>
                                                <th class="text-light" scope="col">Agreement Date</th>
                                                <th class="text-light" scope="col">Expiry Date</th>
                                                <th class="text-light" scope="col">Remarks</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['contract'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $data->name }}</td>
                                                    <td>
                                                        @php
                                                            $date = \Carbon\Carbon::parse($data->agreement_date);
                                                            $dc = new \Nilambar\NepaliDate\NepaliDate();
                                                            $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
                                                            echo $nd['year'] . '-' . $nd['month'] . '-' . $nd['day'];
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            $date = \Carbon\Carbon::parse($data->expiry_date);
                                                            $dc = new \Nilambar\NepaliDate\NepaliDate();
                                                            $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
                                                            echo $nd['year'] . '-' . $nd['month'] . '-' . $nd['day'];
                                                        @endphp

                                                    </td>
                                                    <td>{!! $data->remarks !!}</td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('contract_edit')
                                                                <a href="{{ route('contract.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('contract_delete')
                                                                <form action="{{ route('contract.destroy', $data->id) }}"
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
                                        <h5 class="input-title">Add Contract</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('contract.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="name" class="input-label">Name</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Name*" required>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                Required name
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="agreement_date" class="input-label">Agreement Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control"
                                                            id="nepali_agreement_date" placeholder="Agreement Date*"
                                                            required>
                                                        @error('agreement_date')
                                                            <div class="invalid-feedback">
                                                                required agreement_date
                                                            </div>
                                                        @enderror
                                                        <div class="input-group has-validation">
                                                            <input type="date" class="form-control"
                                                                id="agreement_date" name="agreement_date"
                                                                placeholder="Agreement Date*" required readonly>
                                                            @error('agreement_date')
                                                                <div class="invalid-feedback">
                                                                    required agreement_date
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="expiry_date" class="input-label">Expiry Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control"
                                                            id="nepali_expiry_date" placeholder="Expiry Date*" required>
                                                    </div>
                                                    <div class="input-group has-validation">
                                                        <input type="date" class="form-control" id="expiry_date"
                                                            name="expiry_date" placeholder="Expiry Date*" required
                                                            readonly>
                                                        @error('expiry_date')
                                                            <div class="invalid-feedback">
                                                                Required expiry_date
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="remarks" class="input-label">Remarks</label>
                                                    <div class="input-group has-validation">
                                                        <textarea class="form-control" name="remarks" id="remarks" required></textarea>
                                                        @error('remarks')
                                                            <div class="invalid-feedback">
                                                                required remarks
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
        $('#nepali_agreement_date').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#nepali_agreement_date').on("dateChange", function(event) {

            let formattedDate = getDate(event.datePickerData.adDate); // Format the date as YYYY-MM-DD

            $('#agreement_date').val(formattedDate)
        });
        $('#nepali_expiry_date').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#nepali_expiry_date').on("dateChange", function(event) {

            let formattedDate = getDate(event.datePickerData.adDate); // Format the date as YYYY-MM-DD

            $('#expiry_date').val(formattedDate)
        });
    </script>
@endsection
