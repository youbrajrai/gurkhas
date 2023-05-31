@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Branch Management</h1>

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
                                <h5 class="input-title">Add Branches</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post" action="{{ route('branch.store') }}"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="branch-name" class="input-label">Branch Name</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Branch Name*" required>
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        required branch-name
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="link" class="input-label">Google Map</label>
                                            <div class="input-group has-validation">
                                                <input type="url" class="form-control" id="link" name="link"
                                                    placeholder="Google Map*" required>
                                                @error('link')
                                                    <div class="invalid-feedback">
                                                        required link
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="image" class="input-label">Branch Image</label>
                                            <div class="input-group has-validation">
                                                <input type="file" class="form-control" id="file" name="file"
                                                    placeholder="Image*" required>
                                                @error('file')
                                                    <div class="invalid-feedback">
                                                        required image
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container2">
                                    <div class="row">
                                        <label for="location" class="input-label">Location</label>
                                        <div class="col-3">
                                            <div class="input-group has-validation">
                                                <select id="province" class="form-select" name="province" required>
                                                    <option value="">Choose province...</option>
                                                    @foreach (config('province') as $val)
                                                        <option value={{ $val['value'] }}>{{ $val['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('province')
                                                    <div class="invalid-feedback">
                                                        required province
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="district" name="district"
                                                    placeholder="District*" required>
                                                @error('district')
                                                    <div class="invalid-feedback">
                                                        required district
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="local_body" name="local_body"
                                                    placeholder="Local body*" required>
                                                @error('local_body')
                                                    <div class="invalid-feedback">
                                                        required local-body
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group has-validation">
                                                <input type="number" class="form-control" id="ward_no" name="ward_no"
                                                    placeholder="Ward no*" required>
                                                @error('ward_no')
                                                    <div class="invalid-feedback">
                                                        required ward-no
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="contact_no" class="input-label">Contact No.</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="contact_no" name="contact_no"
                                                    placeholder="Contact No.*" required>
                                                @error('contact_no')
                                                    <div class="invalid-feedback">
                                                        required contact_no
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="fax_no" class="input-label">Fax No.</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="fax_no" name="fax_no"
                                                    placeholder="Fax No.*" required>
                                                @error('fax_no')
                                                    <div class="invalid-feedback">
                                                        required fax_no
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="mail_id" class="input-label">Mail ID</label>
                                            <div class="input-group has-validation">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Mail ID*" required>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        required mail_id
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
