@extends('themes.layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Policy-Product Management</h1>

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
                  <h5 class="input-title">Policy-Product Add</h5>
              </div>

                <!-- Vertical Form -->
                <form class="row g-3 needs-validation" method="post" action="{{route('policy.update',$item->id)}}" enctype="multipart/form-data" novalidate >
                    @csrf
                    @method('PUT')
                  <div class="container-fluid p-2 input-container1">
                    <div class="row">
                      <div class="col-4">
                        <label for="title" class="input-label">Title</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('$item->title', $item->title)}}" required>
                            @error('title')
                            <div class="invalid-feedback">
                                Required title
                            </div>
                            @enderror

                        </div>
                      </div>
                      <div class="col-4">
                        <label for="document" class="input-label">Document</label>
                        <div class="input-group has-validation">
                            <input type="file" class="form-control" id="document" name="file" value="{{ old('$item->file', $item->file)}}" placeholder="Document*">
                            @error('file')
                            <div class="invalid-feedback">
                                Required document
                            </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container-fluid  p-2 input-container2">
                    <div class="col-12">
                      <label for="description" class="input-label">Description</label>
                      <div class="input-group has-validation">
                          <textarea class="form-control" name="description"  id="description" required >{{ old('$item->description', $item->description)}}</textarea>
                          @error('description')
                          <div class="invalid-feedback">
                            required description
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
@section('footer')
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection
