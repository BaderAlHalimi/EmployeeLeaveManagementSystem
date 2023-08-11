@extends('layouts.admin.master')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Employee</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class='table' id="table1">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>email</th>
                                <th>gender</th>
                                <th>age</th>
                                <th>created at</th>
                                <th>mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $emp)
                                <tr>
                                    <td>{{ $emp->name }}</td>
                                    <td>{{ $emp->email }}</td>
                                    <td>{{ $emp->gender }}</td>
                                    <td>{{ $emp->age }}</td>
                                    <td>{{ $emp->created_at }}</td>
                                    <td>{{ $emp->mobile }}</td>
                                    <td><a href="{{ route('admin.edit', ['admin' => $emp->id]) }}"><i
                                                class="fa fa-pen text-success mx-2"></i></a>
                                        <form style="display: inline-block"
                                            action="{{ route('admin.destroy', ['admin' => $emp->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button style="background: none;border:none;" type="submit"><i
                                                    class="fa fa-trash text-danger mx-2"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

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
