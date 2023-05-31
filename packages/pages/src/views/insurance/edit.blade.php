@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Insurance Management</h1>

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
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-center mb-3">
                                <h5 class="input-title">Add Insurance Policy</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" action='{{ route('insurance.update', $item->id) }}'
                                method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="container-fluid  p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="insurance_name" class="input-label">Insurance Name</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" name="name"
                                                    id="insurance_name" value="{{ old('name', $item->name) }}"
                                                    placeholder="Insurance Name*" required>
                                                @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        Required insurance_name
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="Branch" class="input-label">Branch</label>
                                            <div class="input-group has-validation">
                                                @if (Auth::user()->IsAdmin)
                                                    <select id="Branch" class="form-select" name="branch_id" required>
                                                        <option value="">Choose Branch...</option>
                                                        @foreach ($variables['branch'] as $data)
                                                            <option
                                                                value="{{ $data->id }}"{{ $data->id === $item->branch_id ? 'selected' : '' }}>
                                                                {{ $data->title }}</option>
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
                                                        Required Branch
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="container-fluid  p-2 input-container2">
                                    <div class="col-8">
                                        <label for="file_upload" class="input-label">Insurance File Upload</label>
                                        <div class="input-group has-validation">
                                            <input type="file" class="form-control" id="file_upload" name="file"
                                                placeholder="Insurance File Upload*">
                                            @error('file')
                                                <div class="invalid-feedback">
                                                    required file_upload
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid  p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="insurance_amount" class="input-label">Insurance Amount</label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="1" step="0.01" class="form-control" name="insurance_amount"
                                                    value="{{ old('insurance_amount', $item->insurance_amount) }}"
                                                    id="insurance_amount" placeholder="Insurance Amount*" required>
                                                @error('insurance_amount')
                                                    <div class="invalid-feedback d-block">
                                                        required insurance_amount
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="insurance_company" class="input-label">Insurance Company</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" name="insurance_company"
                                                    value="{{ old('insurance_company', $item->insurance_company) }}"
                                                    id="insurance_company" placeholder="Insurance Company*" required>
                                                @error('insurance_company')
                                                    <div class="invalid-feedback d-block">
                                                        required insurance_company
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid  p-2 input-container2">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="insurance_start_date" class="input-label">Issued On</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker"
                                                    name="insurance_start_date"
                                                    value="{{ old('insurance_start_date', $item->insurance_start_date) }}"
                                                    id="insurance_start_date" placeholder="Insurance Start date*" required>
                                                @error('insurance_start_date')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="insurance_expiry_date" class="input-label">Expires On</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker"
                                                    name="insurance_expiry_date"
                                                    value="{{ old('insurance_expiry_date', $item->insurance_expiry_date) }}"
                                                    id="insurance_expiry_date" placeholder="Insurance Start date*" required>
                                                @error('insurance_expiry_date')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
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
