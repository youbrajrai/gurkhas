@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Notices Management</h1>

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
                        @can('notice_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Notice List</button>
                            </li>
                        @endcan
                        @can('notice_create')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Add
                                    Notice</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Notices List</h5>
                                    </div>

                                    <!-- Default Table -->
                                    <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                        style="width:100%">
                                        <thead style="background-color: #29469d;">
                                            <tr>
                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light" scope="col">Notice Type</th>
                                                <th class="text-light" scope="col">Notice Title</th>
                                                <th class="text-light" scope="col">Desciption</th>
                                                <th class="text-light" scope="col">File</th>
                                                <th class="text-light" scope="col">Date</th>
                                                <th class="text-light" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($variables['notice'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <th scope="row">{{ $data?->notice_type?->title }}</th>
                                                    <td>{{ $data?->title }}</td>
                                                    <td>{!! $data?->description !!}</td>
                                                    <td><a target="_blank" class="bi bi-file-earmark-break-fill px-5"
                                                            href="{{ url(basename(storage_path()) . '/' . $data?->media?->file_path) }}"><i></i></a>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $date = \Carbon\Carbon::parse($data?->on_date);
                                                            $dc = new \Nilambar\NepaliDate\NepaliDate();
                                                            $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);
                                                            echo $nd['year'] . '-' . $nd['month'] . '-' . $nd['day'];
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <div class="container-fluid d-flex">
                                                            @can('notice_edit')
                                                                <a href="{{ route('notice.edit', $data->id) }}"><i
                                                                        class="bi bi-pencil-square"></i></a>
                                                            @endcan
                                                            @can('notice_delete')
                                                                <form action="{{ route('notice.destroy', $data->id) }}"
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
                            {{-- <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Policy-Product-Paper List</h5>
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="pill" href="#policy">Policies</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="pill" href="#product">Product</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div id="policy" class="container tab-pane active"><br>
                                            <div class="policy-select">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="policy-files">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingOne">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                                aria-expanded="false" aria-controls="collapseOne">
                                                                Sample Form
                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne" class="accordion-collapse collapse"
                                                            aria-labelledby="headingOne"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body d-flex justify-content-center">
                                                                <img src="images/safety-policy.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                                aria-expanded="false" aria-controls="collapseTwo">
                                                                Sample Form
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwo"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body d-flex justify-content-center">
                                                                <img src="images/safety-policy.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingThree">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                                aria-expanded="false" aria-controls="collapseThree">
                                                                Sample Form
                                                            </button>
                                                        </h2>
                                                        <div id="collapseThree" class="accordion-collapse collapse"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body d-flex justify-content-center">
                                                                <img src="images/safety-policy.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="product" class="container tab-pane fade" style="padding-left:0px"><br>
                                            <div id="policy" class="container tab-pane" style="margin-top: -24px;">
                                                <br>
                                                <div class="policy-select">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Open this select menu</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="policy-files">
                                                    <div class="accordion" id="accordionExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseOne" aria-expanded="false"
                                                                    aria-controls="collapseOne">
                                                                    Sample Form
                                                                </button>
                                                            </h2>
                                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                                aria-labelledby="headingOne"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body d-flex justify-content-center">
                                                                    <img src="images/safety-policy.jpg" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwo" aria-expanded="false"
                                                                    aria-controls="collapseTwo">
                                                                    Sample Form
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwo"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body d-flex justify-content-center">
                                                                    <img src="images/safety-policy.jpg" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingThree">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseThree" aria-expanded="false"
                                                                    aria-controls="collapseThree">
                                                                    Sample Form
                                                                </button>
                                                            </h2>
                                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body d-flex justify-content-center">
                                                                    <img src="images/safety-policy.jpg" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Add Notices</h5>
                                    </div>

                                    <!-- Vertical Form -->
                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('notice.store') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="container-fluid p-2 input-container1">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label for="notice-title" class="input-label">Notice Title</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="notice-title"
                                                            name="title" placeholder="Notice Title*" required>
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                                required File
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="date" class="input-label">File</label>
                                                    <div class="input-group has-validation">
                                                        <input type="file" class="form-control" id="File"
                                                            name="file" placeholder="File*" required>
                                                        @error('file')
                                                            <div class="invalid-feedback">
                                                                required File
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="date" class="input-label">Date</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" value="" class="form-control"
                                                            id="nepali_on_date" placeholder="Date*" required>
                                                        @error('on_date')
                                                            <div class="invalid-feedback">
                                                                required on_date
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group has-validation">
                                                        <input type="date" value="" class="form-control"
                                                            id="on_date" name="on_date" placeholder="Date*" required
                                                            readonly>
                                                        @error('on_date')
                                                            <div class="invalid-feedback">
                                                                required on_date
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="notice-type" class="input-label">Notice Type</label>
                                                    <div class="input-group has-validation">
                                                        <select id="notice-type" name="notice_type_id"
                                                            class="form-select" required>
                                                            <option value="">Choose Notice Type...</option>
                                                            @foreach ($variables['noticetype'] as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('notice_type_id')
                                                            <div class="invalid-feedback">
                                                                required notice type
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid p-2 input-container2">
                                            <label for="description" class="input-label">Description</label>
                                            <div class="input-group has-validation">
                                                <textarea class="form-control" name="description" id="description" name="description" required></textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        required description
                                                    </div>
                                                @enderror

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
@section('footer')
    <script>
        $('#nepali_on_date').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#nepali_on_date').on("dateChange", function(event) {

            var formattedDate = event.datePickerData.adDate.toISOString().substr(0,
                10); // Format the date as YYYY-MM-DD

            $('#on_date').val(formattedDate)
        });
    </script>
@endsection
