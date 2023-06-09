@extends('layouts.app')
@section('head')
    <style>
        .text-content {
            border-bottom-left-radius: 25px;
            border-top-right-radius: 25px;
            box-shadow: #bcc0c7 0px 2px 2px;
            background-color: white;
        }


        .leave-profile {
            margin: 0px;
            padding: 0px;
            border: #ff3333 solid 2px;
            border-radius: 100% !important;
            aspect-ratio: 1/1;
            box-shadow: #851212 3px 4px 8px;
        }

        .out-station-profile {
            margin-left: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 90%;
            aspect-ratio: 1/1;
            border: 2px solid #851212;
            border-radius: 5px;
            overflow: hidden;
            transform: rotate(45deg);
        }

        .out-station-profile img {
            transform: rotate(-45deg);
            width: 141%;
            height: 141%;
            flex-shrink: 0;
        }

        .date-info {
            font-size: calc(0.5em + 0.3vw) !important;
            font-weight: 500;
            color: #000000;
        }

        .carousel-control-next {
            width: 5%;
            opacity: 0.5;
            z-index: 999;
            top: 50%;
            right: 0%;
        }

        .carousel-control-next:hover {
            opacity: 1;
        }


        .carousel-control-prev {
            width: 5%;
            opacity: 0.5;
            z-index: 999;
            top: 50%;
            left: 0%;
        }

        .carousel-control-prev:hover {
            opacity: 1;
        }
    </style>
@endsection
@section('content')
    <main class="row p-0 m-0">
        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url(images/home-banner.jpeg);  background-repeat: no-repeat; background-size: 100% auto;   min-height:260px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            {{-- <h2 style="padding-right: 15%;"><u>Interest Rates</u></h2> --}}
        </div>
        <div class="col-md-2 order-2 order-md-1 p-0 m-0">
            <div class="container p-0 m-0" style="background-color: #eff3fd; height:100%;">
                <!-- circular container -->
                <div class="container-fluid  p-0 m-0 pt-3">
                    <div class=" text-center pt-1 border-2 border-danger border-top border-bottom col-12"
                        style="background-color: #dee6fe;">
                        <label>
                            <h4>Circulars</h4>
                        </label>
                    </div>

                    <div class="container-fluid p-0 m-0" style="max-height:300px; overflow-y:scroll">
                        @php
                            $circulartypes = Get::circularsType(3);
                        @endphp
                        @foreach ($circulartypes as $circulartype)
                            <a href="{{ $circulartype->path }}" target="_blank" class="text-decoration-none py-1 m-0">
                                <div class="listed-links pt-2 px-2 py-0">
                                    <div class="row m-0 p-0 d-flex justify-content-between">
                                        <div class="col-8 p-0 py-1 m-0 ">
                                            <h6>{{ $circulartype->title }}</h6>
                                        </div>
                                        <div class="col-2 p-0 m-0 d-flex justify-content-end px-2">
                                            <h5><i class="bi bi-arrow-right"></i></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('circulars') }}"><span class="h8 d-flex justify-content-end px-3"> View
                            More</span></a>


                </div>
                @php
                    $notices = Get::notices(3);
                @endphp
                <!-- notice container -->
                <div class="container-fluid p-0 m-0 pt-4 ">
                    <div class="border-2 text-center pt-1 mb-2 border-danger border-top border-bottom col-12 p-0"
                        style="background-color: #dee6fe;">
                        <label>
                            <h4>Notice</h4>
                        </label>
                    </div>
                    <p class="d-flex justify-content-center"
                        style="color: #1e57c0; font-weight: bold; font-size: calc(0.5em + 0.3vw)">Upcoming Holidays</p>
                    <div class="container-fluid p-0 m-0" style="max-height: 300px; overflow-y:scroll;">
                        @foreach ($notices as $data)
                            <a class="text-decoration-none">
                                <div class="listed-links text-center">
                                    <h6>{{ $data->title }}</h6>
                                    <span class="date-info">
                                        {{ $data->on_date }}
                                    </span>

                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="container fluid p-0 m-0">

                </div>
                <div class="container-fluid m-0 p-0 pt-4">
                    <div class="border-2 text-center pt-1 mb-2 border-danger border-top border-bottom col-12 p-0"
                        style="background-color: #dee6fe;">
                        <label>
                            <h4>Office Time</h4>
                        </label>
                    </div>
                    <div class="listed-links p-2">
                        <p class="h7 pt-2">Monday, 9:45AM to 5:00PM</p>
                    </div>
                </div>



            </div>
        </div>
        <div class="col-md-10 order-1 order-md-2 m-0 p-0">
            <div class="row p-0 m-0">
                <div class="col-lg-12 col-xl-9">

                    @php
                        $value = Get::cash_in_cash_out();
                    @endphp
                    <div id="chart_container" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner">
                            @foreach ($value as $key => $group)
                                <div class="carousel-item @if ($key == 0) active @endif"
                                    data-bs-interval="5000">
                                    {{-- here --}}
                                    <div class="chart-container p-0 m-0 mb-lg-12 d-flex justify-content-center pt-5"
                                        style="position: relative; margin: auto;  width:100% !important;">
                                        <div class="col-12 col-lg-11"><canvas id="bar-chart-grouped{{ $key }}"
                                                style="padding-left: 1%; padding-right: 1%; border: 1px dotted #071c5b;"></canvas>
                                            <p class="d-flex justify-content-center">Cash Flow Status</p>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#chart_container"
                            data-bs-slide="prev">
                            <i class="bi bi-arrow-left-circle-fill" style="color: #29469d; font-size:28px;"></i>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#chart_container"
                            data-bs-slide="next">
                            <i class="bi bi-arrow-right-circle-fill" style="color: #29469d; font-size:28px;"></i>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="container m-0 py-2" id="exTab1">
                        <div class="row d-flex justify-content-evenly m-0 m-0">
                            <!-- calander -->
                            <div class="mx-0 px-0 col-md-12 mt-lg-5 mt-md-5 mt-sm-5 mt-lg-5  align-items-center col-lg-5">
                                <!-- changed margin here -->
                                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist"
                                    style="background-color: #b80000; border-radius: 0; color: aliceblue;">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-calander-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-calander" type="button" role="tab"
                                            aria-controls="pills-calander" aria-selected="true"
                                            style="border-radius: 0; color: white;">Calender</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-time-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-time" type="button" role="tab"
                                            aria-controls="pills-time" aria-selected="false"
                                            style="border-radius: 0; color: white;">Office Time</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-calander" role="tabpanel"
                                        aria-labelledby="pills-calander-tab" style="padding: 0px;">
                                        <div class="container p-0 d-flex justify-content-center"
                                            style="aspect-ratio: 3/3;">
                                            <!-- Start of nepali calendar widget -->
                                            <script type="text/javascript">
                                                <!--
                                                var nc_width = 420;
                                                var nc_height = 375;
                                                var nc_api_id = "911146n332"; //
                                                -->
                                            </script>
                                            <script type="text/javascript" src="https://www.ashesh.com.np/nepali-calendar/js/ncf.js?v=5"></script>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="pills-time" role="tabpanel"
                                        aria-labelledby="pills-time-tab">
                                        <div class="container" style="padding: 16px;">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Day</th>
                                                        <th scope="col">Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Sunday to Thursday</th>
                                                        <td>10:00PM to 5:00PM</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">Friday</th>
                                                        <td>10:00PM to 3:00PM</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Saturday</th>
                                                        <td>Closed</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="mx-0 px-0 col-md-12 mt-lg-5 mt-md-5 mt-sm-5 mt-lg-5  align-items-center col-lg-5">
                                <div class="card p-0 m-0">
                                    <div class="card-header text-center px-0 m-0" style="background-color: #29469d;">
                                        <h6 style="color: white; font-size: calc(0.5em + 0.5vw);">
                                            Rates
                                        </h6>

                                    </div>
                                    @php
                                        $latest_rate = Get::latest_rate();
                                    @endphp
                                    <div class="card-body p-2" style="font-size: calc(0.5em + 0.5vw);">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <thead>
                                                    <th class="d-flex justify-content-end p-0 m-0">
                                                        @foreach (config('nepali-months') as $item)
                                                            @if ($item['value'] == $latest_rate->month)
                                                                {{ $item['name'] }}
                                                            @endif
                                                        @endforeach
                                                        {{ $latest_rate->year }}
                                                    </th>
                                                    <th></th>

                                                </thead>
                                                <tr>
                                                    <td>Base Rate:</td>
                                                    <td>{{ $latest_rate->base_rate }}%</td>
                                                </tr>
                                                <tr>
                                                    <td>Spread Rate:</td>
                                                    <td>{{ $latest_rate->spread_rate }}%</td>
                                                </tr>
                                                <tr>
                                                    <td>Cost of Fund:</td>
                                                    <td>{{ $latest_rate->cost_fund }}%</td>
                                                </tr>
                                                <tr>
                                                    <td>Yield Rate:</td>
                                                    <td>{{ $latest_rate->yield_rate }}%</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <th class="d-flex justify-content-end m-0"><a class="text-decoration-none"
                                                        href="{{ route('rates_archive') }}"
                                                        style="color: #000000;">Previous Rates <i
                                                            class="bi bi-clock-history"></i></a></th>
                                                <th></th>
                                            </tfoot>
                                        </table>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="col-lg-12 col-xl-3 p-0 m-0">
                    <div class="container m-0 p-0"
                        style="background-color: #eff3fd; height:100%; padding: 0px; margin: 0px;">

                        <!-- staff on leave container -->
                        <div class="container py-3 px-0">
                            <div class="border-2 text-center pt-1 mb-2 border-danger border-top border-bottom col-12 p-0"
                                style="background-color: #dee6fe;">
                                <label>
                                    <h4>Staff On Leave</h4>
                                </label>
                            </div>
                            <div class="container-fluid p-0 m-0"
                                style="max-height: 300px; overflow-y:scroll; min-height:200px">
                                @php
                                    $leaves = Get::leaves();
                                @endphp
                                @foreach ($leaves as $data)
                                    <a class="text-decoration-none">
                                        <div class="row d-flex justify-content-between align-items-center  m-0 py-1 px-2"
                                            style="max-width: 100%;">
                                            <div class="col-2 m-0 p-0" style="max-height:60px;">
                                                <img class="leave-profile"
                                                    src="{{ asset(basename(storage_path()) . '/' . $data->user?->media?->file_path) }}"
                                                    class="rounded float-left" alt="Responsive image" width="60px">
                                            </div>
                                            <div class=" col-9 m-0  px-0">
                                                <div class="text-content text-center">

                                                    <h6 class="p-0 m-0">{{ $data->user->name }}</h6>

                                                    <span class="date-info">
                                                        Back After: {{ $data->leave_to }}
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- out station container -->
                        <div class="container px-0 py-4">
                            <div class="border-2 text-center pt-1 mb-2 border-danger border-top border-bottom col-12 p-0"
                                style="background-color: #dee6fe;">
                                <label>
                                    <h4>Out Station</h4>
                                </label>
                            </div>
                            <div class="container-fluid p-0 m-0"
                                style="max-height: 300px; overflow-y:scroll; min-height:200px">
                                @php
                                    $outstations = Get::outstations();
                                @endphp
                                @foreach ($outstations as $data)
                                    <a class="text-decoration-none">
                                        <div class="row d-flex justify-content-between align-items-center m-0 py-1 px-2"
                                            style="max-width: 100%;">
                                            <div class="col-2 m-0 p-0" style="max-height:60px;">
                                                <img class="leave-profile"
                                                    src="{{ asset(basename(storage_path()) . '/' . $data->user?->media?->file_path) }}"
                                                    class="rounded float-left" alt="Responsive image" width="60px">
                                            </div>
                                            <div class=" col-9 m-0  px-0">
                                                <div class="text-content text-center">

                                                    <h6 class="p-0 m-0">{{ $data->user->name }}</h6>

                                                    <span class="date-info">
                                                        {{ $data->user->employeeDetails?->branch?->title }}({{ $data->outtime }})
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <script>
        @foreach ($value as $key => $group)
            let cash_in_cash_out{{ $key }} = @json($group);
            new Chart(document.getElementById("bar-chart-grouped{{ $key }}"), {

                type: 'bar',
                data: {
                    labels: cash_in_cash_out{{ $key }}.branch_name,
                    datasets: [{
                        label: "Loan",
                        backgroundColor: "#cc0000",
                        data: cash_in_cash_out{{ $key }}.loan_issued
                    }, {
                        label: "Deposit",
                        backgroundColor: "#29469d",
                        data: cash_in_cash_out{{ $key }}.deposit
                    }]

                },
                options: {
                    title: {
                        display: true,
                        text: 'Cash In-Out Status'
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11 // set font size for x-axis labels
                            }
                        }],
                    }
                }
            });
        @endforeach
    </script>
@endsection
