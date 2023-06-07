@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url({{asset('images/our_team-banner.png')}});  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Our Teams</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
        @php
            $branches = Get::branchFilter(request()->province);
        @endphp
            <div class="container card mb-4 ">
                <div class="row justify-content-end py-4 px-2">
                    <div class="col-3">
                        <select onchange="filter(this)" class="form-select form-select-lg" aria-label=".form-select-lg example">
                            <option value="">Select Branch</option>
                            @foreach ($branches as $data)
                                <option value="{{$data->id}}" {{request()->branch_id==$data->id?"selected":""}}>{{$data->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @php
                    $teams = Get::teamsFilter(request()->province,request()->branch_id)
                @endphp
                <div class="row d-flex justify-content-center m-0 p-3">
                    @foreach ($teams as $data)
                    <div class="col-12 col-md-4 py-2 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center" style="min-height:375px ;height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile" src="{{asset(basename(storage_path()).'/'.$data->media?->file_path)}}"
                                    class="rounded float-left" alt="Avatar"
                                    style="border-radius: 50%; margin-top: -100px;object-fit:cover;width:200px;height:200px">
                                <h5 class="pt-2" style="text-align:center">{{$data->name}}</h5>
                                <span class="h8">{{$data->employeeDetails?->position?->title}}</span>
                            </div>
                            <span class="profile-body">{{$data->employeeDetails?->department?->title}}</span>
                            <span class="profile-body" style="font-size: 12px;">{{$data->email}}</span>
                            <span class="profile-body">{{$data?->mobile_no}}</span>
                        </div>

                    </div>
                    @endforeach

                </div>

            </div>
        </div>



    </main>
@endsection
@section("footer")
<script>
    function filter(el){
        window.location.href="/team?province={{request()->province}}&&branch_id="+el.value
    }
</script>
@endsection
