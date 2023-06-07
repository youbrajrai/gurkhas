@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url({{ asset('images/documents-banner.png') }});  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;text-transform:capitalize"><u>{{ $documenttype?->title }}</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
            @foreach ($documenttype->documents as $item)
                <div class="container card mb-4 ">
                    <div class="container-fluid px-2">
                        <div class="row p-3">
                            <div class="col-2 bg-primary d-flex justify-content-center align-item-center"><img
                                    class="leave-profile" src="{{ asset('images/mini-logo.png') }}" width="200px"></div>
                            <div class="col-10">
                                <h3 class="pt-4" style="text-transform:capitalize">{{ $item?->title }}</h3><br>
                                <span class="h7">Event Date: {{ $item?->created_at }}</span><br>
                                @foreach ($item->media as $val)
                                    <a href="{{ url(basename(storage_path()) . '/' . $val?->file_path) }}"
                                        target="_blank"><span class="h8">Read More <i
                                                class="bi bi-arrow-right-short"></i></span></a>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>



    </main>
@endsection
