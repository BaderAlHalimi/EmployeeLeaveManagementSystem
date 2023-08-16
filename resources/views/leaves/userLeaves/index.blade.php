@extends('layouts.admin.master')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>View Leave Requests</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Leave Requests</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class='table' id="table1">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Leave Name</th>
                                <th>created_at</th>
                                <th>status</th>
                                <th>number of days</th>
                                <th>reason</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $lvs)
                                <tr>
                                    <td>{{ $lvs->name }}</td>
                                    <td>{{ $lvs->leave_name }}</td>
                                    <td>{{ $lvs->pivot->created_at }}</td>
                                    <td><span @class(['badge','bg-danger'=>$lvs->pivot->status=="canceled",'bg-success'=>$lvs->pivot->status=="approved",'bg-secondary'=>$lvs->pivot->status=="pending"])>{{ $lvs->pivot->status }}</span></td>
                                    <td>{{ $lvs->pivot->number_days }}</td>
                                    <td>{{ $lvs->pivot->reason }}</td>
                                    <td>
                                        @if ($lvs->pivot->status == 'pending')
                                            <a href="{{ route('accept', ['id' => $lvs->pivot->id]) }}">
                                                <i class="fa fa-check text-success mx-2"></i>
                                            </a>
                                            <button style="background: none;border:none;"
                                                onclick="show('{{ $lvs->pivot->id }}')">
                                                <i class="fa fa-ban text-danger mx-2"></i>
                                            </button>
                                            <form style="display: none;" id="{{ $lvs->pivot->id }}"
                                                action="{{ route('cancele', ['id' => $lvs->pivot->id]) }}" method="POST"
                                                class="text-center">
                                                @csrf
                                                <textarea name="reason" id="reason" cols="30" rows="3"></textarea><br>
                                                <button type="submit" class="badge bg-success">submit</button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                            <script>
                                function show(id) {
                                    if (document.getElementById(id).style.display == "block") {
                                        document.getElementById(id).style.display = "none";
                                    } else {
                                        document.getElementById(id).style.display = "block";
                                    }
                                }
                            </script>
                            {{-- <tr>
                                <td>153424</td>
                                <td>Jane Doe</td>
                                <td>HR</td>
                                <td>
                                    <span class="badge bg-danger">Deactivated</span>
                                </td>
                                <td>2021-11-01</td>
                                <td><a href="editDesignation.php"><i class="fa fa-pen text-success"></i></a> <a
                                        href="editDesignation.php"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                            <tr>
                                <td>564355</td>
                                <td>Juan Dela Cruz</td>
                                <td>ENGINEERING</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                                <td>2021-11-01</td>
                                <td><a href="editDesignation.php"><i class="fa fa-pen text-success"></i></a> <a
                                        href="editDesignation.php"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
