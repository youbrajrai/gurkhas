@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Rates Management</h1>

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
                                <h5 class="input-title">Add Rates</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post" action="{{ route('rate.store') }}"
                                novalidate>
                                @csrf
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="base-rate" class="input-label">Base Rate</label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="1" step="0.01" class="form-control" id="base-rate" name="base_rate"
                                                    placeholder="Base Rate*" required>
                                                @error('base_rate')
                                                    <div class="invalid-feedback">
                                                        required base-rate
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="spread-rate" class="input-label">Spread Rate</label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="1" step="0.01" class="form-control" id="spread-rate"
                                                    name="spread_rate" placeholder="Spread Rate*" required>
                                                @error('spread_rate')
                                                    <div class="invalid-feedback">
                                                        required spread-rate
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="cost-of-fund" class="input-label">Cost of Fund</label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="1" step="0.01" class="form-control" id="cost-of-fund"
                                                    name="cost_fund" placeholder="Cost of Fund*" required>
                                                @error('cost_fund')
                                                    <div class="invalid-feedback">
                                                        required cost-of-fund
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container2">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="yield-rate" class="input-label">Yield Rate</label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="1" step="0.01" class="form-control" id="yield-rate" name="yield_rate"
                                                    placeholder="Yield Rate*" required>
                                                @error('yield_rate')
                                                    <div class="invalid-feedback">
                                                        required yield-rate
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="month" class="input-label">Month</label>
                                            <div class="input-group has-validation">
                                                <select class="form-control" id="month-select" name="month" required>
                                                    @foreach (config('nepali-months') as $data)
                                                        <option value={{ $data['value'] }}>{{ $data['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('month')
                                                    <div class="invalid-feedback">
                                                        required Month
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="year" class="input-label">Year</label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="1" step="0.01" class="form-control" id="year" name="year"
                                                    placeholder="Year*" required>
                                                @error('year')
                                                    <div class="invalid-feedback">
                                                        required Year
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
        </section>
    </main><!-- End #main -->
@endsection
