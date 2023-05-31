@extends('themes.layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Charges Management</h1>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="container-fluid d-flex justify-content-center mb-3">
                  <h5 class="input-title">Charge List</h5>
              </div>

                <!-- Default Table -->
                <table class="table text-nowrap table-striped" id="table" class="display nowrap" style="width:100%">
                  <thead style="background-color: #29469d;">
                    <tr>
                      <th class="text-light" scope="col">SN</th>
                      <th class="text-light" scope="col">Charge Type</th>
                      <th class="text-light" scope="col">Charge Title</th>
                      <th class="text-light" scope="col">Rate</th>
                      <th class="text-light" scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($variables['charge'] as $key => $data)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>
                            @foreach($data->chargetype as $chargeType)
                                {{$chargeType->title}}
                            @endforeach
                        <td>{{$data->title}}</td>
                        <td>{{$data->rate}}</td>
                        <td>
                            <div class="container-fluid d-flex">
                            @can('charge_edit')
                            <a href="{{route('charge.edit',$data->id)}}"><i class="bi bi-pencil-square"></i></a>
                            @endcan
                            @can('charge_delete')
                            <form action="{{route("charge.destroy",$data->id)}}"
                                method="POST">
                                @csrf @method("DELETE")
                                <button onclick="return confirm('Do you want to delete this?')" style="border:none;background:none">
                                  <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            @endcan
                            </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- End Default Table Example -->
              </div>
            </div>
          </div>
        </div>
      </section>
  </main><!-- End #main -->
@endsection
