@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Standard Tarriff Management</h1>

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
                        @can('standardterrif_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">List Standard
                                    Tarriff</button>
                            </li>
                        @endcan
                        @can('standardterrif_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add Standard
                                    Tarriff</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Standard Tarriff List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <div class="container-fluid"
                                        style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
                                        <div class="container card mb-4 bg-light">
                                            @php
                                                $years = $standard_terrif_heads->pluck('fiscal_year')->unique()->sortByDesc(function ($item) { return $item->title;});
                                            @endphp
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($years as $year)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $year->id }}">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $year->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $year->id }}">
                                                                {{ $year->title }} Year
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $year->id }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $year->id }}"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                @foreach ($standard_terrif_heads as $data)
                                                                    @if ($data->fiscal_year_id == $year?->id)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="heading{{ $data->id }}st">
                                                                                <button class="accordion-button collapsed"
                                                                                    type="button" data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapse{{ $data->id }}st"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse{{ $data->id }}st">
                                                                                    {{ $data->title }}
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapse{{ $data->id }}st"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="heading{{ $data->id }}st"
                                                                                data-bs-parent="#collapse{{ $data->id }}st">
                                                                                <div class="accordion-body">
                                                                                    <div class="container-fluid">
                                                                                        @if ($data->standard_terrif)
                                                                                            @foreach ($data->standard_terrif as $val)
                                                                                                <div
                                                                                                    class="container-fluid py-2 px-0 m-0">
                                                                                                    <div
                                                                                                        class="row justify-content-start py-4 px-2">
                                                                                                        <div class="col-3">
                                                                                                            <h4 class="text-capitalize"
                                                                                                                style="color: #29469d">
                                                                                                                @foreach (config('SOC-types') as $type)
                                                                                                                    @if ($type['value'] == $val->type)
                                                                                                                        {{ $type['name'] }}
                                                                                                                    @endif
                                                                                                                @endforeach

                                                                                                                <h4>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="container-fluid p-0 m-0 d-flex">
                                                                                                        @can('standardterrif_edit')
                                                                                                            <a
                                                                                                                href="{{ route('standardterrif.edit', $val->id) }}"><button
                                                                                                                    type="submit"
                                                                                                                    class="btn fw-semibold"
                                                                                                                    style="background-color: #0b2982; color:white">Edit</button></a>
                                                                                                        @endcan
                                                                                                        @can('standardterrif_delete')
                                                                                                            <form
                                                                                                                action="{{ route('standardterrif.destroy', $val->id) }}"
                                                                                                                method="POST">
                                                                                                                @csrf
                                                                                                                @method('DELETE')
                                                                                                                <button
                                                                                                                    onclick="return confirm('Do you want to delete this?')"
                                                                                                                    style="border:none;background:none">
                                                                                                                    <div class="btn fw-semibold"
                                                                                                                        style="background-color: #b80000; color:white">
                                                                                                                        Delete
                                                                                                                    </div>
                                                                                                                </button>
                                                                                                            </form>
                                                                                                        @endcan
                                                                                                    </div>

                                                                                                </div>
                                                                                                <table
                                                                                                    class="table table-striped"
                                                                                                    id="table{{ $data->id }}">
                                                                                                    <thead
                                                                                                        style="background-color: #29469d; color: white; ">
                                                                                                        <th
                                                                                                            class="text-light">
                                                                                                            @foreach (config('SOC-types') as $item)
                                                                                                                @if ($item['value'] == $val->type)
                                                                                                                    {{ $item['name'] }}
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="text-light">
                                                                                                            Rate
                                                                                                        </th>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        @if ($val)
                                                                                                            @php
                                                                                                                $particulars = json_decode($val->particulars);
                                                                                                                $rate = json_decode($val->rate);
                                                                                                            @endphp
                                                                                                            @foreach ($particulars as $index => $particular)
                                                                                                                <tr>
                                                                                                                    <td>{{ $particular }}
                                                                                                                    </td>
                                                                                                                    <td>{{ $rate[$index] }}
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                    <!-- End Default Table Example -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Standard TarrifF</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('standardterrif.store') }}" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="standard-terrif-head" class="input-label">Standard Terrif
                                                        Head</label>
                                                    <div class="input-group has-validation">
                                                        <select id="standard-terrif-head" name="standard_terrif_head_id"
                                                            class="form-select" required>
                                                            <option value="">Choose...</option>
                                                            @foreach ($standard_terrif_heads as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('standard_terrif_head_id')
                                                            <div class="invalid-feedback">
                                                                required standard-terrif-type
                                                            </div>
                                                        @enderror
                                                        @can('standardterrifhead_create')
                                                            <a class=""
                                                                href="{{ route('standardterrifhead.index', ['id' => 'create']) }}"><i
                                                                    class="bi bi-node-plus-fill"
                                                                    style="font-size:32px; color:green;"></i></a>
                                                        @endcan
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="type" class="input-label">Type</label>
                                                    <div class="input-group has-validation">
                                                        <select class="form-control" id="type-select" name="type"
                                                            required>
                                                            <option value="">Choose...</option>
                                                            @foreach (config('SOC-types') as $item)
                                                                <option value={{ $item['value'] }}>{{ $item['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('type')
                                                            <div class="invalid-feedback">
                                                                Required type
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table" id="table1">
                                            <thead class=" text-primary">
                                                <tr>
                                                    <th>Particulars</th>
                                                    <th>Rate</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>

                                            <tbody id="tbody" style="text-align: center">
                                                <td class="text-left">
                                                    <input type="text"
                                                        class="form-control @error('particulars') is-invalid @enderror"
                                                        name="particulars[]" id="particulars" placeholder="Particulars*"
                                                        required>
                                                    @error('particulars[]')
                                                        <span class="text-danger" role="alert">
                                                            <p>{{ $message }}</p>
                                                        </span>
                                                    @enderror
                                                </td>
                                                <td class="text-left">
                                                    <input type="text"
                                                        class="form-control @error('rate[]') is-invalid @enderror"
                                                        name="rate[]" id="rate[]" placeholder="Rate*" required>
                                                    @error('rate[]')
                                                        <span class="text-danger" role="alert">
                                                            <p>{{ $message }}</p>
                                                        </span>
                                                    @enderror
                                                </td>
                                                <td class="text-left">
                                                    <button class="btn btn-danger remove" type="button">Remove</button>
                                                </td>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <button class="btn btn-md btn-success" id="addMore">Add more</button>
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
        $('document').ready(function() {
            $('#addMore').click(function(e) {
                e.preventDefault();
                var rowIdx = 0;
                $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="text-left">
                                    <input type="text" class="form-control @error('particulars[]') is-invalid @enderror" name="particulars[]" id="particulars" placeholder="Particulars*" required>
                                    @error('particulars[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('rate[]') is-invalid @enderror" name="rate[]" id="rate[]" placeholder="Rate*" required>
                                    @error('rate[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <button class="btn btn-danger remove"
                                        type="button">Remove</button>
                                </td>`);

            });
        });
        // jQuery button click event to remove a row.
        $('#tbody').on('click', '.remove', function() {

            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest('tr').nextAll();

            // Iterating across all the rows
            // obtained to change the index
            child.each(function() {

                // Getting <tr> id.
                var id = $(this).attr('id');

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children('.row-index').children('p');

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`Row ${dig - 1}`);

                // Modifying row id.
                $(this).attr('id', `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest('tr').remove();

            // Decreasing total number of rows by 1.
            //   rowIdx--;
        });
    </script>

    <script>
        $(document).ready(function() {
            @foreach ($standard_terrif_heads as $data)
                $('#table{{ $data->id }}').DataTable().destroy();
            @endforeach
        });
    </script>
@endsection
