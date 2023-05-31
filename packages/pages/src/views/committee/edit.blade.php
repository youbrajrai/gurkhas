@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Committee Management</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-center mb-3">
                                <h5 class="input-title">Edit Committee Members</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post"
                                action="{{ route('committee.update', $item->id) }}" enctype="multipart/form-data"
                                novalidate>
                                @csrf
                                @method('PUT')
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="committe-level" class="input-label">Committe Level</label>
                                            <div class="input-group has-validation">
                                                <select id="committee-level" class="form-select"
                                                    required>
                                                    <option value="">Choose...</option>
                                                    @foreach ($variables['committeelevel'] as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $item->subcommitteelevel->committee_level_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('committee_level_id')
                                                    <div class="invalid-feedback">
                                                        Required committe-level
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="sub-committe-level" class="input-label">Sub Committe Level</label>
                                            <div class="input-group has-validation">
                                                <select id="sub-committee-level" name="sub_committee_level_id"
                                                    class="form-select" required>
                                                    <option value="">Choose...</option>
                                                    @foreach ($variables['subcommitteelevel'] as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $item->sub_committee_level_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sub_committee_level_id')
                                                    <div class="invalid-feedback">
                                                        Required sub-committe-level
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="name" class="input-label">Employee</label>
                                            <div class="input-group has-validation">
                                                <select id="name" name="user_id" class="form-select select2" required>
                                                    <option value="">Choose Employee...</option>
                                                    @foreach ($variables['user'] as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $item->user_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id')
                                                    <div class="invalid-feedback">
                                                        required name
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="joined_date" class="input-label">Joined Date</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control date-picker" id="joined_date"
                                            value="{{ old('joined_date', $item->joined_date) }}" name="joined_date"
                                            placeholder="Joined Date**" required>
                                        @error('joined_date')
                                            <div class="invalid-feedback">
                                                required joined_date
                                            </div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="text-start">
                                    <button type="submit" class="btn"
                                        style="background-color: #0b2982; color:white">Submit</button>
                                    <button type="reset" class="btn"
                                        style="background-color: #b80000; color:white">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>


                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('footer')
    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#committee-level', function() {
                var committee_level_id = $(this).val();
                var div = $(this).parent();
                var op = '';
                $.ajax({
                    type: 'get',
                    url: "{{ route('findSubCommitteeLevel') }}",
                    data: {
                        'id': committee_level_id
                    },
                    success: function(data) {
                        // console.log("sucess");
                        // console.log(data);
                        op += '<option value="0" selected disabled>Select Sub Type</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].title +
                                '</option>';
                        }
                        document.getElementById("sub-committee-level").innerHTML = op;
                    },
                    error: function(data) {}
                });
            });
        });
    </script>
@endsection
