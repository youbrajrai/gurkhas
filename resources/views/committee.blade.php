@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main style="background-color: #ffffff; padding: 0px; margin: 0px;">
        <div class="row justify-content-start p-0">
            <div class="col-sm-4 col-md-2 lg-2 px-0" style="background-color: #eff3fd;">
                <div class="d-flex align-items-start p-0">
                    <div class="nav flex-column nav-pills me-0" id="v-pills-tab" role="tablist" aria-orientation="vertical"
                        style=" margin-top: 16px; margin-bottom: 16px; margin-left: 8px;">
                        <p class="our-teams-headings" style="color: black; font-size: 26px; font-size: calc(0.5em + 0.9vw)">
                            Board
                            Level</p>

                        <button class="nav-link active text-start" id="v-pills-1-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1"
                            aria-selected="true"
                            style="color: black; font-size: 18px; color: #29469d; font-size: calc(0.5em + 0.6vw);"><span>Risk
                                Management</span> </button>

                        <button class="nav-link text-start" id="v-pills-2-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2"
                            aria-selected="false"
                            style="color: black; font-size: 18px; color: #29469d; font-size: calc(0.5em + 0.6vw);">HR
                            Facility</button>

                        <button class="nav-link text-start" id="v-pills-3-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3"
                            aria-selected="false"
                            style="color: black; font-size: 18px; color: #29469d; font-size: calc(0.5em + 0.6vw);">AML
                            CFT</button>

                        <button class="nav-link text-start" id="v-pills-4-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4"
                            aria-selected="false"
                            style="color: black; font-size: 18px; color: #29469d; font-size: calc(0.5em + 0.6vw);">Audit</button>

                        <hr style="color: red;">
                        <p class="our-teams-headings" style="color: black; font-size: calc(0.5em + 0.9vw)">
                            Managemant Level</p>

                        <button class="nav-link  text-start" id="v-pills-5-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5"
                            aria-selected="false"
                            style="color: black; font-size: 18px; color: #29469d; font-size: calc(0.5em + 0.6vw);">Asset
                            Liabilities</button>

                        <button class="nav-link text-start" id="v-pills-6-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-6" type="button" role="tab" aria-controls="v-pills-6"
                            aria-selected="false"
                            style="color: black; font-size: 18px; color: #29469d; font-size: calc(0.5em + 0.6vw);">Procurement</button>

                        <button class="nav-link text-start" id="v-pills-7-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-7" type="button" role="tab" aria-controls="v-pills-7"
                            aria-selected="false"
                            style="color: black; font-size: 18px; color: #29469d; font-size: calc(0.5em + 0.6vw);">Financial
                            Administrations</button>

                        <button class="nav-link text-start" id="v-pills-8-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-8" type="button" role="tab" aria-controls="v-pills-8"
                            aria-selected="false"
                            style="color: black; font-size: 18px; color: #29469d; font-size: calc(0.5em + 0.6vw);">AML
                            CFT</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-10 lg- px-0">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                        <p class="our-teams-headings">Board Members</p>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-4 p-4">
                                <div class="card mx-2 p-2"
                                    style="width: 80%; background-color: #edeef4; box-shadow: #12165e 4px 4px 4px; align-items: center;">
                                    <div style="width: 50%; aspect-ratio: 3/4; background-color: aqua; margin: 10%;">
                                        <img src="images/boardmember1.png" alt="Responsive image" width="100%"
                                            style="margin: 0px; padding-top: 0%; padding-left: 0%; aspect-ratio: 3/4;">
                                    </div>
                                    Khim Bahadur Thapa <br>
                                    Loan Supervisor <br>
                                    Board Member Since: 2012 <br>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 p-4">
                                <div class="card mx-2 p-2"
                                    style="width: 80%; background-color: #edeef4; box-shadow: #12165e 4px 4px 4px; align-items: center;">
                                    <div style="width: 50%; aspect-ratio: 3/4; background-color: aqua; margin: 10%;">
                                        <img src="images/boardmember2.png" alt="Responsive image" width="100%"
                                            style="margin: 0px; padding-top: 0%; padding-left: 0%; aspect-ratio: 3/4;">
                                    </div>
                                    Ratna Shakya <br>
                                    Interest Manager <br>
                                    Board Member Since: 2018 <br>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 p-4">
                                <div class="card mx-2 p-2"
                                    style="width: 80%; background-color: #edeef4; box-shadow: #12165e 4px 4px 4px; align-items: center;">
                                    <div style="width: 50%; aspect-ratio: 3/4; background-color: aqua; margin: 10%;">
                                        <img src="images/boardmember3.png" alt="Responsive image" width="100%"
                                            style="margin: 0px; padding-top: 0%; padding-left: 0%; aspect-ratio: 3/4;">
                                    </div>
                                    Gita Maharjan <br>
                                    Customer Relation Manager <br>
                                    Board Member Since: 2015 <br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-4 p-4">
                                <div class="card mx-2 p-2"
                                    style="width: 80%; background-color: #edeef4; box-shadow: #12165e 4px 4px 4px; align-items: center;">
                                    <div style="width: 50%; aspect-ratio: 3/4; background-color: aqua; margin: 10%;">
                                        <img src="images/boardmember4.png" alt="Responsive image" width="100%"
                                            style="margin: 0px; padding-top: 0%; padding-left: 0%; aspect-ratio: 3/4;">
                                    </div>
                                    Naren Paudel <br>
                                    Office Administrator <br>
                                    Board Member Since: 2019 <br>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 p-4">
                                <div class="card mx-2 p-2"
                                    style="width: 80%; background-color: #edeef4; box-shadow: #12165e 4px 4px 4px; align-items: center;">
                                    <div style="width: 50%; aspect-ratio: 3/4; background-color: aqua; margin: 10%;">
                                        <img src="images/boardmember5.png" alt="Responsive image" width="100%"
                                            style="margin: 0px; padding-top: 0%; padding-left: 0%; aspect-ratio: 3/4;">
                                    </div>
                                    Rajan Tamrakar <br>
                                    Office Administrator <br>
                                    Board Member Since: 2020 <br>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 p-4">
                                <div class="card mx-2 p-2"
                                    style="width: 80%; background-color: #edeef4; box-shadow: #12165e 4px 4px 4px; align-items: center;">
                                    <div style="width: 50%; aspect-ratio: 3/4; background-color: aqua; margin: 10%;">
                                        <img src="images/boardmember6.png" alt="Responsive image" width="100%"
                                            style="margin: 0px; padding-top: 0%; padding-left: 0%; aspect-ratio: 3/4;">
                                    </div>
                                    Pankaj Thapaliya <br>
                                    Legal Advisor <br>
                                    Board Member Since: 2018 <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">2
                    </div>
                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">3
                    </div>
                    <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">4
                    </div>
                    <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">5
                    </div>
                    <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-5-tab">6
                    </div>
                    <div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-5-tab">7
                    </div>
                    <div class="tab-pane fade" id="v-pills-8" role="tabpanel" aria-labelledby="v-pills-5-tab">8
                    </div>
                </div>
            </div>
    </main>
@endsection
