@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Loan and Advances Management</h1>

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
                                <h5 class="input-title">Loan and Advances List</h5>
                            </div>
                            @can('loan_create')
                                <div class="container-fluid py-2">
                                    <a href="{{ route('loan.create') }}"><button type="submit" class="btn py-2"
                                            style="background-color: #03940a; color:white">Add New</button></a>
                                </div>
                            @endcan
                            <!-- Default Table -->
                            <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
                                <div class="container card mb-4 bg-light">
                                    @php
                                        $years = $interestheads->pluck('year')->unique();
                                    @endphp
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($years as $year)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $year }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $year }}" aria-expanded="false"
                                                        aria-controls="collapse{{ $year }}">
                                                        {{ $year }} Year
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $year }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $year }}"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        @foreach ($interestheads as $data)
                                                            @if ($data->year == $year)
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="heading{{ $data->id }}">
                                                                        <button class="accordion-button collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse{{ $data->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapse{{ $data->id }}">
                                                                            {{ $data->title }}
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapse{{ $data->id }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="heading{{ $data->id }}"
                                                                        data-bs-parent="#collapse{{ $data->id }}">
                                                                        <div class="accordion-body">
                                                                            <div
                                                                                class="container-fluid d-flex py-2 px-0 m-0">
                                                                                @if ($data->loan)
                                                                                    @can('loan_edit')
                                                                                        <a
                                                                                            href="{{ route('loan.edit', $data->loan->id) }}"><button
                                                                                                type="submit" class="btn"
                                                                                                style="background-color: #0b2982; color:white">Edit</button></a>
                                                                                    @endcan
                                                                                    @can('loan_delete')
                                                                                        <form
                                                                                            action="{{ route('loan.destroy', $data->loan->id) }}"
                                                                                            method="POST">
                                                                                            @csrf @method('DELETE')
                                                                                            <button
                                                                                                onclick="return confirm('Do you want to delete this?')"
                                                                                                style="border:none;background:none">
                                                                                                <div class="btn"
                                                                                                    style="background-color: #b80000; color:white">
                                                                                                    Delete</div>
                                                                                            </button>
                                                                                        </form>
                                                                                    @endcan
                                                                                @endif
                                                                            </div>
                                                                            <table class="table table-striped"
                                                                                id="table{{ $data->id }}">
                                                                                <thead
                                                                                    style="background-color: #29469d; color: white; ">
                                                                                    <th class="text-light">Loan and Advances
                                                                                    </th>
                                                                                    <th class="text-light">Interest Rate
                                                                                    </th>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @if ($data->loan)
                                                                                        @php
                                                                                            $particulars = json_decode($data->loan->particulars);
                                                                                            $interest_rate = json_decode($data->loan->interest_rate);
                                                                                        @endphp
                                                                                        @foreach ($particulars as $index => $particular)
                                                                                            <tr>
                                                                                                <td>{{ $particular }}
                                                                                                </td>
                                                                                                <td>{{ $interest_rate[$index] }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            @foreach ($interestheads as $data)
                $('#table{{ $data->id }}').DataTable().destroy();
            @endforeach
        });
    </script>
@endsection
