@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Leave Management</h1>

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
                                <h5 class="input-title">Register Leave</h5>
                            </div>

                            <!-- Vertical Form -->
                            <form class="row g-3 needs-validation" method="post"
                                action="{{ route('leave.update', $item->id) }}" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="container-fluid p-2 input-container1">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="staffname" class="input-label">Staff Name</label>
                                            <div class="input-group has-validation">
                                                @php
                                                    if (Auth::user()->IsAdmin) {
                                                        $users = $variables['user'];
                                                    } else {
                                                        $users = App\Models\User::whereHas('employeeDetails.branch', function ($query) {
                                                            $query->where('id', Auth::user()?->employeeDetails?->branch->id);
                                                        })->get();
                                                    }
                                                @endphp
                                                <select id="staffname" class="form-select select2" name="user_id" required>
                                                    <option value="">Choose Staff Name...</option>
                                                    @foreach ($users as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $item->user_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id[]')
                                                    <div class="invalid-feedback">
                                                        Required staff name
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="leave-type" class="input-label">Leave Type</label>
                                            <div class="input-group has-validation">
                                                <select id="leave-type" class="form-select" name="leave_type" required>
                                                    <option value="">Choose Leave Type...</option>
                                                    <option value="paid" {{ $item->leave_type == 'paid' ? 'selected' : '' }}>
                                                        Paid</option>
                                                    <option value="unpaid" {{ $item->leave_type == 'unpaid' ? 'selected' : '' }}>
                                                        UnPaid</option>
                                                    <option value="sick" {{ $item->leave_type == 'sick' ? 'selected' : '' }}>
                                                        Sick</option>
                                                </select>
                                                @error('leave_type')
                                                    <div class="invalid-feedback">
                                                        required leave-type
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-2 input-container2">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="leave-from" class="input-label">Leave From</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker" id="leave-from"
                                                    name="leave_from" value="{{ old('leave_from', $item->leave_from) }}"
                                                    placeholder="Leave From*" required>
                                                @error('leave_from')
                                                    <div class="invalid-feedback">
                                                        required leave-from
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label for="leave-to" class="input-label">Leave To</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control date-picker" id="leave-to"
                                                    name="leave_to" value="{{ old('leave_to', $item->leave_to) }}"
                                                    placeholder="Leave To*" required>
                                                @error('leave_to')
                                                    <div class="invalid-feedback">
                                                        required leave-to
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
            $('.select-all').click(function() {
                let val = $(this).parent().siblings('select');
                if (val) {
                    val.children().prop("selected", "selected");
                    val.trigger("change");
                }
            })
            $('.deselect-all').click(function() {
                let val = $(this).parent().siblings('select');
                if (val) {
                    val.children().removeAttr("selected");
                    val.trigger("change");
                }
            })
        });
    </script>
@endsection
