@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url(../images/standard-te-banner.png);  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>HR Facility</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">

            <div class="container card mb-4 ">
                <div class="row justify-content-between py-4 px-2">
                    <div class="col-3">
                        <h4>Comittee Members</h4>
                    </div>
                    <!-- <div class="col-3"><select class="form-select form-select-lg" aria-label=".form-select-lg example">
                        <option selected>Select Provience</option>
                        <option value="1">Province 1</option>
                        <option value="1">Province 2</option>
                        <option value="1">Province 3</option>
                        <option value="1">Province 4</option>
                        <option value="1">Province 5</option>
                        <option value="1">Province 6</option>
                        <option value="1">Province 7</option>
                      </select></div> -->
                </div>
                <div class="row">
                    <div class="col-3">
                    </div>
                </div>

                <div class="row d-flex justify-content-center m-0 p-3">
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/narendra-kumar-agrawal.jpg" class="rounded float-left" alt="Avatar"
                                    width="200px" style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Narendra Kumar Agrawal</h5>
                                <span class="h8">Coordinator</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>

                </div>
                <div class="row d-flex justify-content-center m-0 p-3">
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/mini-logo.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Chief Executive Officer</h5>
                                <span class="h8">Officer Member</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/mini-logo.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2 text-center">Chief Finance Officer</h5>
                                <span class="h8">Officer Member</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/mini-logo.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Head, Human Resource Department</h5>
                                <span class="h8">Member Secretary</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>



    </main>
@endsection
