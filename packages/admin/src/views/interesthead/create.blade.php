@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Interest Head Management</h1>
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
                                <h5 class="input-title">Add Interest Head</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post" action="{{ route('interesthead.store') }}"
                                novalidate>
                                @csrf
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="title" class="input-label">Interest Type</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Interest Head*" required>
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        Required title
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
                                                        Required month
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="year" class="input-label">Year</label>
                                            <div class="input-group has-validation">
                                                <input type="number" class="form-control" id="year" name="year"
                                                    placeholder="Year*" required>
                                                @error('year')
                                                    <div class="invalid-feedback">
                                                        Required year
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
