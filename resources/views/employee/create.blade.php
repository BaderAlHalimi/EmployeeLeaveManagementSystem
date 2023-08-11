@extends('layouts.admin.master')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add Employee</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>


        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('admin.store') }}" method="POST" class="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Name</label>
                                                <div class="position-relative">
                                                    <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) placeholder="name"
                                                        name="name" id="first-name-icon" value="{{ old('name') }}">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Gender</label>
                                                <div class="position-relative">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="gender">
                                                            <option {{ old('gender') == 'male' ? 'selected' : '' }}
                                                                value="male">Male</option>
                                                            <option {{ old('gender') == 'female' ? 'selected' : '' }}
                                                                value="female">Female</option>
                                                        </select>
                                                        @error('gender')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Email</label>
                                                <div class="position-relative">
                                                    <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) placeholder="email"
                                                        name="email" id="first-name-icon" value="{{ old('email') }}">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Age</label>
                                                <div class="position-relative">
                                                    <input type="number" min="18" max="65"
                                                        @class(['form-control', 'is-invalid' => $errors->has('age')]) name="age" placeholder="age"
                                                        id="first-name-icon" value="{{ old('age') }}">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    @error('age')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Contact</label>
                                                <div class="position-relative">
                                                    <input type="text" @class(['form-control', 'is-invalid' => $errors->has('mobile')]) placeholder="contact"
                                                        name="mobile" id="first-name-icon" value="{{ old('mobile') }}">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-phone"></i>
                                                    </div>
                                                    @error('mobile')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">Deapartment</label>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect">
                                                        <option>IT</option>
                                                        <option>ENGINEERING</option>
                                                        <option>HR</option>
                                                        <option>FINANCE</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company-column">Designation</label>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect">
                                                        <option>IT</option>
                                                        <option>MANAGER</option>
                                                        <option>SUPERVISOR</option>
                                                        <option>ENGINEER</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Password</label>
                                                <div class="position-relative">
                                                    <input type="password" @class(['form-control', 'is-invalid' => $errors->has('password')])
                                                        placeholder="passsword" name="password" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">password confirmation</label>
                                                <div class="position-relative">
                                                    <input type="password" @class([
                                                        'form-control',
                                                        'is-invalid' => $errors->has('password_confirmation'),
                                                    ])
                                                        placeholder="password confirmation" name="password_confirmation"
                                                        id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    @error('password_confirmation')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
@endsection
