@extends('themes.layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Standard Terrif Management</h1>

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
                  <h5 class="input-title">Edit Standard Terrif</h5>
              </div>

                <!-- Vertical Form -->
                <form class="row g-3 needs-validation" method="post" action="{{route('standardterrif.update',$standardTerrif->id)}}" novalidate >
                    @csrf
                    @method('PUT')
                    <div class="container-fluid p-2 input-container1">
                        <div class="row">
                            <div class="col-4">
                                <label for="interest-head" class="input-label">Standard Terrif Head</label>
                                <div class="input-group has-validation">
                                    <select id="interest-head" name="standard_terrif_head_id" class="form-select" required>
                                        <option value="">Choose...</option>
                                        @foreach ($standard_terrif_heads as $data)
                                            <option value="{{$data->id}}" {{$standardTerrif->standard_terrif_head_id == $data->id?'selected':''}}>{{$data->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('standard_terrif_head_id')
                                    <div class="invalid-feedback">
                                        required interest-type
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="type" class="input-label">Type</label>
                                <div class="input-group has-validation">
                                  <select class="form-control" id="type-select" name="type" required>
                                      <option value="">Choose...</option>
                                      @foreach (config('SOC-types') as $item)
                                        <option value={{$item['value']}} {{$standardTerrif->type == $item['value']?'selected':''}}>{{$item['name']}}</option>
                                      @endforeach
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">
                                      Required type
                                  </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                        <table class="table" id="table1">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Particulars</th>
                                    <th>Rate</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            @if (is_array($standardTerrif) || is_object($standardTerrif))
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
                                    <input type="text" class="form-control @error('rate[]') is-invalid @enderror" name="rate[][]" id="rate[]" placeholder="Rate">
                                    @error('rate[]')
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
var data = @json($standardTerrif);
var rowIdx = 0;
for (i = 0; i < JSON.parse(data.particulars).length; i++) {
  $('#tbody').append(`<tr id="R${++rowIdx}">
        <td class="text-left">
            <input type="text" class="form-control @error('particulars[]') is-invalid @enderror" name="particulars[]" value="${JSON.parse(data.particulars)[i]}" id="particulars" placeholder="Particulars*" required>
            @error('particulars[]')
            <span class="text-danger" role="alert">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </td>
        <td class="text-left">
            <input type="text" class="form-control @error('rate[]') is-invalid @enderror" name="rate[]" value="${JSON.parse(data.rate)[i]}" id="rate[]" placeholder="Rate*" required>
            @error('rate[]')
            <span class="text-danger" role="alert">
                <p>{{ $message }}</p>
            </span>
            @enderror
        </td>
        <td class="text-left">
            <button class="btn btn-danger remove" type="button">Remove</button>
        </td>
    </tr>`);
}
    $('document').ready(function(){
    $('#addMore').click(function(e){
        e.preventDefault();
        var rowIdx = 0;
        $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="text-left">
                                    <input type="text" class="form-control @error('particulars[]') is-invalid @enderror" name="particulars[]" id="particulars" placeholder="Particulars*" required>
                                    @error('particulars[]')
                                    <span class="text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </td>
                                <td class="text-left">
                                    <input type="text" class="form-control @error('rate[]') is-invalid @enderror" name="rate[]" id="rate[]" placeholder="Rate*" required>
                                    @error('rate[]')
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
