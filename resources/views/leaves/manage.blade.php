@extends('layouts.admin.master')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Leave Type</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Leave Type</li>
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
                                <th>Leave Name</th>
                                <th>Description</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $leave)
                                <tr>
                                    <td>{{ $leave->name }}</td>
                                    <td>{{ $leave->description }}</td>
                                    <td>{{ $leave->created_at }}</td>
                                    <td><a href="{{ route('leaves.edit', ['leaf' => $leave->id]) }}"><i
                                                class="fa fa-pen text-success mx-2"></i></a>
                                        <form style="display: inline-block"
                                            action="{{ route('leaves.destroy', ['leaf' => $leave->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button style="background: none;border:none;" type="submit"><i
                                                    class="fa fa-trash text-danger mx-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
