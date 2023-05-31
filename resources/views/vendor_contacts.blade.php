@extends('layouts.app')
@section('head')

@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url(images/contact-banner.png);  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Vendor Contacts</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
            <div class="container card mb-4 bg-light">

                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style="min-height: 35vw;">
                                <div class="card-body">
                                    <section>

                                        <!--Table-->
                                        <table class="table text-nowrap table-striped" id="table" class="display nowrap" style="width:100%">
                                            <!--Table head-->
                                            <thead style="background-color: #29469d;">

                                                <th class="text-light" scope="col">SN</th>
                                                <th class="text-light">Name of Party</th>

                                                <th class="text-light" scope="col">Address</th>
                                                <th class="text-light" scope="col">Supply</th>
                                                <th class="text-light" scope="col">Type</th>
                                                <th class="text-light" scope="col">Contact Person</th>
                                                <th class="text-light" scope="col">Contact Detail</th>

                                            </thead>
                                            <!--Table head-->
                                            @php
                                                $vendors = Get::vendors()
                                            @endphp
                                            <!--Table body-->
                                            <tbody class="text-center">
                                                @foreach ($vendors as $data)
                                                    <tr>
                                                        {{-- sn --}}
                                                        <th scope="row">{{ $data->id }}</th>
                                                        {{-- name --}}
                                                        <td>{{ $data->name }}</td>
                                                        {{-- address --}}
                                                        <td>{{ $data->address }}</td>
                                                        {{-- catagory --}}
                                                        <td>{{ $data->vendor_category->title }}</td>
                                                        {{-- subcatagory --}}
                                                        <td>{{ $data->vendor_type->title }}</td>
                                                        {{-- contact person --}}
                                                        <td>{{ $data->contact_person }}</td>
                                                        {{-- contact detail --}}
                                                        <td>{{ $data->contact_details }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <!--Table body-->
                                        </table>
                                        <!--Table-->

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>




    </main>
@endsection

