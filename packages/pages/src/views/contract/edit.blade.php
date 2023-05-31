@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Contract Management</h1>

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
                                <h5 class="input-title">Edit Contract</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post"
                                action="{{ route('contract.update', $item->id) }}" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="name" class="input-label">Name</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name', $item->name) }}" placeholder="Name*" required>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        required name
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="agreement_date" class="input-label">Agreement Date</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker" id="agreement_date"
                                                    name="agreement_date"
                                                    value="{{ old('agreement_date', $item->agreement_date) }}"placeholder="Agreement Date*"
                                                    required>
                                                @error('agreement_date')
                                                    <div class="invalid-feedback">
                                                        required agreement_date
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="expiry_date" class="input-label">Expiry Date</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker" id="expiry_date"
                                                    name="expiry_date" value="{{ old('expiry_date', $item->expiry_date) }}"
                                                    placeholder="Expiry Date*" required>
                                                @error('expiry_date')
                                                    <div class="invalid-feedback">
                                                        required expiry_date
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container2">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="remarks" class="input-label">Remarks</label>
                                            <div class="input-group has-validation">
                                                <textarea class="form-control" name="remarks" id="remarks" required>{{ old('remarks', $item->remarks) }}</textarea>
                                                @error('remarks')
                                                    <div class="invalid-feedback">
                                                        required remarks
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
        CKEDITOR.replace('remarks');
    </script>
@endsection
