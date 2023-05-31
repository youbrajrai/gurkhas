@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Vendor Management</h1>

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
                                <h5 class="input-title">Edit Vendors</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post"
                                action="{{ route('vendor.update', $item->id) }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="container-fluid  p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="vendorname" class="input-label">Vendor Name</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="vendorname" name="name"
                                                    value="{{ old('name', $item->name) }}" placeholder="Vendor Name*"
                                                    required>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        required vendor name
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="address" class="input-label">Address</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{ old('address', $item->address) }}" placeholder="Address*"
                                                    required>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        required Address
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container2">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="category" class="input-label">Category</label>
                                            <div class="input-group has-validation">
                                                <select id="category" class="form-select" name="vendor_category_id"
                                                    required>
                                                    <option value="">Choose...</option>
                                                    @foreach ($variables['vendorcategory'] as $data)
                                                        <option
                                                            value="{{ $data->id }}"{{ $item->vendor_category->find($data->id)->exists() ? 'selected' : '' }}>
                                                            {{ $data->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('vendory_category_id')
                                                    <div class="invalid-feedback">
                                                        Required category
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="sub-category" class="input-label">Vendor Types</label>
                                            <div class="input-group has-validation">
                                                <select id="sub-category" class="form-select" name="vendor_type_id"
                                                    required>
                                                    <option value="">Choose...</option>
                                                    @foreach ($variables['vendortype'] as $data)
                                                        <option
                                                            value="{{ $data->id }}"{{ $item->vendor_type->find($data->id)->exists() ? 'selected' : '' }}>
                                                            {{ $data->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('vendor_type_id')
                                                    <div class="invalid-feedback">
                                                        Required Vendor Type
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">

                                        <div class="col-4">
                                            <label for="Contact Person" class="input-label">Contact Person</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="Contact Person"
                                                    name="contact_person"
                                                    value="{{ old('contract_person', $item->contact_person) }}"
                                                    placeholder="Contact Person*" required>
                                                @error('contact_person')
                                                    <div class="invalid-feedback">
                                                        required Contact Person
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="contact-details"class="input-label">Contact Detail</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="contact-details"
                                                    name="contact_details"
                                                    value="{{ old('contact_details', $item->contact_details) }}"
                                                    placeholder="Contact Details*" required>
                                                @error('contact_details')
                                                    <div class="invalid-feedback">
                                                        required Contact Details
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container2">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="contract-start-date" class="input-label">Contact Start Date</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker"
                                                    id="contract-start-date" name="contract_start_date"
                                                    value="{{ old('contract_start_date', $item->contract_start_date) }}"
                                                    placeholder="Contract Start Date*" required>
                                                @error('contract_start_date')
                                                    <div class="invalid-feedback">
                                                        required contract-start-date
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="contract-expiry" class="input-label">Contract Expiry</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker"
                                                    id="contract-expiry" name="contract_expiry_date"
                                                    value="{{ old('contract_expiry_date', $item->contract_expiry_date) }}"
                                                    placeholder="Contract Expiry*" required>
                                                @error('contract_expiry_date')
                                                    <div class="invalid-feedback">
                                                        required contract-expiry
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="contract-pdf" class="input-label">Contract</label>
                                            <div class="input-group has-validation">
                                                <input type="file" class="form-control" id="contract-pdf"
                                                    name="file" placeholder="Contact Pdf*">
                                                @error('file')
                                                    <div class="invalid-feedback">
                                                        Required Contact Pdf
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
