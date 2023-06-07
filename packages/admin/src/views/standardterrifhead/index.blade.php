@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Standard Tarriff Head Management</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @can('standardterrifhead_access')
                            <li class="nav-item" role="presentation">
                                <a class="text-decoration-none" href="{{ route('standardterrifhead.index') }}"><button
                                        class="{{ request()->id != 'create' ? 'selected' : 'nav-tabs-decoy' }}">
                                        List Standard Tarriff Head</button></a>
                            </li>
                        @endcan
                        @can('standardterrifhead_create')
                            <a href="{{ route('standardterrifhead.index', ['id' => 'create']) }}">
                                <button class="{{ request()->id == 'create' ? 'selected' : 'nav-tabs-decoy' }}">
                                    Add Standard Tarriff Head
                                </button>
                            </a>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ request()->id != 'create' ? 'show active' : '' }}" id="home"
                            role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">List of Standard Tarriff Head</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table table-striped table-hover">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Standard Tarriff Head</th>
                                                <th class="text-light" scope="col">Month</th>
                                                <th class="text-light" scope="col">Fiscal Year</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @dd($variables['standardterrifhead']) --}}
                                            @foreach ($variables['standardterrifhead'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $data->title }}</td>
                                                    <td>
                                                        @foreach (config('nepali-months') as $item)
                                                            @if ($data->month == $item['value'])
                                                                {{ $item['name'] }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $data->fiscal_year->title }}</td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('standardterrifhead_edit')
                                                                <a href="{{ route('standardterrifhead.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('standardterrifhead_delete')
                                                                <form
                                                                    action="{{ route('standardterrifhead.destroy', $data->id) }}"
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
                        <div class="tab-pane fade {{ request()->id != 'create' ? '' : 'show active' }}" id="profile"
                            role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Standard Terrif Head</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('standardterrifhead.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="title" class="input-label">Interest Type</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="title"
                                                            name="title" placeholder="Standard Terrif Head*" required>
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
                                                        <select class="form-control" id="month-select" name="month"
                                                            required>
                                                            @foreach (config('nepali-months') as $data)
                                                                <option value={{ $data['value'] }}>{{ $data['name'] }}
                                                                </option>
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
                                                        <select class="form-control" id="fiscal_year_id"
                                                            name="fiscal_year_id" required>
                                                            <option value="">Choose Fiscal Year...</option>
                                                            @foreach ($variables['fiscalyear'] as $item)
                                                                <option value={{ $item->id }}>{{ $item->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('fiscal_year_id')
                                                            <div class="invalid-feedback">
                                                                Required fiscal_year_id
                                                            </div>
                                                        @enderror
                                                        @can('fiscalyear_create')
                                                            <a class=""
                                                                href="{{ route('fiscalyear.index', ['id' => 'create']) }}"><i
                                                                    class="bi bi-node-plus-fill"
                                                                    style="font-size:32px; color:green;"></i></a>
                                                        @endcan
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
            </div>
        </section>
    </main><!-- End #main -->
@endsection
