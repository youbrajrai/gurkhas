@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Outstation Management</h1>

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
                                <h5 class="input-title">Outstation Edit</h5>
                            </div>
                <!-- Vertical Form -->
                <form class="row g-3 needs-validation" method="Post" action="{{route('outstation.update',$item->id)}}" novalidate >
                    @csrf
                    @method('PUT')
                  <div class="container-fluid p-2 input-container1">
                    <div class="row">
                        <div class="col-4">
                            <label for="employee" class="input-label">Employee</label>
                            <div class="input-group has-validation">
                                @php
                                if(Auth::user()->IsAdmin){
                                  $users = $variables['user'];

                                }
                                else{
                                  $users = App\Models\User::whereHas('employeeDetails.branch',function($query){
                                    $query->where('id',Auth::user()?->employeeDetails?->branch->id);
                                  })->get();
                                }
                                @endphp
                                <select id="user_id" class="form-select select2" name="user_id" required>
                                    <option >Choose User...</option>
                                    @foreach ($users as $data)
                                        <option value="{{$data->id}}"{{$item->user_id == ($data->id)?'selected':''}}>{{$data->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback">
                                    required employee
                                </div>
                                @enderror

                            </div>
                          </div>
                          <div class="col-4">
                            <label for="travel-place" class="input-label">Travel Place</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="travel-place" name="travel_place" value="{{ old('$item->travel_place', $item->travel_place)}}" placeholder="Travel Place" required>
                                @error('travel_place')
                                <div class="invalid-feedback">
                                    required Travel Place
                                </div>
                                @enderror

                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="container-fluid p-2 input-container2">
                    <div class="row">
                        <div class="col-4">
                            <label for="out-time" class="input-label">Out Time</label>
                            <div class="input-group has-validation">
                                <input type="time" class="form-control" id="out-time" name="outtime" value="{{ old('$item->outtime', $item->outtime)}}" placeholder="Out Time*" required>
                                @error('outtime')
                                <div class="invalid-feedback">
                                    required out-time
                                </div>
                                @enderror

                            </div>
                        </div>
                        <div class="col-4">
                            <label for="estimated-return-time" class="input-label">Estimiated Return Time</label>
                            <div class="input-group has-validation">
                                <input type="time" class="form-control" id="estimated-return-time" name="estimated_return_time" value="{{ old('$item->estimated_return_time', $item->estimated_return_time)}}"placeholder="Estimiated Return Time*" required>
                                @error('estimated_return_time')
                                <div class="invalid-feedback">
                                    required estimated-return-time
                                </div>
                                @enderror

                            </div>
                        </div>
                        <div class="col-4">
                            <label for="actual-return-time" class="input-label">Actual Return Time</label>
                            <div class="input-group has-validation">
                                <input type="time" class="form-control" id="actual-return-time" name="actual_return_time" value="{{ old('$item->actual_return_time', $item->actual_return_time)}}"placeholder="Actual Return Time*" required>
                                @error('actual_return_time')
                                <div class="invalid-feedback">
                                    required actual-return-time
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="container-fluid p-2 input-container1">
                    <div class="col-4">
                        <label for="remarks" class="input-label">Remarks</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="remarks" name="remarks" value="{{ old('$item->remarks', $item->remarks)}}" placeholder="Remarks*" required>
                            @error('remarks')
                            <div class="invalid-feedback">
                                required remarks
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
    $(function () {
        $('.select2').select2();
        $('.select-all').click(function () {
            let val = $(this).parent().siblings('select');
            if (val) {
                val.children().prop("selected", "selected");
                val.trigger("change");
            }
        })
        $('.deselect-all').click(function () {
            let val = $(this).parent().siblings('select');
            if (val) {
                val.children().removeAttr("selected");
                val.trigger("change");
            }
        })
    });
</script>
@endsection
