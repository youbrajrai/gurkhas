@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Fixed Interest Management</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-center mb-3">
                                <h5 class="input-title">Fixed Interest List</h5>
                            </div>
                            @can('fixedinterest_create')
                                <div class="container-fluid py-2">
                                    <a href="{{ route('fixedinterest.create') }}"><button type="submit" class="btn py-2"
                                            style="background-color: #03940a; color:white">Add New</button></a>
                                </div>
                            @endcan
                            <!-- Default Table -->
                            <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
                                <div class="container card mb-4 bg-light">
                                    @php
                                       $years = $interestheads->pluck('fiscal_year')->unique()->sortByDesc(function ($item) { return $item->title;});
                                    @endphp
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($years as $year)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $year->id }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $year->id }}" aria-expanded="false"
                                                        aria-controls="collapse{{ $year->id }}">
                                                        {{ $year->title }} Year
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $year->id }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $year->id }}"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        @foreach ($interestheads as $data)
                                                            @if ($data->fiscal_year_id == $year->id)
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
                                                                            <div class="container-fluid">
                                                                                @if ($data->fixed_interest)
                                                                                    <div
                                                                                        class="container-fluid d-flex py-2 px-0 m-0">
                                                                                        @can('fixedinterest_edit')
                                                                                            <a
                                                                                                href="{{ route('fixedinterest.edit', $data->fixed_interest->id) }}"><button
                                                                                                    type="submit"
                                                                                                    class="btn"
                                                                                                    style="background-color: #0b2982; color:white">Edit</button></a>
                                                                                        @endcan
                                                                                        @can('fixedinterest_delete')
                                                                                            <form
                                                                                                action="{{ route('fixedinterest.destroy', $data->fixed_interest->id) }}"
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
                                                                                    </div>
                                                                                @endif

                                                                                <table
                                                                                    class="table table-striped table-hover"
                                                                                    id="table{{ $data->id }}">
                                                                                    <!--Table head-->
                                                                                    <thead
                                                                                        style="background-color: #29469d;">
                                                                                        <th class="text-light">Particulars
                                                                                        </th>
                                                                                        <th class="text-light">Upto 5 Years
                                                                                        </th>
                                                                                        <th class="text-light">
                                                                                            5 to 10 Years</th>
                                                                                        <th class="text-light">Above 10
                                                                                            Years
                                                                                        </th>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @if ($data->fixed_interest)
                                                                                            @php
                                                                                                $particulars = json_decode($data->fixed_interest->particulars);
                                                                                                $upto5years = json_decode($data->fixed_interest->upto5years);
                                                                                                $fivetotenyears = json_decode($data->fixed_interest->fivetotenyears);
                                                                                                $above10years = json_decode($data->fixed_interest->above10years);
                                                                                            @endphp
                                                                                            @foreach ($particulars as $index => $particular)
                                                                                                <tr>
                                                                                                    <td>{{ $particular }}
                                                                                                    </td>
                                                                                                    <td>{{ $upto5years[$index] }}
                                                                                                    </td>
                                                                                                    <td>{{ $fivetotenyears[$index] }}
                                                                                                    </td>
                                                                                                    <td>{{ $above10years[$index] }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
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
