@extends('themes.layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Fixed Deposit Management</h1>

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
                  <h5 class="input-title">Edit Fixed Deposit</h5>
              </div>

                <!-- Vertical Form -->
                <form class="row g-3 needs-validation" method="post" action="{{route('fixeddeposit.update',$fixedDeposit->id)}}" novalidate >
                    @csrf
                    @method('PUT')
                    <div class="container-fluid p-2 input-container1">
                        <div class="row">
                            <div class="col-4">
                                <label for="interest-head" class="input-label">Interest head</label>
                                <div class="input-group has-validation">
                                    <select id="interest-head" name="interest_head_id" class="form-select" required>
                                        <option value="">Choose...</option>
                                        @foreach ($interestheads as $data)
                                            <option value="{{$data->id}}" {{$fixedDeposit->interest_head_id==$data->id?'selected':''}}>{{$data->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('interest_head_id')
                                    <div class="invalid-feedback">
                                        required interest-type
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover" id="table1">
                        <!--Table head-->
                        <thead style="background-color: #29469d;">
                                <tr>
                                    <th class="text-light">Particulars</th>
                                    <th class="text-light">Individual</th>
                                    <th class="text-light">Individual(Remit)</th>
                                    <th class="text-light">Institutional</th>
                                    <th class="text-light">Institutional(Bidding)</th>
                                    <th class="text-light">Remove</th>
                                </tr>
                            </thead>
                            @if (is_array($fixedDeposit) || is_object($fixedDeposit))
                            <tbody id="tbody" style="text-align: center">
                                {{-- <td class="text-left">
                                    <input type="text" class="form-control @error('particulars') is-invalid @enderror" name="particulars[]" id="particulars" placeholder="Title">
                                    @error('particulars[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('individual[]') is-invalid @enderror" name="individual[]" id="individual[]" placeholder="Individual">
                                    @error('individual[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('individual_remit[]') is-invalid @enderror" name="individual_remit[][]" id="individual_remit[]" placeholder="Individual(Remit)">
                                    @error('individual_remit[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('institutional[]') is-invalid @enderror" name="institutional[]" id="institutional" placeholder="Title">
                                    @error('institutional[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('institutional_renew[]') is-invalid @enderror" name="institutional_renew[]" id="institutional_renew" placeholder="Title">
                                    @error('institutional_renew[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror

                                </td>
                                <td class="text-left">
                                    <button class="btn btn-danger remove"
                                        type="button">Remove</button>
                                </td> --}}
                            </tbody>
                            @endif
                        </table>
                        <div class="row">
                            <button class="btn btn-md btn-success" id="addMore">Add more</button>
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
//passing array objects to input in the form
var data = @json($fixedDeposit);
var rowIdx = 0;
for (i = 0; i < JSON.parse(data.particulars).length; i++) {
  $('#tbody').append(`<tr id="R${++rowIdx}">
        <td class="text-left">
            <input type="text" class="form-control @error('particulars') is-invalid @enderror" name="particulars[]" value="${JSON.parse(data.particulars)[i]}" id="particulars" placeholder="Particulars*" required>
            @error('particulars[]')
            <span class="text-danger" role="alert">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </td>
        <td class="text-left">
            <input type="text" class="form-control @error('individual[]') is-invalid @enderror" name="individual[]" value="${JSON.parse(data.individual)[i]}" id="individual[]" placeholder="Individual*" required>
            @error('individual[]')
            <span class="text-danger" role="alert">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </td>
        <td class="text-left">
            <input type="text" class="form-control @error('individual_remit[]') is-invalid @enderror" name="individual_remit[]" value="${JSON.parse(data.individual_remit)[i]}" id="individual_remit[]" placeholder="Individual(Remit)*" required>
            @error('individual_remit[]')
            <span class="text-danger" role="alert">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </td>
        <td class="text-left">
            <input type="text" class="form-control @error('institutional[]') is-invalid @enderror" name="institutional[]" value="${JSON.parse(data.institutional)[i]}" id="institutional" placeholder="Institutional*" required>
            @error('institutional[]')
            <span class="text-danger" role="alert">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </td>
        <td class="text-left">
            <input type="text" class="form-control @error('institutional_renew[]') is-invalid @enderror" name="institutional_renew[]" value="${JSON.parse(data.institutional_renew)[i]}" id="institutional_renew" placeholder="Institutional(Bidding)*" required>
            @error('institutional_renew[]')
            <span class="text-danger" role="alert">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </td>
        <td class="text-left">
            <button class="btn remove"  style="background-color: #b80000; color:white" type="button">Remove</button>
        </td>
    </tr>`);
}
    $('document').ready(function(){
    $('#addMore').click(function(e){
        e.preventDefault();
        var rowIdx = 0;
        $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="text-left">
                                    <input type="text" class="form-control @error('particulars') is-invalid @enderror" name="particulars[]" id="particulars" placeholder="Particulars*" required>
                                    @error('particulars[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('individual[]') is-invalid @enderror" name="individual[]" id="individual[]" placeholder="Individual*" required>
                                    @error('individual[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('individual_remit[]') is-invalid @enderror" name="individual_remit[]" id="individual_remit[]" placeholder="Individual(Remit)*" required>
                                    @error('individual_remit[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('institutional[]') is-invalid @enderror" name="institutional[]" id="institutional" placeholder="Institutional*" required>
                                    @error('institutional[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('institutional_renew[]') is-invalid @enderror" name="institutional_renew[]" id="institutional_renew" placeholder="Institutional(Bidding)*" required>
                                    @error('institutional_renew[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror

                                </td>
                                <td class="text-left">
                                    <button class="btn btn-danger remove"
                                        type="button">Remove</button>
                                </td>`);

        });
});
 // jQuery button click event to remove a row.
 $('#tbody').on('click', '.remove', function () {

  // Getting all the rows next to the row
  // containing the clicked button
  var child = $(this).closest('tr').nextAll();

  // Iterating across all the rows
  // obtained to change the index
  child.each(function () {

    // Getting <tr> id.
    var id = $(this).attr('id');

    // Getting the <p> inside the .row-index class.
    var idx = $(this).children('.row-index').children('p');

    // Gets the row number from <tr> id.
    var dig = parseInt(id.substring(1));

    // Modifying row index.
    idx.html(`Row ${dig - 1}`);

    // Modifying row id.
    $(this).attr('id', `R${dig - 1}`);
  });

  // Removing the current row.
  $(this).closest('tr').remove();

  // Decreasing total number of rows by 1.
//   rowIdx--;
});

</script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable().destroy();
    });
</script>
@endsection
