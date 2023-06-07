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
            style="background-image: url({{asset('images/documents-banner.png')}});  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Archived Rates</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">

            <div class="container card mb-4 ">
                {{-- new --}}
                <div class="accordion" id="accordionExample">
                    @php
                        $rates = Get::rates();
                        $years = $rates->pluck('year')->unique();
                    @endphp
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
                                    @foreach ($rates as $data)
                                        @if ($data->year == $year)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="heading{{ $data->id }}">
                                                    <button class="accordion-button collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $data->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $data->id }}">
                                                        @foreach (config('nepali-months') as $item)
                                                            @if ($item['value'] == $data->month)
                                                                {{$item['name']}}
                                                            @endif
                                                        @endforeach
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $data->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $data->id }}"
                                                    data-bs-parent="#collapse{{ $data->id }}">
                                                    <div class="accordion-body">
                                                        <div class="container-fluid">
                                                            <table
                                                                class="table table-striped table-hover"
                                                                id="table{{ $data->id }}">
                                                                <!--Table head-->
                                                                <thead
                                                                    style="background-color: #29469d;">
                                                                    <th class="text-light">Base Rate
                                                                    </th>
                                                                    <th class="text-light">Spread Rate
                                                                    </th>
                                                                    <th class="text-light">
                                                                        Cost of Fund</th>
                                                                    <th class="text-light">Yield Rate
                                                                    </th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $data->base_rate }}%
                                                                        </td>
                                                                        <td>{{ $data->spread_rate }}%
                                                                        </td>
                                                                        <td>{{ $data->cost_fund }}%
                                                                        </td>
                                                                        <td>{{ $data->yield_rate }}%
                                                                        </td>
                                                                    </tr>
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



    </main>
@endsection
