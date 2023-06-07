@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url(../images/standard-te-banner.png);  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Standard Tarriff</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
            @php
                $latest_soc = Get::latest_soc();
            @endphp
            {{-- @dd($latest_soc->standard_terrif[0]->type) --}}
            <div class="container card mb-4 ">
                @foreach ($latest_soc->standard_terrif as $key => $data)
                    <a id="{{ $data->type }}"></a>
                    <div class="row justify-content-between py-4 px-2">
                        <div class="col-3">
                            <h4 style="text-transform:capitalize">
                                @foreach (config('SOC-types') as $item)
                                    @if ($item['value'] == $data->type)
                                        {{ $item['name'] }}
                                    @endif
                                @endforeach
                                <h4>
                        </div>
                        @if ($key == 0)
                            <div class="col-3">
                                <a href="{{ route('SOC_archive') }}">
                                    <u>
                                        <i class="bi bi-file-zip"></i>
                                        Tarrif Archive</u>
                                </a>
                            </div>
                        @endif
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



    </main>
@endsection
