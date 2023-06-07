@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Standard Terrif Management</h1>

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
                                <h5 class="input-title">Add Standard Terrif</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post"
                                action="{{ route('standardterrif.store') }}" novalidate>
                                @csrf
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="standard-terrif-head" class="input-label">Interest head</label>
                                            <div class="input-group has-validation">
                                                <select id="standard-terrif-head" name="standard_terrif_head_id"
                                                    class="form-select" required>
                                                    <option value="">Choose...</option>
                                                    @foreach ($standard_terrif_heads as $data)
                                                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('standard_terrif_head_id')
                                                    <div class="invalid-feedback">
                                                        required standard-terrif-type
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="type" class="input-label">Type</label>
                                            <div class="input-group has-validation">
                                                <select class="form-control" id="type-select" name="type" required>
                                                    <option value="">Choose...</option>
                                                    @foreach (config('SOC-types') as $item)
                                                        <option value={{ $item['value'] }}>{{ $item['name'] }}</option>
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
                                                name="particulars[]" id="particulars" placeholder="Particulars*" required>
                                            @error('particulars[]')
                                                <span class="text-danger" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </td>
                                        <td class="text-left">
                                            <input type="text" class="form-control @error('rate[]') is-invalid @enderror"
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
                                    <input type="text" class="form-control @error('particulars') is-invalid @enderror" name="particulars[]" id="particulars" placeholder="Particulars*" required>
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
            $('#table1').DataTable().destroy();
        });
    </script>
@endsection
