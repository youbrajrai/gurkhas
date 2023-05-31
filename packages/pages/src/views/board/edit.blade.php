@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Board Management</h1>

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
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid d-flex justify-content-center mb-3">
                                <h5 class="input-title">Edit Board Members</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post"
                                action="{{ route('board.update', $item->id) }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
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
                                                        Required name
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="joined_date" class="input-label">Joined Date</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker" id="joined_date"
                                                    value="{{ old('joined_date', $item->joined_date) }}" name="joined_date"
                                                    placeholder="Joined Date**" required>
                                                @error('joined_date')
                                                    <div class="invalid-feedback">
                                                        Required joined_date
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
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
@endsection
