@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url(../images/standard-te-banner.png);  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Head Of Department</u></h2>
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
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/sujan-joshi.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Sujan Joshi</h5>
                                <span class="h8 text-center">Head - IT</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/yan-singh-rai.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Yan Singh Rai</h5>
                                <span class="h8 text-center">Head - Account and Finance</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/shambhu-rai.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Shambhu Rai</h5>
                                <span class="h8 text-center">Head - Human Resource & Admin</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/bharat-thapa-chhetri.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Bharat Thapa Chhetri</h5>
                                <span class="h8 text-center">Head - Debt Recovery</span>
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
                                    src="../images/dinesh-tamang.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Dinesh Tamang</h5>
                                <span class="h8 text-center">Head - Credit Operation</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/raushan-kumar-singh.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Raushan Kumar Singh</h5>
                                <span class="h8 text-center">Head - Legal</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/yogendra-suwal.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Yogendra Suwal</h5>
                                <span class="h8 text-center">Head - Debt Risk</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/sahana-tuladhar.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Sahana Tuladhar</h5>
                                <span class="h8 text-center">Head - Internal Audit</span>
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
                                <h5 class="pt-2"></h5>
                                <span class="h8 text-center">Head - Business Develepment</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/sunina-malakar.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Sunina Malakar</h5>
                                <span class="h8 text-center">Head - Treasury</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/shanti-thing.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Shanti Thing</h5>
                                <span class="h8 text-center">Head - Central Operation</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card profile-card d-flex justify-content-center align-items-center"
                            style="height: 100%;">
                            <div class="card d-flex justify-content-center  align-items-center  bg-light p-2"
                                style="width: 90%; margin-top: 120px;"><img class="leave-profile"
                                    src="../images/subash-rai.png" class="rounded float-left" alt="Avatar" width="200px"
                                    style="border-radius: 50%; margin-top: -100px;">
                                <h5 class="pt-2">Subash Rai</h5>
                                <span class="h8 text-center">Head - D.P Section</span>
                            </div>
                            <span class="profile-body">Since: 3/4/2019</span>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>



    </main>
@endsection
