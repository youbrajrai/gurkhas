@extends('themes.layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Loan and Deposits Management</h1>

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
                  <h5 class="input-title">Edit Loan and Deposits</h5>
              </div>

                <!-- Vertical Form -->
                <form class="row g-3 needs-validation" method="post" action="{{route('loandeposit.update',$item->id)}}" novalidate >
                    @csrf
                    @method('PUT')
                  <div class="container-fluid p-2 input-container1">
                    <div class="row">
                        <div class="col-4">
                            <label for="Branch" class="input-label">Branch</label>
                            <div class="input-group has-validation">
                                @if(Auth::user()->IsAdmin)
                                <select id="Branch" class="form-select" name="branch_id" required>
                                    <option value="">Choose Branch...</option>
                                    @foreach ($variables['branch'] as $data)
                                        <option value="{{$data->id}}"{{$data->id === $item->branch_id ? 'selected' : '' }}>{{$data->title}}</option>
                                    @endforeach
                                </select>
                                @else
                                <select id="Branch" class="form-select" name="branch_id" required>
                                    <option value="{{Auth::user()->employeeDetails->branch->id}}">{{Auth::user()->employeeDetails->branch->title}}</option>
                                </select>
                                @endif
                                @error('branch_id')
                                <div class="invalid-feedback">
                                    required Branch
                                </div>
                                @enderror
                            </div>
                        </div>
                      <div class="col-4">
                        <label for="loan_issued" class="input-label">Loan Issued</label>
                        <div class="input-group has-validation">
                            <input type="number" class="form-control" id="loan_issued" min=0 name="loan_issued" value="{{old('loan_issued',$item->loan_issued)}}" placeholder="Loan Issued*" required>
                            @error('loan_issued')
                            <div class="invalid-feedback">
                                required loan_issued
                            </div>
                            @enderror
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="deposit" class="input-label">Deposit</label>
                        <div class="input-group has-validation">
                            <input type="number" class="form-control" id="deposit" name="deposit" min=0  value="{{old('deposit',$item->deposit)}}" placeholder="Deposit*" required>
                            @error('deposit')
                            <div class="invalid-feedback">
                                required deposit
                            </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container-fluid p-2 input-container2">
                    <div class="row">
                        <div class="col-4">
                            <label for="created_date" class="input-label">Nepali Date</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control"
                                    id="created_date_nepali" name="nepali_date"
                                    placeholder="Date*" required>
                                @error('created_date')
                                    <div class="invalid-feedback">
                                        required Date
                                    </div>
                                @enderror

                            </div>
                        </div>
                      <div class="col-4">
                        <label for="created_date" class="input-label">English Date</label>
                        <div class="input-group has-validation">
                            <input type="date" class="form-control" id="created_date" name="created_date" value="{{old('created_date',$item->created_date)}}" placeholder="Date*" required>
                            @error('created_date')
                            <div class="invalid-feedback">
                                required Date
                            </div>
                            @enderror

                        </div>
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
        $('#created_date_nepali').nepaliDatePicker({
            dateFormat: '%y-%m-%d',
            closeOnDateSelect: true,
        });
        $('#created_date_nepali').on("dateChange", function(event) {

            var formattedDate = event.datePickerData.adDate.toISOString().substr(0, 10); // Format the date as YYYY-MM-DD

            $('#created_date').val(formattedDate)
        });
    </script>
@stop
