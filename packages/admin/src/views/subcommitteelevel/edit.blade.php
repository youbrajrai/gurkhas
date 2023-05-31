@extends('themes.layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sub Committee Level Management</h1>
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
                  <h5 class="input-title">Edit Sub Committee Levels</h5>
              </div>

                <!-- Vertical Form -->
                <form class="row g-3 needs-validation" method="post" action="{{route('subcommitteelevel.update',$item->id)}}" novalidate >
                    @csrf
                    @method('PUT')
                  <div class="container-fluid p-2 input-container1">
                    <div class="col-4">
                      <label for="committee-level" class="input-label">Sub Committee Level</label>
                      <div class="input-group has-validation">
                          <input type="text" class="form-control" id="committee-level" name="title" value="{{old('title',$item->title)}}" placeholder="Sub Committee Level*" required>
                          @error('title')
                          <div class="invalid-feedback">
                            Required sub-committee-level title
                        </div>
                          @enderror
                      </div>
                    </div>
                    <div class="col-4">
                        <label for="committee-level" class="input-label">Committee Level</label>
                        <div class="input-group has-validation">
                            <select id="committee-level" name="committee_level_id" class="form-select" required>
                                <option value="">Choose Committee Level...</option>
                                @foreach ($variables['committeelevel'] as $data)
                                    <option value="{{$data->id}}" {{$item->committee_level_id == $data->id?'selected':''}}>{{$data->title}}</option>
                                @endforeach
                            </select>
                            @error('committee_level_id')
                            <div class="invalid-feedback">
                              Required committee-level
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
