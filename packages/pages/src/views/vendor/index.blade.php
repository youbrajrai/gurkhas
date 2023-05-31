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
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @can('vendor_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">List Of
                                    Vendor</button>
                            </li>
                        @endcan

                        @can('vendor_create')
                            <li class="nav-item " role="presentation">
                                <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Vendor</button>
                            </li>
                        @endcan


                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card" style="min-height: 35vw;">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Vendor List</h5>
                                    </div>
                                    <section>

                                        <!--Table-->
                                        <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                            style="width:100%">
                                            <!--Table head-->
                                            <thead style="background-color: #29469d; width:100%">

                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light">Name of Party</th>

                                                <th class="text-light" scope="col">Address</th>
                                                <th class="text-light" scope="col">Category</th>
                                                <th class="text-light" scope="col">Sub Category</th>
                                                <th class="text-light" scope="col">Contact Person</th>
                                                <th class="text-light" scope="col">Contact Detail</th>
                                                <th class="text-light" scope="col">Contract PDF</th>
                                                <th class="text-light" scope="col">Contract Start Date</th>
                                                <th class="text-light" scope="col">Contract Expiry</th>
                                                <th class="text-light" scope="col">Actions</th>

                                            </thead>
                                            <!--Table head-->

                                            <!--Table body-->
                                            <tbody class="text-center">
                                                @foreach ($variables['vendor'] as $key => $data)
                                                    <tr>
                                                        {{-- sn --}}
                                                        <th scope="row">{{ $key + 1 }}</th>
                                                        {{-- name --}}
                                                        <td>{{ $data?->name }}</td>
                                                        {{-- address --}}
                                                        <td>{{ $data?->address }}</td>
                                                        {{-- catagory --}}
                                                        <td>{{ $data?->vendor_category?->title }}</td>
                                                        {{-- subcatagory --}}
                                                        <td>{{ $data?->vendor_type?->title }}</td>
                                                        {{-- contact person --}}
                                                        <td>{{ $data?->contact_person }}</td>
                                                        {{-- contact detail --}}
                                                        <td>{{ $data?->contact_details }}</td>
                                                        {{-- contract pdf --}}
                                                        <td><a target="_blank" class="bi bi-file-earmark-break-fill px-5"
                                                                href="{{ url(basename(storage_path()) . '/' . $data?->media?->file_path) }}"><i></i></a>
                                                        </td>

                                                        {{-- contract start --}}
                                                        <td>{{ $data?->contract_start_date }}</td>
                                                        {{-- contract end --}}
                                                        <td>{{ $data?->contract_expiry_date }}</td>
                                                        {{-- action --}}
                                                        <td>
                                                            <div class="container-fluid d-flex">
                                                                @can('vendor_edit')
                                                                    <a href="{{ route('vendor.edit', $data->id) }}"><i
                                                                            class="bi bi-pencil-square"></i></a>
                                                                @endcan
                                                                @can('vendor_delete')
                                                                    <form action="{{ route('vendor.destroy', $data->id) }}"
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
                                            <!--Table body-->
                                        </table>
                                        <!--Table-->

                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Vendors</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('vendor.store') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="container-fluid  p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="name" class="input-label">Vendor Name</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Vendor Name*" required
                                                            value={{ old('name') }}>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                Required vendor name
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="address" class="input-label">Address</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" placeholder="Address*" required
                                                            value={{ old('address') }}>
                                                        @error('address')
                                                            <div class="invalid-feedback">
                                                                Required Address
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
                                                        <select id="category" class="form-select"
                                                            name="vendor_category_id" required>
                                                            <option value="">Choose...</option>
                                                            @foreach ($variables['vendorcategory'] as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('vendory_category_id')
                                                            <div class="invalid-feedback">
                                                                Required category
                                                            </div>
                                                        @enderror
                                                        @can('vendorcategory_create')
                                                            <a class=""
                                                                href="{{ route('vendorcategory.index', ['id' => 'create']) }}"><i
                                                                    class="bi bi-node-plus-fill"
                                                                    style="font-size:32px; color:green;"></i></a>
                                                        @endcan
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="sub-category" class="input-label">Vendor Types</label>
                                                    <div class="container-fluid">
                                                        <div class="input-group has-validation">
                                                            <select id="sub-category" class="form-select"
                                                                name="vendor_type_id" required>
                                                                <option value="">Choose...</option>
                                                                @foreach ($variables['vendortype'] as $data)
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('vendor_type_id')
                                                                <div class="invalid-feedback">
                                                                    Required Vendor Type
                                                                </div>
                                                            @enderror
                                                            @can('vendortype_create')
                                                                <a class=""
                                                                    href="{{ route('vendortype.index', ['id' => 'create']) }}"><i
                                                                        class="bi bi-node-plus-fill"
                                                                        style="font-size:32px; color:green;"></i></a>
                                                            @endcan
                                                        </div>
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
                                                            name="contact_person" placeholder="Contact Person*" required
                                                            value={{ old('contact_person') }}>
                                                        @error('contact_person')
                                                            <div class="invalid-feedback">
                                                                Required Contact Person
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="contact-details"class="input-label">Contact Detail</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="contact-details"
                                                            name="contact_details" placeholder="Contact Detail*" required
                                                            value={{ old('contact_details') }}>
                                                        @error('contact_details')
                                                            <div class="invalid-feedback">
                                                                Required Contact Detail
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="contract-start-date" class="input-label">Contact Start
                                                        Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control date-picker"
                                                            id="contract-start-date" name="contract_start_date"
                                                            placeholder="Contract Start Date*" required
                                                            value={{ old('contract_start_date') }}>
                                                        @error('contract_start_date')
                                                            <div class="invalid-feedback">
                                                                Required contract-start-date
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="contract-expiry" class="input-label">Contract
                                                        Expiry</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control date-picker"
                                                            id="contract-expiry" name="contract_expiry_date"
                                                            placeholder="Contract Expiry*" required
                                                            value={{ old('contract_expiry_date') }}>
                                                        @error('contract_expiry_date')
                                                            <div class="invalid-feedback">
                                                                Required contract-expiry
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
                                                            name="file" placeholder="Contact Pdf*" required>
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
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
