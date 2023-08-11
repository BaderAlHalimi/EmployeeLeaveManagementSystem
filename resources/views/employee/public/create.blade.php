@extends('layouts.admin.master')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Leave Request</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Leave Request</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>


        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('employee.leave.store') }}" method="POST" class="form form-vertical">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Leave Name</label>
                                                    <div class="position-relative">
                                                        <select name="leaves_id" @class(['form-control', 'is-invalid' => $errors->has('leaves_id')]) id="leaves_id">
                                                            @foreach ($leaves as $leave)
                                                                <option value="{{ $leave->id }}">{{ $leave->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="fa fa-table"></i>
                                                        </div>
                                                        @error('leaves_id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="email-id-icon">Number of days</label>
                                                    <div class="position-relative">
                                                        <input type="number" @class(['form-control', 'is-invalid' => $errors->has('number_days')])
                                                            name="number_days" placeholder="number of days"
                                                            id="email-id-icon" value="{{ old('number_days') }}">
                                                        <div class="form-control-icon">
                                                            <i class="fa fa-table"></i>
                                                        </div>
                                                        @error('number_days')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic Vertical form layout section end -->
    </div>
@endsection
