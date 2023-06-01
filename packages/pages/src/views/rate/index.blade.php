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

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @can('rate_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Rate List</button>
                            </li>
                        @endcan
                        @can('rate_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Rates</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Rates List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Base Rate</th>
                                                <th class="text-light" scope="col">Spread Rate</th>
                                                <th class="text-light" scope="col">Cost of Fund</th>
                                                <th class="text-light" scope="col">Yield Rate</th>
                                                <th class="text-light" scope="col">Month</th>
                                                <th class="text-light" scope="col">Year</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['rate'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $data->base_rate }}%</td>
                                                    <td>{{ $data->spread_rate }}%</td>
                                                    <td>{{ $data->cost_fund }}%</td>
                                                    <td>{{ $data->yield_rate }}%</td>
                                                    <td>
                                                        @foreach (config('nepali-months') as $val)
                                                            @if ($val['value'] == $data->month)
                                                                {{ $val['name'] }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $data->year }}</td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('rate_edit')
                                                                <a href="{{ route('rate.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('rate_delete')
                                                                <form action="{{ route('rate.destroy', $data->id) }}"
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
                                        <h5 class="input-title">Add Rates</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('rate.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="base-rate" class="input-label">Base Rate</label>
                                                    <div class="input-group has-validation">
                                                        <input type="number" min="1" step="0.01" class="form-control" id="base-rate"
                                                            name="base_rate" placeholder="Base Rate*" required>
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
                                                        <input type="number" min="1" step="0.01" class="form-control" id="yield-rate"
                                                            name="yield_rate" placeholder="Yield Rate*" required>
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
                                                        <select class="form-control" id="month-select" name="month"
                                                            required>
                                                            <option value=''>Choose Month....</option>
                                                            @foreach (config('nepali-months') as $data)
                                                                <option value={{ $data['value'] }}>{{ $data['name'] }}
                                                                </option>
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
                                                        <input type="number" min="1" step="0.01" class="form-control" id="year"
                                                        min=1 name="year" placeholder="Year*" required>
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
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
