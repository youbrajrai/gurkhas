@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Charge Management</h1>

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
                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-center mb-3">
                                <h5 class="input-title">Add Charges</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post" action="{{route('charge.store')}}" novalidate>
                                @csrf
                                <div class="container-fluid p-2 input-container1">
                                    <div class="col-4">
                                        <label for="charge-type" class="input-label">Charge Type</label>
                                        <div class="input-group has-validation">
                                            <select id="charge-type" name="chargeType_id" class="form-select" required>
                                                <option value="">Choose...</option>
                                                @foreach ($variables['chargetype'] as $data)
                                                    <option value="{{$data->id}}">{{$data->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('chargeType_id')
                                            <div class="invalid-feedback">
                                                required charge-type
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container2">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="charge-title" class="input-label">Charge Title</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="charge-title" name="title"
                                                    placeholder="Charge Title*" required>
                                                    @error('title')
                                                    <div class="invalid-feedback">
                                                        required charge-title
                                                    </div>
                                                    @enderror

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="rate" class="input-label">Rate</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="rate" name="rate"
                                                    placeholder="Rate*" required>
                                                    @error('rate')
                                                    <div class="invalid-feedback">
                                                        required rate
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
