@extends('themes.layouts.app')

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

                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-center mb-3">
                                <h5 class="input-title">Add Outstation Employees</h5>
                            </div>
                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="Post" action="{{ route('outstation.store') }}"
                                novalidate>
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
                                                <select id="user_id" class="form-select select2" name="user_id" required>
                                                    <option>Choose User...</option>
                                                    @foreach ($users as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
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
                                                <input type="time" class="form-control" id="out-time" name="outtime"
                                                    placeholder="Out Time*" required>
                                                <div class="invalid-feedback">
                                                    required out-time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="estimated-return-time" class="input-label">Estimiated Return
                                                Time</label>
                                            <div class="input-group has-validation">
                                                <input type="time" class="form-control" id="estimated-return-time"
                                                    name="estimated_return_time" placeholder="Estimiated Return Time*"
                                                    required>
                                                <div class="invalid-feedback">
                                                    required estimated-return-time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="actual-return-time" class="input-label">Actual Return Time</label>
                                            <div class="input-group has-validation">
                                                <input type="time" class="form-control" id="actual-return-time"
                                                    name="actual_return_time" placeholder="Actual Return Time*">
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
                                            <input type="text" class="form-control" id="remarks" name="remarks"
                                                placeholder="Remarks*" required>
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
        </section>
    </main><!-- End #main -->
@endsection
@section('footer')
    <script>
        $(function() {
            $('.select2').select2();
            $('.select-all').click(function() {
                let val = $(this).parent().siblings('select');
                if (val) {
                    val.children().prop("selected", "selected");
                    val.trigger("change");
                }
            })
            $('.deselect-all').click(function() {
                let val = $(this).parent().siblings('select');
                if (val) {
                    val.children().removeAttr("selected");
                    val.trigger("change");
                }
            })
        });
    </script>
@endsection
