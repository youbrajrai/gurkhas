@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url({{ asset('images/interest-banner.png') }});  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Interest Rates</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
            <div class="container card mb-4 bg-light">
                @php
                    $latest_interest = Get::latest_interest();
                @endphp

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $latest_interest->id }}latest" aria-expanded="false"
                                aria-controls="collapse{{ $latest_interest->id }}latest">
                                {{ $latest_interest->title }}
                                (@foreach (config('nepali-months') as $item)
                                    @if ($item['value'] == $latest_interest->month)
                                        {{ $item['name'] }}
                                    @endif
                                @endforeach
                                ,{{ $latest_interest->fiscal_year->title }} )
                            </button>
                        </h2>
                        <div id="collapse{{ $latest_interest->id }}latest" class="accordion-collapse collapse"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body d-flex justify-content-center px-5">
                                <div class="container-fluid">
                                    @if ($latest_interest->fixed_deposit)
                                    <h2>Fixed Deposit</h2>
                                        <table class="table table-striped">
                                            <thead style="background-color: #29469d; color: white; ">
                                                <th>Particulars</th>
                                                <th>Individual</th>
                                                <th>Individual(Remit)</th>
                                                <th>Institutional</th>
                                                <th>Institutional(Bidding)</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $particulars = json_decode($latest_interest?->fixed_deposit->particulars);
                                                    $individual = json_decode($latest_interest?->fixed_deposit->individual);
                                                    $individual_remit = json_decode($latest_interest?->fixed_deposit->individual_remit);
                                                    $institutional = json_decode($latest_interest?->fixed_deposit->institutional);
                                                    $institutional_renew = json_decode($latest_interest?->fixed_deposit->institutional_renew);
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
                                            </tbody>
                                        </table>
                                    @endif
                                    @if ($latest_interest->saving_deposit)
                                        <h2>Savings Deposit</h2>
                                        <table class="table table-striped">
                                            <thead style="background-color: #29469d; color: white; ">

                                                <th>Saving Deposits</th>
                                                <th>Minimum Balance Rs.</th>
                                                <th>Interest Rate</th>

                                            </thead>
                                            <tbody>

                                                @php
                                                    $particulars = json_decode($latest_interest?->saving_deposit->particulars);
                                                    $min_balance = json_decode($latest_interest?->saving_deposit->min_balance);
                                                    $interest_rate = json_decode($latest_interest?->saving_deposit->interest_rate);
                                                @endphp
                                                @if (is_array($particulars) || is_object($particulars))
                                                @foreach ($particulars as $index => $particular)
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
                                            </tbody>
                                        </table>
                                    @endif
                                    @if ($latest_interest->loan)
                                        <h2>Loans And Advances</h2>
                                        <table class="table table-striped">
                                            <thead style="background-color: #29469d; color: white; ">
                                                <th>Loans and Advances</th>
                                                <th>Interest Rate %</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $particulars = json_decode($latest_interest->loan->particulars);
                                                    $interest_rate = json_decode($latest_interest->loan->interest_rate);
                                                @endphp
                                                @if (is_array($particulars) || is_object($particulars))
                                                @foreach ($particulars as $index => $particular)
                                                    <tr>
                                                        <td>{{ $particular }}</td>
                                                        <td>{{ $interest_rate[$index] }}</td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    @endif
                                    @if ($latest_interest->deprive_sector)
                                    <h2>Deprive Sector</h2>
                                        <table class="table table-striped">
                                            <thead style="background-color: #29469d; color: white; ">
                                                <th>Deprive Sector Lending</th>
                                                <th>Interest Rate %</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $particulars = json_decode($latest_interest->deprive_sector->particulars);
                                                    $interest_rate = json_decode($latest_interest->deprive_sector->interest_rate);
                                                @endphp
                                                @if (is_array($particulars) || is_object($particulars))
                                                @foreach ($particulars as $index => $particular)
                                                    <tr>
                                                        <td>{{ $particular }}</td>
                                                        <td>{{ $interest_rate[$index] }}</td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    @endif
                                    @if ($latest_interest->fixed_interest)
                                    <h2>Fixed Deposit</h2>
                                        <table class="table table-striped">
                                            <thead style="background-color: #29469d; color: white; ">
                                                <th>Fixed Interest Rate Loan (for individual)</th>
                                                <th>Upto 5 Years</th>
                                                <th>5 to 10 Years</th>
                                                <th>Above 10 Years</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $particulars = json_decode($latest_interest->fixed_interest->particulars);
                                                    $upto5years = json_decode($latest_interest->fixed_interest->upto5years);
                                                    $fivetotenyears = json_decode($latest_interest->fixed_interest->fivetotenyears);
                                                    $above10years = json_decode($latest_interest->fixed_interest->above10years);
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
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $interestheads = Get::interest();
                       $years = $interestheads->pluck('fiscal_year')->unique()->sortByDesc(function ($item) { return $item->title;});
                    @endphp
                    <div class="accordion" id="accordionExample">
                        @foreach ($years as $year)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $year->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $year->id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $year->id }}">
                                        {{ $year->title }} Year
                                    </button>
                                </h2>
                                <div id="collapse{{ $year->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $year->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @foreach ($interestheads as $data)
                                            @if ($data->fiscal_year_id == $year->id)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $data->id }}">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $data->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse{{ $data->id }}">
                                                            {{ $data->title }}
                                                            (@foreach (config('nepali-months') as $item)
                                                                @if ($item['value'] == $data->month)
                                                                    {{ $item['name'] }}
                                                                @endif
                                                            @endforeach)
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $data->id }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ $data->id }}"
                                                        data-bs-parent="#collapse{{ $data->id }}">
                                                        <div class="accordion-body">
                                                            <div class="container-fluid">
                                                                @if ($data->fixed_deposit)
                                                                <h2>Fixed Deposit</h2>
                                                                    <table class="table table-striped">
                                                                        <thead
                                                                            style="background-color: #29469d; color: white; ">
                                                                            <th>Particulars</th>
                                                                            <th>Individual</th>
                                                                            <th>Individual(Remit)</th>
                                                                            <th>Institutional</th>
                                                                            <th>Institutional(Bidding)</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $particulars = json_decode($data?->fixed_deposit->particulars);
                                                                                $individual = json_decode($data?->fixed_deposit->individual);
                                                                                $individual_remit = json_decode($data?->fixed_deposit->individual_remit);
                                                                                $institutional = json_decode($data?->fixed_deposit->institutional);
                                                                                $institutional_renew = json_decode($data?->fixed_deposit->institutional_renew);
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
                                                                        </tbody>
                                                                    </table>
                                                                @endif
                                                                @if ($data->saving_deposit)
                                                                    <h2>Savings Deposit</h2>
                                                                    <table class="table table-striped">
                                                                        <thead
                                                                            style="background-color: #29469d; color: white; ">

                                                                            <th>Saving Deposits</th>
                                                                            <th>Minimum Balance Rs.</th>
                                                                            <th>Interest Rate</th>

                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $particulars = json_decode($data?->saving_deposit->particulars);
                                                                                $min_balance = json_decode($data?->saving_deposit->min_balance);
                                                                                $interest_rate = json_decode($data?->saving_deposit->interest_rate);
                                                                            @endphp
                                                                            @if (is_array($particulars) || is_object($particulars))
                                                                            @foreach ($particulars as $index => $particular)
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
                                                                        </tbody>
                                                                    </table>
                                                                @endif
                                                                @if ($data->loan)
                                                                    <h2>Loans And Advances</h2>
                                                                    <table class="table table-striped">
                                                                        <thead
                                                                            style="background-color: #29469d; color: white; ">
                                                                            <th>Loans and Advances</th>
                                                                            <th>Interest Rate %</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $particulars = json_decode($data->loan->particulars);
                                                                                $interest_rate = json_decode($data->loan->interest_rate);
                                                                            @endphp
                                                                            @if (is_array($particulars) || is_object($particulars))
                                                                            @foreach ($particulars as $index => $particular)
                                                                                <tr>
                                                                                    <td>{{ $particular }}</td>
                                                                                    <td>{{ $interest_rate[$index]??0 }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                @endif
                                                                @if ($data->deprive_sector)
                                                                <h2>Deprive Sector</h2>
                                                                    <table class="table table-striped">
                                                                        <thead
                                                                            style="background-color: #29469d; color: white; ">
                                                                            <th>Deprive Sector Lending</th>
                                                                            <th>Interest Rate %</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $particulars = json_decode($data->deprive_sector->particulars);
                                                                                $interest_rate = json_decode($data->deprive_sector->interest_rate);
                                                                            @endphp
                                                                            @if (is_array($particulars) || is_object($particulars))
                                                                            @foreach ($particulars as $index => $particular)
                                                                                <tr>
                                                                                    <td>{{ $particular }}</td>
                                                                                    <td>{{ $interest_rate[$index] }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                @endif
                                                                @if ($data->fixed_interest)
                                                                <h2>Fixed Interest</h2>
                                                                    <table class="table table-striped">
                                                                        <thead
                                                                            style="background-color: #29469d; color: white; ">
                                                                            <th>Fixed Interest Rate Loan (for individual)
                                                                            </th>
                                                                            <th>Upto 5 Years</th>
                                                                            <th>5 to 10 Years</th>
                                                                            <th>Above 10 Years</th>
                                                                        </thead>
                                                                        <tbody>

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
                                                                        </tbody>
                                                                    </table>
                                                                @endif
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
        </div>




    </main>
@endsection
