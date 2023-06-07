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

                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-center mb-3">
                                <h5 class="input-title">Add Loan and Deposit</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post" action="{{ route('loandeposit.store') }}"
                                novalidate>
                                @csrf
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="Branch" class="input-label">Branch</label>
                                            <div class="input-group has-validation">
                                                @if (Auth::user()->IsAdmin)
                                                    <select id="Branch" class="form-select" name="branch_id" required>
                                                        <option value="">Choose Branch...</option>
                                                        @foreach ($variables['branch'] as $data)
                                                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select id="Branch" class="form-select" name="branch_id" required>
                                                        <option value="{{ Auth::user()->employeeDetails->branch->id }}">
                                                            {{ Auth::user()->employeeDetails->branch->title }}</option>
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
                                            <label for="loan_issued" class="input-label">Loan Issued</label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="1" step="0.01" class="form-control" id="loan_issued"
                                                    name="loan_issued" placeholder="Loan Issued*" required>
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
                                                <input type="number" min="1" step="0.01" class="form-control" id="deposit" name="deposit"
                                                    placeholder="Deposit*" required>
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
                                            <label for="created_date" class="input-label">Date</label>
                                            <div class="input-group has-validation">
                                                <input type="date" class="form-control" id="created_date"
                                                    name="created_date" placeholder="Date*" required>
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
        </section>
    </main><!-- End #main -->
@endsection
