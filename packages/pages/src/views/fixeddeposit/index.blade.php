@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Interest Management</h1>

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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @can('fixeddeposit_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Fixed
                                    Deposit</button>
                            </li>
                        @endcan
                        @can('savingdeposit_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Savings
                                    Deposit</button>
                            </li>
                        @endcan
                        @can('loan_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false">Loans and
                                    Advances</button>
                            </li>
                        @endcan
                        @can('deprivesector_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="home2-tab" data-bs-toggle="tab" data-bs-target="#home2"
                                    type="button" role="tab" aria-controls="home2" aria-selected="true">Deprive Sector
                                    Lending</button>
                            </li>
                        @endcan
                        @can('fixedinterest_access')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="profile2-tab" data-bs-toggle="tab" data-bs-target="#profile2"
                                    type="button" role="tab" aria-controls="profile2" aria-selected="false">Fixed Interest
                                    Rate</button>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        {{-- tab 1 --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Fixed Deposit List</h5>
                                    </div>
                                    @can('fixeddeposit_create')
                                        <div class="container-fluid py-2">
                                            <a href="{{ route('fixeddeposit.create') }}"><button type="submit" class="btn py-2"
                                                    style="background-color: #03940a; color:white">Add New</button></a>
                                        </div>
                                    @endcan
                                    <!-- Default Table -->
                                    <div class="container-fluid"
                                        style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
                                        <div class="container card mb-4 bg-light">
                                            @php
                                               $years = $interestheads->pluck('fiscal_year')->unique()->sortByDesc(function ($item) { return $item->title;});
                                            @endphp
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($years as $year)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $year->id }}fd-head">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $year->id }}fd-head"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $year->id }}fd">
                                                                {{ $year->title }} Year
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $year->id }}fd-head"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $year->id }}fd-head"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                @foreach ($interestheads as $data)
                                                                    @if ($data->fiscal_year_id == $year->id)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="heading{{ $data->id }}fd-head">
                                                                                <button class="accordion-button collapsed"
                                                                                    type="button" data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapse{{ $data->id }}fd"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse{{ $data->id }}fd">
                                                                                    {{ $data->title }}
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapse{{ $data->id }}fd"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="heading{{ $data->id }}fd"
                                                                                data-bs-parent="#collapse{{ $data->id }}fd">
                                                                                <div class="accordion-body">
                                                                                    <div class="container-fluid">
                                                                                        @if ($data->fixed_deposit)
                                                                                            <div
                                                                                                class="container-fluid d-flex py-2 px-0 m-0">
                                                                                                @can('fixeddeposit_edit')
                                                                                                    <a
                                                                                                        href="{{ route('fixeddeposit.edit', $data->fixed_deposit->id) }}"><button
                                                                                                            type="submit"
                                                                                                            class="btn"
                                                                                                            style="background-color: #0b2982; color:white">Edit</button></a>
                                                                                                @endcan
                                                                                                @can('fixeddeposit_delete')
                                                                                                    <form
                                                                                                        action="{{ route('fixeddeposit.destroy', $data->fixed_deposit->id) }}"
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
                                                                                                <th class="text-light">
                                                                                                    Particulars
                                                                                                </th>
                                                                                                <th class="text-light">
                                                                                                    Individual
                                                                                                </th>
                                                                                                <th class="text-light">
                                                                                                    Individual(Remit)</th>
                                                                                                <th class="text-light">
                                                                                                    Institutional
                                                                                                </th>
                                                                                                <th class="text-light">
                                                                                                    Institutional(Bidding)
                                                                                                </th>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @if ($data->fixed_deposit)
                                                                                                    @php
                                                                                                        $particulars = json_decode($data->fixed_deposit->particulars);
                                                                                                        $individual = json_decode($data->fixed_deposit->individual);
                                                                                                        $individual_remit = json_decode($data->fixed_deposit->individual_remit);
                                                                                                        $institutional = json_decode($data->fixed_deposit->institutional);
                                                                                                        $institutional_renew = json_decode($data->fixed_deposit->institutional_renew);
                                                                                                    @endphp
                                                                                                    @if (is_array($particulars) || is_object($particulars))
                                                                                                    @foreach ($particulars as $index => $particular)
                                                                                                        <tr>
                                                                                                            <td>{{ $particular }}
                                                                                                            </td>
                                                                                                            <td>{{ $individual[$index] }}
                                                                                                            </td>
                                                                                                            <td>{{ $individual_remit[$index] }}
                                                                                                            </td>
                                                                                                            <td>{{ $institutional[$index] }}
                                                                                                            </td>
                                                                                                            <td>{{ $institutional_renew[$index] }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                    @endif
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
                        {{-- tab 2 --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Saving Deposit List</h5>
                                    </div>
                                    @can('savingdeposit_create')
                                        <div class="container-fluid py-2">
                                            <a href="{{ route('savingdeposit.create') }}">
                                                <div class="btn my-2" style="background-color: #03940a; color:white">Add New
                                                </div>
                                            </a>
                                        </div>
                                    @endcan
                                    <!-- Default Table -->
                                    <div class="container-fluid"
                                        style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
                                        <div class="container card mb-4 bg-light">
                                            @php
                                               $years = $interestheads->pluck('fiscal_year')->unique()->sortByDesc(function ($item) { return $item->title;});
                                            @endphp
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($years as $year)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header"
                                                            id="heading{{ $year->id }}saving-head">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $year->id }}saving-head"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $year->id }}saving">
                                                                {{ $year->title }} Year
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $year->id }}saving-head"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $year->id }}saving-head"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                @foreach ($interestheads as $data)
                                                                    @if ($data->fiscal_year_id == $year->id)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="heading{{ $data->id }}saving-head">
                                                                                <button class="accordion-button collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapse{{ $data->id }}saving"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse{{ $data->id }}saving">
                                                                                    {{ $data->title }}
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapse{{ $data->id }}saving"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="heading{{ $data->id }}saving"
                                                                                data-bs-parent="#collapse{{ $data->id }}saving">
                                                                                <div class="accordion-body">
                                                                                    <div class="container-fluid">
                                                                                        @if ($data->saving_deposit)
                                                                                            <div
                                                                                                class="container-fluid d-flex">
                                                                                                @can('savingdeposit_edit')
                                                                                                    <a
                                                                                                        href="{{ route('savingdeposit.edit', $data->saving_deposit->id) }}">
                                                                                                        <div class="btn my-2"
                                                                                                            style="background-color: #0b2982; color:white">
                                                                                                            Edit</div>
                                                                                                    </a>
                                                                                                @endcan
                                                                                                @can('savingdeposit_delete')
                                                                                                    <form
                                                                                                        action="{{ route('savingdeposit.destroy', $data->saving_deposit->id) }}"
                                                                                                        method="POST">
                                                                                                        @csrf @method('DELETE')
                                                                                                        <button
                                                                                                            onclick="return confirm('Do you want to delete this?')"
                                                                                                            style="border:none;background:none">
                                                                                                            <div class="btn my-2"
                                                                                                                style="background-color: #b80000; color:white">
                                                                                                                Delete</div>
                                                                                                        </button>
                                                                                                    </form>
                                                                                                @endcan
                                                                                            </div>
                                                                                        @endif
                                                                                        <table class="table table-striped"
                                                                                            id="table{{ $data->id }}">
                                                                                            <thead
                                                                                                style="background-color: #29469d;">
                                                                                                <th class="text-light">
                                                                                                    Saving Deposit</th>
                                                                                                <th class="text-light">
                                                                                                    Minimum Balance</th>
                                                                                                <th class="text-light">
                                                                                                    Interest Rate</th>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @if ($data->saving_deposit)
                                                                                                    @php
                                                                                                        $particulars = json_decode($data->saving_deposit->particulars);
                                                                                                        $min_balance = json_decode($data->saving_deposit->min_balance);
                                                                                                        $interest_rate = json_decode($data->saving_deposit->interest_rate);
                                                                                                    @endphp
                                                                                                    @if (is_array($particulars) || is_object($particulars))
                                                                                                    @foreach($particulars as $index => $particular)
                                                                                                        <tr>
                                                                                                            <td>{{ $particular }}
                                                                                                            </td>
                                                                                                            <td>{{ $min_balance[$index] }}
                                                                                                            </td>
                                                                                                            <td>{{ $interest_rate[$index] }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                    @endif
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
                        {{-- tab 3 --}}
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                                    <div class="container-fluid"
                                        style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
                                        <div class="container card mb-4 bg-light">
                                            @php
                                               $years = $interestheads->pluck('fiscal_year')->unique()->sortByDesc(function ($item) { return $item->title;});
                                            @endphp
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($years as $year)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $year->id }}loan-head">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $year->id }}loan-head"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $year->id }}loan">
                                                                {{ $year->title }} Year
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $year->id }}loan-head"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $year->id }}loan-head"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                @foreach ($interestheads as $data)
                                                                    @if ($data->fiscal_year_id == $year->id)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="heading{{ $data->id }}loan-head">
                                                                                <button class="accordion-button collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapse{{ $data->id }}loan-head"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse{{ $data->id }}loan">
                                                                                    {{ $data->title }}
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapse{{ $data->id }}loan-head"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="heading{{ $data->id }}loan-head"
                                                                                data-bs-parent="#collapse{{ $data->id }}loan-head">
                                                                                <div class="accordion-body">
                                                                                    <div
                                                                                        class="container-fluid d-flex py-2 px-0 m-0">
                                                                                        @if ($data->loan)
                                                                                            @can('loan_edit')
                                                                                                <a
                                                                                                    href="{{ route('loan.edit', $data->loan->id) }}"><button
                                                                                                        type="submit"
                                                                                                        class="btn"
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
                                                                                            <th class="text-light">Loan and
                                                                                                Advances
                                                                                            </th>
                                                                                            <th class="text-light">Interest
                                                                                                Rate
                                                                                            </th>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @if ($data->loan)
                                                                                                @php
                                                                                                    $particulars = json_decode($data->loan->particulars);
                                                                                                    $interest_rate = json_decode($data->loan->interest_rate);
                                                                                                @endphp
                                                                                                @if (is_array($particulars) || is_object($particulars))
                                                                                                @foreach ($particulars as $index => $particular)
                                                                                                    <tr>
                                                                                                        <td>{{ $particular }}
                                                                                                        </td>
                                                                                                        <td>{{ $interest_rate[$index]??0 }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                @endif
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
                        {{-- tab 4 --}}
                        <div class="tab-pane fade" id="home2" role="tabpanel" aria-labelledby="home2-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Deprive Sector Lending List</h5>
                                    </div>
                                    @can('deprivesector_create')
                                        <div class="container-fluid py-2">
                                            <a href="{{ route('deprive_sector.create') }}"><button type="submit"
                                                    class="btn py-2" style="background-color: #03940a; color:white">Add
                                                    New</button></a>
                                        </div>
                                    @endcan
                                    <!-- Default Table -->
                                    <div class="container-fluid"
                                        style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
                                        <div class="container card mb-4 bg-light">
                                            @php
                                               $years = $interestheads->pluck('fiscal_year')->unique()->sortByDesc(function ($item) { return $item->title;});
                                            @endphp
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($years as $year)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header"
                                                            id="heading{{ $year->id }}deprive-head">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $year->id }}deprive-head"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $year->id }}deprive">
                                                                {{ $year->title }} Year
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $year->id }}deprive-head"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $year->id }}deprive-head"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                @foreach ($interestheads as $data)
                                                                    @if ($data->fiscal_year_id == $year->id)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="heading{{ $data->id }}deprive-head">
                                                                                <button class="accordion-button collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapse{{ $data->id }}deprive-head"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse{{ $data->id }}deprive-head">
                                                                                    {{ $data->title }}
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapse{{ $data->id }}deprive-head"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="heading{{ $data->id }}deprive-head"
                                                                                data-bs-parent="#collapse{{ $data->id }}deprive-head">
                                                                                <div class="accordion-body">
                                                                                    <div
                                                                                        class="container-fluid d-flex py-2 px-0 m-0">
                                                                                        @if ($data->deprive_sector)
                                                                                            @can('deprivesector_edit')
                                                                                                <a
                                                                                                    href="{{ route('deprive_sector.edit', $data->deprive_sector->id) }}"><button
                                                                                                        type="submit"
                                                                                                        class="btn"
                                                                                                        style="background-color: #0b2982; color:white">Edit</button></a>
                                                                                            @endcan
                                                                                            @can('deprivesector_delete')
                                                                                                <form
                                                                                                    action="{{ route('deprive_sector.destroy', $data->deprive_sector->id) }}"
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
                                                                                            <th class="text-light">Deprive
                                                                                                Sector
                                                                                                Lending</th>
                                                                                            <th class="text-light">Interest
                                                                                                Rate
                                                                                            </th>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @if ($data->deprive_sector)
                                                                                                @php
                                                                                                    $particulars = json_decode($data->deprive_sector->particulars);
                                                                                                    $interest_rate = json_decode($data->deprive_sector->interest_rate);
                                                                                                @endphp
                                                                                                @if (is_array($particulars) || is_object($particulars))
                                                                                                @foreach ($particulars as $index => $particular)
                                                                                                    <tr>
                                                                                                        <td>{{ $particular }}
                                                                                                        </td>
                                                                                                        <td>{{ $interest_rate[$index] }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                @endif
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
                        {{-- tab 5 --}}
                        <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile2-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid d-flex justify-content-center mb-3">
                                        <h5 class="input-title">Fixed Interest List</h5>
                                    </div>
                                    @can('fixedinterest_create')
                                        <div class="container-fluid py-2">
                                            <a href="{{ route('fixedinterest.create') }}"><button type="submit"
                                                    class="btn py-2" style="background-color: #03940a; color:white">Add
                                                    New</button></a>
                                        </div>
                                    @endcan
                                    <!-- Default Table -->
                                    <div class="container-fluid"
                                        style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
                                        <div class="container card mb-4 bg-light">
                                            @php
                                               $years = $interestheads->pluck('fiscal_year')->unique()->sortByDesc(function ($item) { return $item->title;});
                                            @endphp
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($years as $year)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $year->id }}fi-head">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $year->id }}fi-head"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $year->id }}fi">
                                                                {{ $year->title }} Year
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $year->id }}fi-head"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $year->id }}fi-head"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                @foreach ($interestheads as $data)
                                                                    @if ($data->fiscal_year_id == $year->id)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="heading{{ $data->id }}fi-head">
                                                                                <button class="accordion-button collapsed"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#collapse{{ $data->id }}fi-head"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse{{ $data->id }}fi-head">
                                                                                    {{ $data->title }}
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapse{{ $data->id }}fi-head"
                                                                                class="accordion-collapse collapse"
                                                                                aria-labelledby="heading{{ $data->id }}fi"
                                                                                data-bs-parent="#collapse{{ $data->id }}fi">
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
                                                                                                <th class="text-light">
                                                                                                    Particulars
                                                                                                </th>
                                                                                                <th class="text-light">Upto
                                                                                                    5 Years
                                                                                                </th>
                                                                                                <th class="text-light">
                                                                                                    5 to 10 Years</th>
                                                                                                <th class="text-light">
                                                                                                    Above 10
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
                                                                                                    @if (is_array($particulars) || is_object($particulars))
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
