@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>
        @php
            $chairman = Get::getBoardChairman();
        @endphp
        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image:url({{ asset('images/board-banner.png') }});  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Board</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">

            <div class="container card pt-4 pb-4 mb-4 ">
                @if ($chairman)
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card profile-card d-flex justify-content-center align-items-center" style="min-height:375px ;height: 100%;">
                                <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                    style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                        src="{{ asset(basename(storage_path()) . '/' . $chairman?->user?->media?->file_path) }}"
                                        class="rounded float-left" alt="Avatar" width="200px"
                                        style="border-radius: 50%; margin-top: -100px;">
                                    <h5 class="pt-2">{{ $chairman?->user?->name }}</h5>
                                    <span class="h8">{{ $chairman?->user?->employeeDetails?->position?->title }}</span>
                                </div>
                                <span class="profile-body p-2">{{ $chairman?->user->email }}</span>
                            </div>

                        </div>
                    </div>
                @endif
                @php
                    $boards = Get::getBoards();
                @endphp
                <div class="row d-flex justify-content-center m-0 p-3">
                    @foreach ($boards as $data)
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card profile-card d-flex justify-content-center align-items-center" style="min-height:375px ;height: 100%;">
                                <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                    style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                        src="{{ asset(basename(storage_path()) . '/' . $data->user?->media->file_path) }}"
                                        class="rounded float-left" alt="Avatar" width="200px"
                                        style="border-radius: 50%; margin-top: -100px; object-fit:cover;height:188px;">
                                    <h5 class="pt-2" style="text-align:center">{{ $data->user->name }}</h5>
                                    <span class="h8">{{ $data->user?->employeeDetails?->position->title }}</span>
                                </div>
                                <span class="profile-body p-2" style="font-size:12px">{{ $data->user->email }}</span>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>



    </main>
@endsection
