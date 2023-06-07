@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>
        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url({{ asset('images/branches-banner.png') }});  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>{{ $sub_committee_level->title }} Committee</u></h2>
        </div>
        @php
            $departments = Get::committee_departments($sub_committee_level->id);
        @endphp
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
            <div class="container card mb-4 bg-light">
                {{-- <div class="row justify-content-end py-4 px-2">
                    <div class="col-3">
                        <select onchange="filter(this)" class="form-select form-select-lg" aria-label="form-select-lg example"
                            style="font-weight: 16px !important;">
                            <option value="">Choose Deparments...</option>
                            @foreach ($departments as $data)
                                <option value={{ $data->id }}
                                    {{ request()->department == $data->id ? 'selected' : '' }}>
                                    {{ $data->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                @php
                    $sub_committees = Get::committeeFilter($sub_committee_level->id, request()->department);
                @endphp
                <div class="row d-flex justify-content-center m-0 p-3">
                    @foreach ($sub_committees as $data)
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card profile-card d-flex justify-content-center align-items-center"
                                style="min-height:375px ;height: 100%;">
                                <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                    style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                        src="{{ asset(basename(storage_path()) . '/' . $data->user->media?->file_path) }}"
                                        class="rounded float-left" alt="Avatar"
                                        style="border-radius: 50%; margin-top: -100px;object-fit:cover;width:200px;height:188px">
                                    <h5 class="pt-2">{{ $data->user->name }}</h5>
                                    <span class="h8">{{ $data->position }}</span>
                                </div>
                                <span class="profile-body"style="font-size: 12px;">{{ $data->user->email }}</span>
                                <span class="profile-body">{{ $data?->mobile_no }}</span>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>
@endsection
@section('footer')
    <script>
        function filter(el) {
            window.location.href = "/single-committee/{{ $sub_committee_level->id }}?department=" + el.value
        }
    </script>
@endsection
