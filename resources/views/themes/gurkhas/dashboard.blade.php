@extends('themes.layouts.app')
@section('header')
    <style>
        .messages {
            display: inline-block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            z-index: 1;
        }

        .chats {
            display: none;
            width: 0%;
            z-index: -1;
            transition: 0.5s;
            background-color: #410c0c;
        }

        .teamPill {
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            height: 70px;
            width: 100%;
            max-width: 250px;
        }
    </style>
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>

        </div><!-- End Page Title -->
        @php
            $base_rates = Get::rates()->pluck('base_rate');
            $spread_rates = Get::rates()->pluck('spread_rate');
            $cost_funds = Get::rates()->pluck('cost_fund');
            $yield_rates = Get::rates()->pluck('yield_rate');
            $dates = Get::rates()
                ->pluck('date')
                ->toJson();
        @endphp
        <section class="section dashboard">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-3 px-2">
                        <div class="container-fluid d-flex align-items-center justify-content-center pt-2"
                            style="border-radius: 80px; background-color:#071c5b; min-height:60px">
                            <h5 class="text-light">Total Admins:<span class="px-2 fw-bold">{{ Get::getTotalAdmins() }}</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-3 px-3">
                        <div class="container-fluid d-flex align-items-center justify-content-center pt-2"
                            style="border-radius: 80px; background-color:#29469d; min-height:60px">
                            <h5 class="text-light">Total Users:<span class="px-2 fw-bold">{{ Get::getTotalUsers() }}</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-3 px-3">
                        <div class="container-fluid d-flex align-items-center justify-content-center pt-2"
                            style="border-radius: 80px; background-color:#660e0e; min-height:60px">
                            <h5 class="text-light">Employees On Leave:<span
                                    class="px-2 fw-bold">{{ Get::getTotalLeaves() }}</span></h5>
                        </div>
                    </div>
                    <div class="col-3 px-3">
                        <div class="container-fluid d-flex align-items-center justify-content-center pt-2"
                            style="border-radius: 80px; background-color:#198754; min-height:60px">
                            <h5 class="text-light">
                                Employees Outstation:<span class="px-2 fw-bold">{{ Get::getTotalOutstation() }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card">

                    {{-- <div class="filter">
<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
<li class="dropdown-header text-start">
<h6>Filter</h6>
</li>
<li><a class="dropdown-item" href="#" onclick="loandepositfilter('month')">This Month</a></li>
<li><a class="dropdown-item" href="#"onclick="loandepositfilter('year')">This Year</a></li>
</ul>
</div> --}}

                    <div class="card-body">
                        <h5 class="card-title">Loan and Deposit Chart</h5>

                        <!-- Line Chart -->
                        <canvas id="bar-chart-grouped"
                            style="padding-left: 1%; padding-right: 1%; border: 1px dotted #071c5b; max-height:400px"></canvas>
                        <!-- End Line Chart -->

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="container-fluid">
                    <!-- Rates -->
                    @php
                        $rates = Get::ratesFilter(request()->ratefilterBY);
                    @endphp
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" id="filter-button" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="ratefilter('month')">This
                                            Month</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="ratefilter('year')">This
                                            Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent Rates <span>|
                                        @if (request()->ratefilterBY == 'month')
                                            Month
                                        @elseif (request()->ratefilterBY == 'year')
                                            Year
                                        @else
                                            All
                                        @endif
                                    </span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Base Rate</th>
                                            <th scope="col">Spread Rate</th>
                                            <th scope="col">Cost of Fund</th>
                                            <th scope="col">Yield Rate</th>
                                            <th scope="col">Month</th>
                                            <th scope="col">Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rates as $key => $data)
                                            <tr>
                                                <th scope="row"><a href="#">{{ $key + 1 }}</a></th>
                                                <td>{{ $data->base_rate }}%</td>
                                                <td>{{ $data->spread_rate }}%</td>
                                                <td>{{ $data->cost_fund }}%</td>
                                                <td>{{ $data->yield_rate }}%</td>
                                                <td><span class="badge bg-success">
                                                        @foreach (config('nepali-months') as $val)
                                                            @if ($val['value'] == $data->month)
                                                                {{ $val['name'] }}
                                                            @endif
                                                        @endforeach
                                                    </span></td>
                                                <td><span class="badge bg-danger">{{ $data->year }}</span></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Rates -->
                </div>
                <!-- Left side columns -->
                <div class="col-lg-7">
                    <div class="row">

                        <!-- Reports -->
                        <div class="col-12">

                        </div><!-- End Reports -->




                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->

                <div class="col-lg-5">

                    <!-- Messenger -->
                    {{-- commented until it is needed --}}
                    {{-- <div class="card justify-content-center">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Chat Box <span>| <a href="{{ route('chat') }}">View all</a></span></h5>


                            <div class="messages" id="chatlist">
                                <div class="post-item clearfix">
                                    <iframe src="{{ url('/chat') }}" frameborder="0"
                                        style="width:100%;height:510px;"></iframe>
                                </div>

                                <!-- End sidebar recent posts-->

                            </div>
                        </div><!-- End Messenger -->

                    </div> --}}
                    <!-- End Right side columns -->

                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Gurkha Finance</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://escpl.com.np/">MIT</a>
        </div>
    </footer><!-- End Footer -->
@endsection
@section('footer')
    <script>
        function openNav() {
            document.getElementById("chatlist").style.width = "0%";
            document.getElementById("chatlist").style.display = "none";
            document.getElementById("chatbox").style.display = "inline-block";
            document.getElementById("chatbox").style.width = "100%";

        }

        function closeNav() {
            document.getElementById("chatlist").style.width = "100%";
            document.getElementById("chatbox").style.display = "none";
            document.getElementById("chatlist").style.display = "inline-block ";
            document.getElementById("chatbox").style.width = "0%";
        }
    </script>
    <script>
        const data = [];
        const filterButton = document.getElementById('filter-button');
        filterButton.addEventListener('click', (event) => {
            const filterType = event.target.value;
            const filteredData = filterData(filterType);
            console.log(filteredData);
        });

        function filterData(filterType) {
            const today = new Date();
            const oneDay = 24 * 60 * 60 * 1000; // milliseconds in a day
            let filteredData;

            switch (filterType) {
                case 'day':
                    filteredData = data.filter((d) => new Date(d.date).toDateString() === today.toDateString());
                    break;
                case 'week':
                    const oneWeekAgo = new Date(today.getTime() - 7 * oneDay);
                    filteredData = data.filter((d) => new Date(d.date) >= oneWeekAgo);
                    break;
                case 'month':
                    const oneMonthAgo = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
                    filteredData = data.filter((d) => new Date(d.date) >= oneMonthAgo);
                    break;
                case 'year':
                    const oneYearAgo = new Date(today.getFullYear() - 1, today.getMonth(), today.getDate());
                    filteredData = data.filter((d) => new Date(d.date) >= oneYearAgo);
                    break;
                default:
                    filteredData = data;
            }

            return filteredData;
        }
    </script>
    <script type="text/javascript">
        function ratefilter(time) {
            window.location.href = "/dashboard?ratefilterBY=" + time
        }
    </script>
    @php
        $loanDeposit = Get::loanDepositFilter();
    @endphp
    <script>
        let cash_in_cash_out = @json($loanDeposit);
        new Chart(document.getElementById("bar-chart-grouped"), {

            type: 'bar',
            data: {
                labels: cash_in_cash_out.time,
                datasets: [{
                    label: "Loan",
                    backgroundColor: "#cc0000",
                    data: cash_in_cash_out.loan_issued
                }, {
                    label: "Deposit",
                    backgroundColor: "#29469d",
                    data: cash_in_cash_out.deposit
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
                            fontSize: 8 // set font size for x-axis labels
                        }
                    }]
                }
            }
        });
    </script>
@endsection
