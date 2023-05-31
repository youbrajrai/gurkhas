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
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet')}}">
      <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
      <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      {{-- Toaster --}}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


      <!-- Template Main CSS File -->
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
      @yield('header')
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    </head>

    <body>

        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                      <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="{{asset('assets/img/logo.png')}}" alt="logo" >
                      </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                      <div class="card-body">

                        <div class="pt-4 pb-2">
                          <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                          <p class="text-center small">Enter your Email & password to login</p>
                        </div>

                        <form action="{{ route('login') }}" method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                          <div class="col-12">
                            <label for="yourEmail" class="form-label">Email</label>
                            <div class="input-group has-validation">
                              <span class="input-group-text" id="inputGroupPrepend">@</span>
                              <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Your Email" required>
                              <div class="invalid-feedback">Please enter your Email.</div>
                            </div>
                          </div>

                          <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <div class="input-group has-validation">
                              <span class="input-group-text" id="inputGroupPrepend">**</span>
                              <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Your Password" required>
                              <div class="invalid-feedback">Please enter your Password.</div>
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" value="false" id="rememberMe" >
                              <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                          </div>
                          <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                          </div>
                        </form>

                      </div>
                    </div>

                    <div class="credits">
                      Designed by <a href="https://escpl.com.np/">MIT</a>
                    </div>

                  </div>
                </div>
              </div>

            </section>

          </div>



        <script>
            toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": true,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        $(document).ready(function () {
            @error('email')
                var message = "{{$message}}";
                toastr.error(message);
            @enderror
            @error('password')
                var message = "{{$message}}";
                toastr.error(message);
            @enderror
        });
        </script>
      <!-- Vendor JS Files -->
      <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
      <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
      <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
      <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
      <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
      <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
      <!-- Template Main JS File -->
      <script src="{{asset('assets/js/main.js')}}"></script>
      @yield('footer')

    </body>

    </html>



