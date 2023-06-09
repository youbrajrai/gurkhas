<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Application') }} @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet') }}">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('datetimepicker/jquery.datetimepicker.min.css') }}" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Toaster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <!-- DataTables-->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    {{-- @include('Chatify::layouts.headLinks') --}}
    @yield('header')
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <style>
        .nav-tabs .nav-item .nav-link .active {
            background-color: #ffffff;
            color: #0b2982;
        }

        .nav-tabs .nav-item .nav-link {
            color: #0b2982;
        }

        .nav-tabs-decoy {
            border: none;
            padding: 10px;
            background-color: transparent;
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
            color: #0b2982 !important;
        }

        .selected {
            background-color: #ffffff !important;
            border: none;
            padding: 10px;
            color: #0b2982;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('themes_assets/img/logo.png') }}" alt="logo" style="width:250px;">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset(basename(storage_path()) . '/' . Auth::user()?->media?->file_path) }}"
                            alt="Profile" class="rounded-circle"
                            style="object-fit: cover;
                    width: 40px;height:40px">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->employeeDetails?->position?->title }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ url('https://mitsolution.com.np/') }}">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">Frequently Used</li>
            <li class="nav-item">
                <a class="nav-link {{ request()->getRequestUri() == '/dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            @can('loan-deposit')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/loandeposit' ? 'active' : '' }}"
                        href="{{ route('loandeposit.index') }}">
                        <i class="bi bi-credit-card"></i><span>Loan & Deposit</span>
                    </a>
                </li><!-- End Insurance Nav -->
            @endcan
            @can('outstation')
                <li class="nav-item">
                    <a class="nav-link  {{ request()->getRequestUri() == '/outstation' ? 'active' : '' }}"
                        href="{{ route('outstation.index') }}">
                        <i class="bi bi-briefcase"></i><span>Outstation</span>
                    </a>
                </li><!-- End Outgoing Nav -->
            @endcan
            @can('leave')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/leave' ? 'active' : '' }}"
                        href="{{ route('leave.index') }}">
                        <i class="bi bi-person-bounding-box"></i><span>Leave Update</span>
                    </a>
                </li><!-- End Leave Nav -->
            @endcan
            @can('notice')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/notice' ? 'active' : '' }}"
                        href="{{ route('notice.index') }}">
                        <i class="bi bi-megaphone"></i><span>Notices</span>
                    </a>
                </li><!-- End notices Nav -->
            @endcan
            @can('notice-type')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/noticetype' ? 'active' : '' }}"
                        href="{{ route('noticetype.index') }}">
                        <i class="bi bi-file-word"></i><span>Notice Type</span>
                    </a>
                </li><!-- End Notice Type Nav -->
            @endcan

            <li class="nav-heading">Rates Management</li>
            @can('rate')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/rate' ? 'active' : '' }}"
                        href="{{ route('rate.index') }}">
                        <i class="bi bi-graph-up"></i><span>Basic Rates</span>
                    </a>
                </li><!-- End rates Nav -->
            @endcan
            @can('interest-head')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/interesthead' ? 'active' : '' }}"
                        href="{{ route('interesthead.index') }}">
                        <i class="bi bi-building"></i><span>Interest Rates Head</span>
                    </a>
                </li><!-- End Interest Head Nav -->
            @endcan

            @can('interest')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/fixeddeposit' ? 'active' : '' }}"
                        href="{{ route('fixeddeposit.index') }}">
                        <i class="bi bi-bank"></i>
                        <span>Interest Rates</span>
                    </a>
                </li><!-- End Interest Nav -->
            @endcan
            @can('standard-terrif-head')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/standardterrifhead' ? 'active' : '' }}"
                        href="{{ route('standardterrifhead.index') }}">
                        <i class="bi bi-boxes"></i><span>Standard Tarriff Head</span>
                    </a>
                </li><!-- End Standard terrif Head Nav -->
            @endcan
            @can('standardterrif')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/standardterrif' ? 'active' : '' }}"
                        href="{{ route('standardterrif.index') }}">
                        <i class="bi bi-bookmark-plus"></i>

                        <span>Standard Tarriff</span>
                    </a>
                </li><!-- End Standard Terrif Nav -->
            @endcan
            @can('fiscalyear')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/fiscalyear' ? 'active' : '' }}"
                        href="{{ route('fiscalyear.index') }}">
                        <i class="bi bi-calendar-date"></i><span>Fiscal Year</span>
                    </a>
                </li><!-- End team-members Nav -->
            @endcan

            <li class="nav-heading">Renewables</li>
            @can('insurance')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/insurance' ? 'active' : '' }}"
                        href="{{ route('insurance.index') }}">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Insurance</span>
                    </a>
                </li><!-- End Insurance Nav -->
            @endcan

            @can('contract')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/contract' ? 'active' : '' }}"
                        href="{{ route('contract.index') }}">
                        <i class="bi bi-file-word"></i>
                        <span>Contract</span>
                    </a>
                </li><!-- End Contract Nav -->
            @endcan
            @can('vendor')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/vendor' ? 'active' : '' }}"
                        href="{{ route('vendor.index') }}">
                        <i class="bi bi-menu-button-wide"></i>
                        <span>Vendor</span>
                    </a>
                </li><!-- End Vendor Nav -->
            @endcan
            @can('vendor-category')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/vendorcategory' ? 'active' : '' }}"
                        href="{{ route('vendorcategory.index') }}">
                        <i class="bi bi-tags"></i><span>Vendor Category</span>
                    </a>
                </li><!-- End vendor-category Nav -->
            @endcan
            @can('vendor-type')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/vendortype' ? 'active' : '' }}"
                        href="{{ route('vendortype.index') }}">
                        <i class="bi bi-list"></i><span>Vendor Types</span>
                    </a>
                </li><!-- End vendor-types Nav -->
            @endcan


            <li class="nav-heading">Document Management</li>


            @can('document')
                <li class="nav-item">
                    <a class="nav-link  {{ request()->getRequestUri() == '/document' ? 'active' : '' }}"
                        href="{{ route('document.index') }}">
                        <i class="bi bi-file-pdf"></i><span>Documents</span>
                    </a>
                </li><!-- End documents Nav -->
            @endcan
            @can('document-type')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/documenttype' ? 'active' : '' }}"
                        href="{{ route('documenttype.index') }}">
                        <i class="bi bi-file-word"></i><span>Document Type</span>
                    </a>
                </li><!-- End Document Type Nav -->
            @endcan
            @can('subdocument-type')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/subdocumenttype' ? 'active' : '' }}"
                        href="{{ route('subdocumenttype.index') }}">
                        <i class="bi bi-file-earmark"></i><span>Sub Document Type</span>
                    </a>
                </li><!-- End sub Document Type Nav -->
            @endcan
            @can('policyandproductpaper')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/policy' ? 'active' : '' }}"
                        href="{{ route('policy.index') }}">
                        <i class="bi bi-journal-text"></i><span>Policies and Product Paper</span>
                    </a>
                </li><!-- End Policy and Product Nav -->
            @endcan

            <li class="nav-heading">Human Resource Management</li>
            @can('team-member')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/user' ? 'active' : '' }}"
                        href="{{ route('user.index') }}">
                        <i class="bi bi-person"></i><span>Employees</span>
                    </a>
                </li>
            @endcan
            @can('branch')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/branch' ? 'active' : '' }}"
                        href="{{ route('branch.index') }}">
                        <i class="bi bi-share"></i><span>Branch</span>
                    </a>
                </li><!-- End branch Nav -->
            @endcan
            @can('position')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/position' ? 'active' : '' }}"
                        href="{{ route('position.index') }}">
                        <i class="bi bi-person"></i><span>Position</span>
                    </a>
                </li><!-- End Position Nav -->
            @endcan
            @can('department')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/department' ? 'active' : '' }}"
                        href="{{ route('department.index') }}">
                        <i class="bi bi-clipboard"></i><span>Department</span>
                    </a>
                </li><!-- End Department Nav -->
            @endcan
            @can('board-member')
                <li class="nav-item">
                    <a class="nav-link  {{ request()->getRequestUri() == '/board' ? 'active' : '' }}"
                        href="{{ route('board.index') }}">
                        <i class="bi bi-person-lines-fill"></i><span>Board Members</span>
                    </a>
                </li><!-- End board-members Nav -->
            @endcan
            @can('committee')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/committee' ? 'active' : '' }}"
                        href="{{ route('committee.index') }}">
                        <i class="bi bi-people"></i><span>Committee</span>
                    </a>
                </li>
                <!-- End committe Nav -->
            @endcan
            @can('committee-level')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/committeelevel' ? 'active' : '' }}"
                        href="{{ route('committeelevel.index') }}">
                        <i class="bi bi-diagram-3"></i><span>Committee Level</span>
                    </a>
                </li><!-- End Committe Level Nav -->
            @endcan
            @can('subcommitteelevel_access')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/subcommitteelevel' ? 'active' : '' }}"
                        href="{{ route('subcommitteelevel.index') }}">
                        <i class="bi bi-diagram-3"></i><span>Sub Committee Level</span>
                    </a>
                </li><!-- End Committe Level Nav -->
            @endcan

            <li class="nav-heading">Authority Management</li>
            @can('charge')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/charge' ? 'active' : '' }}"
                        href="{{ route('charge.index') }}">
                        <i class="bi bi-credit-card"></i><span>Charges</span>
                    </a>
                </li><!-- End charges Nav -->
            @endcan

            @can('charge-type')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/chargetype' ? 'active' : '' }}"
                        href="{{ route('chargetype.index') }}">
                        <i class="bi bi-cash"></i><span>Charge Type</span>
                    </a>
                </li><!-- End Charge Type Nav -->
            @endcan



            @can('roles')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/roles' ? 'active' : '' }}"
                        href="{{ route('roles.index') }}">
                        <i class="bi bi-person-workspace"></i><span>Roles</span>
                    </a>
                </li><!-- End team-members Nav -->
            @endcan
            @can('permissions')
                <li class="nav-item">
                    <a class="nav-link {{ request()->getRequestUri() == '/permissions' ? 'active' : '' }}"
                        href="{{ route('permissions.index') }}">
                        <i class="bi bi-person-plus"></i><span>Permission</span>
                    </a>
                </li><!-- End team-members Nav -->
            @endcan

        </ul>

    </aside><!-- End Sidebar-->
    @yield('content')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="{{ asset('js/pushjs/push.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').removeAttr('width').DataTable({
                scrollX: true,
            });
        });
        $(document).ready(function() {
            // get the position of the active button
            var activeButtonPos = $('.sidebar a.active').position().top;

            // animate the scroll position of the sidebar container
            $('.sidebar').animate({
                scrollTop: activeButtonPos
            }, 500);
        });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
    <script>
        // Gloabl Chatify variables from PHP to JS
        window.chatify = {
            name: "{{ config('chatify.name') }}",
            sounds: {!! json_encode(config('chatify.sounds')) !!},
            allowedImages: {!! json_encode(config('chatify.attachments.allowed_images')) !!},
            allowedFiles: {!! json_encode(config('chatify.attachments.allowed_files')) !!},
            maxUploadSize: {{ Chatify::getMaxUploadSize() }},
            pusher: {!! json_encode(config('chatify.pusher')) !!},
            pusherAuthEndpoint: '{{ route('pusher.auth') }}'
        };
        window.chatify.allAllowedExtensions = chatify.allowedImages.concat(chatify.allowedFiles);
    </script>
    <script src="{{ asset('js/pushjs/push.min.js') }}"></script>
    <script src="{{ asset('js/chatify/utils.js') }}"></script>
    <script src="https://unpkg.com/nepali-date-picker@2.0.1/dist/jquery.nepaliDatePicker.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://unpkg.com/nepali-date-picker@2.0.1/dist/nepaliDatePicker.min.css"
        crossorigin="anonymous" />

    <script src="{{ asset('datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('datetimepicker/jquery.datetimepicker.min.js') }}"></script>
    {{-- <script src="{{ asset('js/chatify/code.js') }}"></script> --}}

    @yield('footer')


    <script>
        csrfToken = $('meta[name="csrf-token"]').attr("content");
        Pusher.logToConsole = chatify.pusher.debug;
        const pusher = new Pusher(chatify.pusher.key, {
            encrypted: chatify.pusher.options.encrypted,
            cluster: chatify.pusher.options.cluster,
            authEndpoint: chatify.pusherAuthEndpoint,
            auth: {
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
            },
        });
        const channelName = "private-chatify";
        const auth_id = {{ Auth::id() }}
        var
            channel = pusher.subscribe(`${channelName}.${auth_id}`);
        channel.bind("messaging", function(data) {
            Push.Permission.get();
            const htmlString = data.message;
            const parser = new DOMParser();
            const doc = parser.parseFromString(htmlString, 'text/html');
            const messageDiv = doc.querySelector('.message');
            const message = messageDiv.textContent.trim();
            $.ajax({
                url: '/finduser/' + data.from_id,
                type: 'GET',
                success: function(response) {
                    Push.create("New Message!", {
                        body: response.user.name + ": " + message,
                        icon: response.img,
                        requireInteraction: true,
                        tag: "new-message",
                        onClick: function() {
                            window.focus();
                            this.close();
                            window.location.href = response.url;
                        },
                    });
                    playNotificationSound(
                        "new_message"
                    );
                }
            });
        });

        function playNotificationSound(soundName) {
            const sound = new Audio(
                `/${chatify.sounds.public_path}/${chatify.sounds[soundName]}`
            );
            sound.play();

        }
    </script>
    <script>
        $('.date-picker').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('.date_time_picker')?.datetimepicker();

        function getDate(date) {
            var year = date.getFullYear();
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var day = ("0" + date.getDate()).slice(-2);
            return year + "-" + month + "-" + day
        }
    </script>
</body>

</html>
