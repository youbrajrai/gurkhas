@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Standard Tarriff Head Management</h1>
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
                                <h5 class="input-title">Edit Standard Tarriff Head</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post"
                                action="{{ route('standardterrifhead.update', $item->id) }}" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="vendor-type" class="input-label">Standard Terrif Type</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="vendor-type" name="title"
                                                    value="{{ old('title', $item->title) }}"
                                                    placeholder="Standard Terrif Type*" required>
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        Required vendor-type title
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="month" class="input-label">Month</label>
                                            <div class="input-group has-validation">
                                                <select class="form-control" id="month-select" name="month" required>
                                                    @foreach (config('nepali-months') as $data)
                                                        <option value={{ $data['value'] }}
                                                            {{ $item->month == $data['value'] ? 'selected' : '' }}>
                                                            {{ $data['name'] }}</option>
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
                                            <label for="fiscal_year" class="input-label">Fiscal Year</label>
                                            <div class="input-group has-validation">
                                                <select class="form-control" id="fiscal_year_id-select"
                                                    name="fiscal_year_id" required>
                                                    <option value="">Choose Fiscal Year...</option>
                                                    @foreach ($variables['fiscalyear'] as $data)
                                                        <option value={{ $data->id }}
                                                            {{ $item->fiscal_year_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('fiscal_year_id')
                                                    <div class="invalid-feedback">
                                                        Required fiscal_year_id
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
