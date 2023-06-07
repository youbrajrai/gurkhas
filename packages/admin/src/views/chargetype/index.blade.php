@extends('themes.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Charge Type Management</h1>

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
                                <h5 class="input-title">List of Charge Types</h5>
                            </div>

                            <!-- Default Table -->
                            <table class="table text-nowrap table-striped" id="table" class="display nowrap"
                                style="width:100%">
                                <thead style="background-color: #29469d;">
                                    <tr>
                                        <th class="text-light" scope="col">SN</th>
                                        <th class="text-light" scope="col">Charge Type</th>
                                        <th class="text-light" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($variables['chargetype'] as $key => $data)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $data->title }}</td>
                                            <td>
                                                <div class="container-fluid d-flex">
                                                    @can('chargetype_edit')
                                                        <a href="{{ route('chargetype.edit', $data->id) }}"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    @endcan
                                                    @can('chargetype_delete')
                                                        <form action="{{ route('chargetype.destroy', $data->id) }}"
                                                            method="POST">
                                                            @csrf @method('DELETE')
                                                            <button onclick="return confirm('Do you want to delete this?')"
                                                                style="border:none;background:none">
                                                                <i class="bi bi-trash3"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
