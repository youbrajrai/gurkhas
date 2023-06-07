@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <main>
        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url({{ asset('images/branches-banner.png') }});  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>Branches</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">
            <div class="container card mb-4 bg-light">
                <div class="row justify-content-end py-4 px-2">
                    <div class="col-3">
                        <select onchange="filter(this)" class="form-select form-select-lg" aria-label="form-select-lg example"
                            style="font-weight: 16px !important;">
                            <option value="">Choose province...</option>

                            @foreach (config('province') as $data)
                                <option
                                    value={{ $data['value'] }}{{ request()->province == $data['value'] ? ' selected ' : ' ' }}>
                                    {{ $data['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @php
                    $branches = Get::branchFilter(request()->province);
                @endphp
                <div class="branch-all">

                    <div class="accordion accordion-flush" id="branch-row-1">
                        <!-- branch 1 content starts here -->
                        <div class="row">
                            @foreach ($branches as $data)
                                <div class="col-4">
                                    <div class="accordion-item">
                                        <div class="card my-3 p-0" style="box-shadow: #000000 1px 2px">
                                            <div class="card-header text-center"
                                                style="background-color: #29469d; color: white; padding-top: 10px !important; padding-bottom: 4px;">
                                                <div class="fw-bold h6">{{ $data->title }}</div>
                                            </div>
                                            <div class="card-body" style="margin-left: 16px; color: #0b2982;">
                                                <div class="branch-info-texts">{{ $data->local_body }}</div>
                                                <div class="branch-info-texts">
                                                    @foreach (config('province') as $item)
                                                        @if ($item['value'] == $data->province)
                                                            {{ $item['name'] }}
                                                        @endif
                                                    @endforeach
                                                    , Nepal
                                                </div>
                                                <div class="branch-info-texts">Tel :
                                                    {{ $data->contact_no }},{{ $data->fax_no }}</div>
                                                <div class="branch-info-texts">Email : {{ $data->email }}</div>
                                                <div class="d-flex justify-content-end">
                                                    <span class=" collapsed" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#branch-{{ $data->id }}" aria-expanded="false"
                                                        aria-controls="branch-{{ $data->id }}">
                                                        See Where It Is <i class="bi bi-geo-alt"
                                                            style="-webkit-text-stroke: 1px; padding-left: 8px; color: red; font-size: 16px;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div id="branch-{{ $data->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#branch-row-1">
                                    <div class="accordion-body">
                                        <div class="ratio ratio-21x9">
                                            <iframe src={{ $data->link }} style="border:0;" allowfullscreen=""
                                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- @foreach ($branches as $data)
                            <div id="branch-{{ $data->id }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#branch-row-1">
                                <div class="accordion-body">
                                    <div class="ratio ratio-21x9">
                                        <iframe src={{ $data->link }} style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>

                                </div>
                            </div>
                        @endforeach --}}

                    </div>



                </div>
            </div>
        </div>
        <script>
            function showMap() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
    </main>
@endsection
@section('footer')
    <script>
        function filter(el) {
            window.location.href = "/branches?province=" + el.value
        }
    </script>
@endsection
