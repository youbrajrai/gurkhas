@extends('themes.layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Department Management</h1>
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
                  <h5 class="input-title">Edit Department</h5>
              </div>

                <!-- Vertical Form -->
                <form class="row g-3 needs-validation" method="post" action="{{route('department.update',$item->id)}}" novalidate >
                    @csrf
                    @method('PUT')
                  <div class="container-fluid p-2 input-container1">
                    <div class="col-4">
                      <label for="deparment" class="input-label">Department</label>
                      <div class="input-group has-validation">
                          <input type="text" class="form-control" id="deparment" name="title" value="{{old('title',$item->title)}}" placeholder="Department*" required>
                          @error('title')
                          <div class="invalid-feedback">
                            Required deparment title
                        </div>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="text-start">
                    <button type="submit" class="btn" style="background-color: #0b2982; color:white">Submit</button>
                    <button type="reset" class="btn" style="background-color: #b80000; color:white">Reset</button>
                  </div>
                </form><!-- Vertical Form -->

              </div>
            </div>


          </div>
        </div>
      </section>
  </main><!-- End #main -->
@endsection
