@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Fiscal Year Management</h1>
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
                                <h5 class="input-title">Add Fiscal Year</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post" action="{{ route('fiscalyear.store') }}"
                                novalidate>
                                @csrf
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="title" class="input-label">Fiscal Year</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Fiscal Year*" required>
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        Required title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="start_date" class="input-label">Start Date</label>
                                            <div class="input-group has-validation">
                                                <input type="date" class="form-control" id="start_date" name="start_date"
                                                    placeholder="Start Date*" required>
                                                @error('start_date')
                                                    <div class="invalid-feedback">
                                                        Required start_date
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="end_date" class="input-label">End Date</label>
                                            <div class="input-group has-validation">
                                                <input type="date" class="form-control" id="end_date" name="end_date"
                                                    placeholder="End Date*" required>
                                                @error('end_date')
                                                    <div class="invalid-feedback">
                                                        Required end_date
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
