<!doctype html>
<html lang="en">

<head>
    <title>Gurkhas Finance</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    @yield('head')
</head>

<body>
    <div class="container-fluid p-0">

        <header>
            <div class="row justify-content-between" style="background-color: white;">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 col-xl-7 "
                    style="margin-bottom: 1%; background-color: white;">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" class="rounded float-left " alt="Logo"
                            width="350px"
                            style="margin: 0px; padding-top: 2%; padding-left: 1%; aspect-ratio: 309/75;">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 py-3 d-flex justify-content-end align-items-end"
                    style="background-color: white;">
                    <div class="col-3 col-md-4 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#linksModal" style="background-color: #d84926; box-shadow:1px 1px 2px #000000 ;">
                            Links
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="linksModal" tabindex="-1" aria-labelledby="linksModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="linksModalLabel">Company Links</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Here will be links
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-sm-3 col-md-4  d-flex justify-content-end px-3 col-lg-4 col-12 ">
                        @auth
                            <a class="btn btn-md col-10 text-light fw-bold"
                                style="background-color: #d84926; box-shadow:1px 1px 2px #000000 ;width:100%"
                                href="{{ route('login') }}">
                                Dashboard
                            </a>
                        @endauth
                        @guest
                            <a class="btn btn-md col-10 text-light fw-bold"
                                style="background-color: #d84926; box-shadow:1px 1px 2px #000000 ;margin-right:10px"
                                href="{{ route('login') }}">
                                Login
                            </a>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- place navbar here -->
            <nav class="navbar navbar-expand-lg navbar-light p-1 p-1" style="background-color: #29469d;">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto justify-content-evenly">
                        <li class="nav-item">
                            <a class="nav-link  {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        {{-- <li class="nav-item dropdown full-width-dropdown">
                            <a class="nav-link dropdown-toggle  {{ Route::currentRouteName() === 'team' ? 'active' : '' }}"
                                href="#" id="contactDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Our Team</a>
                            <div class="dropdown-menu province-dropdown-menue" aria-labelledby="navbarDropdown">
                                <div class="row d-flex" style="padding-left: 2%;">
                                    @foreach (config('province') as $province)
                                        <div class="container province-container d-flex justify-content-between align-items-center p-2 m-2"
                                            style="width: 12.7%;">
                                            <a href="{{ route('team') . '?province=' . $province['value'] }}"
                                                class="text-decoration-none container-fluid p-2"
                                                style="max-width: 160px; max-height: 160px;">
                                                <img src="{{ asset($province['image']) }}" width="90%"
                                                    alt="">
                                                <span
                                                    class="d-flex justify-content-center pt-4 text-light fw-bold">{{ $province['name'] }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown full-width-dropdown mx-1">
                            <a class="nav-link dropdown-toggle  {{ Route::currentRouteName() === 'team' ? 'active' : '' }}"
                                href="#" id="contactDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Our Team</a>
                            <div class="dropdown-menu province-dropdown-menue" aria-labelledby="navbarDropdown"
                                style="margin-left: 0">
                                <div class="row pt-2 px-2">
                                    @php
                                        $branches = Get::get_branches();
                                    @endphp
                                    @foreach (config('province') as $key => $province)
                                        <div class="col-3">
                                            <h6 class="text-light pt-3">{{ $province['name'] }}</h6>
                                            @foreach ($branches as $branch)
                                                @if ($branch->province == $province['value'])
                                                    <a class="text-decoration-none"
                                                        href="{{ route('team') . '?province=' . $province['value'] . '&&' . 'branch_id=' . $branch->id }}">
                                                        <div class="text-light">
                                                            {{ $branch->branch_code }}-{{ $branch->title }}</div>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link   {{ Route::currentRouteName() === 'board' ? 'active' : '' }}"
                                href="{{ route('board') }}">Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link   {{ Route::currentRouteName() === 'branches' ? 'active' : '' }}"
                                href="{{ route('branches') }}">Branches</a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link   {{ Route::currentRouteName() === 'documents' ? 'active' : '' }} dropdown-toggle"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Documents
                            </a>
                            @php
                                $document_types = Get::document_types();
                            @endphp
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($document_types as $data)
                                    <a class="dropdown-item" href="{{ $data->path }}">{{ $data->title }}</a>
                                @endforeach
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link   {{ Route::currentRouteName() == 'documents' ? 'active' : '' }} dropdown-toggle"
                                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Documents
                            </a>
                            <ul class="dropdown-menu committee-drop" aria-labelledby="dropdownMenuButton">
                                @php
                                    $document_types = Get::document_types();
                                @endphp
                                @foreach ($document_types as $data)
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            {{ $data->title }} &raquo;
                                        </a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            @foreach ($data->sub_document_types as $item)
                                                @if ($item)
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ $item->document_path }}">{{ $item->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link   {{ Route::currentRouteName() === 'SOC' ? 'active' : '' }} dropdown-toggle"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Standard Tarriff
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach (config('SOC-types') as $item)
                                    <a class="dropdown-item"
                                        href="{{ route('SOC') }}#{{ $item['value'] }}">{{ $item['name'] }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link   {{ Route::currentRouteName() == 'comittee_aml_cft' || Route::currentRouteName() == 'comittee_audit' || Route::currentRouteName() == 'comittee_executive_level' || Route::currentRouteName() == 'comittee_financial_administration' || Route::currentRouteName() == 'comittee_head_of_department' || Route::currentRouteName() == 'comittee_hr_facility' || Route::currentRouteName() == 'comittee_risk_management' ? 'active' : '' }} dropdown-toggle"
                                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Committee
                            </a>
                            <ul class="dropdown-menu committee-drop" aria-labelledby="dropdownMenuButton">
                                @php
                                    $committee_levels = Get::committee_levels();
                                @endphp
                                @foreach ($committee_levels as $data)
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            {{ $data->title }} &raquo;
                                        </a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            @foreach ($data->sub_committee_levels as $item)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ $item->path }}">{{ $item->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link   {{ Route::currentRouteName() === 'interest_rate' ? 'active' : '' }}"
                                href="{{ route('interest_rate') }}">Interest Rate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link   {{ Route::currentRouteName() === 'vendor_contacts_index' ? 'active' : '' }}"
                                href="{{ route('vendor_contacts_index') }}">Vendor Contacts</a>
                        </li>



                    </ul>
                </div>
            </nav>
        </header>
        @yield('content')

    </div>
    <footer class="bg-light d-flex justify-content-between">
        <!-- Copyright -->
        <div class="container-fluid p-4  d-flex justify-content-between" style="background-color: #29469d">
            <span style="color:white"> © 2023 Copyright: <a class="text-light" href="https://google.com/">Copyright
                    MIT Solutions</a></span>
            <span style="font-size: 12px; color:#7b94e2">Version: 1.0</span>
        </div>
        <!-- Copyright -->
    </footer>
    @yield('footer')
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#table').removeAttr('width').DataTable({
                scrollX: true,
            });
        });
        // $(document).ready(function() {
        //     // get the position of the active button
        //     var activeButtonPos = $('.sidebar a.active').position().top;

        //     // animate the scroll position of the sidebar container
        //     $('.sidebar').animate({
        //         scrollTop: activeButtonPos
        //     }, 500);
        //     });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>
