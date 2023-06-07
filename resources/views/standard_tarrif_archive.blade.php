@extends('layouts.app')
@section('head')
    <style>
        .doc-viewer {
            width: 95%;
            background-color: #eff3fd;
            box-shadow: #00000043 2px 2px 2px;
        }
    </style>
@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url(images/documents-banner.png);  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Archived Standard Tarriff</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">

            <div class="container card mb-4 ">
                <div class="accordion" id="accordionExample">
                    {{-- latest Part --}}
                    @php
                        $latest_soc = Get::latest_soc();
                    @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $latest_soc->id }}latest" aria-expanded="false"
                                aria-controls="collapse{{ $latest_soc->id }}latest">
                                {{ $latest_soc->title }}
                                (@foreach (config('nepali-months') as $item)
                                    @if ($item['value'] == $latest_soc->month)
                                        {{ $item['name'] }}
                                    @endif
                                @endforeach
                                ,{{ $latest_soc->fiscal_year->title }} )
                            </button>
                        </h2>
                        <div id="collapse{{ $latest_soc->id }}latest" class="accordion-collapse collapse"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body d-flex justify-content-center">
                                <div class="container card mb-4 ">
                                    @foreach ($latest_soc->standard_terrif as $data)
                                        <a id="{{ $data->type }}"></a>
                                        <div class="row justify-content-between py-4 px-2">
                                            <div class="col-12">
                                                <h4 style="text-transform:capitalize">
                                                    @foreach (config('SOC-types') as $item)
                                                        @if ($item['value'] == $data->type)
                                                            {{ $item['name'] }}
                                                        @endif
                                                    @endforeach
                                                    <h4>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover">
                                            <thead style="background-color: #29469d; color: white;">
                                                <th style="text-transform:capitalize">
                                                    @foreach (config('SOC-types') as $item)
                                                        @if ($item['value'] == $data->type)
                                                            {{ $item['name'] }}
                                                        @endif
                                                    @endforeach
                                                </th>
                                                <th>Rate</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $particulars = json_decode($data->particulars);
                                                    $rate = json_decode($data->rate);
                                                @endphp
                                                @foreach ($particulars as $index => $particular)
                                                    <tr>
                                                        <td>{{ $particular }}</td>
                                                        <td>{{ $rate[$index] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $standard_terrif_heads = Get::soc();
                        $years = $standard_terrif_heads->pluck('fiscal_year')->unique();
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
                                        @foreach ($standard_terrif_heads as $data)
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
                                                            @endforeach,
                                                            {{ $data->fiscal_year->title }})
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $data->id }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ $data->id }}"
                                                        data-bs-parent="#collapse{{ $data->id }}">
                                                        <div class="accordion-body">
                                                            <div class="container-fluid">
                                                                @if ($data->standard_terrif)
                                                                    @foreach ($data->standard_terrif as $val)
                                                                        <div class="container-fluid py-2 px-0 m-0">
                                                                            <div
                                                                                class="row justify-content-start py-4 px-2">
                                                                                <div class="col-3">
                                                                                    <h4 class="text-capitalize"
                                                                                        style="color: #29469d">
                                                                                        @foreach (config('SOC-types') as $type)
                                                                                            @if ($type['value'] == $val->type)
                                                                                                {{ $type['name'] }}
                                                                                            @endif
                                                                                        @endforeach

                                                                                        <h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <table class="table table-striped"
                                                                            id="table{{ $data->id }}">
                                                                            <thead
                                                                                style="background-color: #29469d; color: white; ">
                                                                                <th class="text-light">
                                                                                    @foreach (config('SOC-types') as $item)
                                                                                        @if ($item['value'] == $val->type)
                                                                                            {{ $item['name'] }}
                                                                                        @endif
                                                                                    @endforeach
                                                                                </th>
                                                                                <th class="text-light">Rate</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                @if ($val)
                                                                                    @php
                                                                                        $particulars = json_decode($val->particulars);
                                                                                        $rate = json_decode($val->rate);
                                                                                    @endphp
                                                                                    @foreach ($particulars as $index => $particular)
                                                                                        <tr>
                                                                                            <td>{{ $particular }}</td>
                                                                                            <td>{{ $rate[$index] }}</td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                                    @endforeach
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
