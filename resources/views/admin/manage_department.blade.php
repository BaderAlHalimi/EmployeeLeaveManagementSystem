@extends('layouts.admin.master')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Department</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Department</li>
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
                                <th>Department Name</th>
                                <th>Department Short Name</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr id="{{ $department->id }}">
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->short_name }}</td>
                                    <td>{{ $department->created_at }}</td>
                                    <td><a class="me-3"
                                            href="{{ route('department.edit', ['department' => $department->id]) }}"><i
                                                class="fa fa-pen text-success"></i></a>

                                        {{-- <a href="{{ route('department.destroy', ['department' => $department->id]) }}"><i
                                                class="fa fa-trash text-danger"></i></a></td> --}}
                                        <button style="background: none;border:none;" onclick="deleteDep('{{ $department->id }}')"><i
                                                class="fa fa-trash text-danger"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    </div>
    </div>
    <script>
        function deleteDep(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this department!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // إذا تم النقر على زر "Yes"
                    // يمكنك استخدام مكتبة Axios أو ال XMLHttpRequest لإرسال طلب PUT إلى الرابط المحدد
                    // هنا نستخدم Axios كمثال
                    axios.delete(`{{ route('department.index') }}/${id}`)
                        .then((response) => {
                            if (response.status === 200) {
                                // تم حذف الملف بنجاح
                                Swal.fire(
                                'Deleted!',
                                'Your department has been deleted.',
                                'success'
                                );
                                document.getElementById(id).style.display = "none";
                            } else {
                                // حدث خطأ أثناء الحذف
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the department.',
                                    'error'
                                );
                            }
                        })
                        .catch((error) => {
                            // حدث خطأ أثناء إرسال الطلب
                            Swal.fire(
                                'Error!',
                                'An error occurred while sending the request.',
                                'error'
                            );
                        });
                }
            })

        }
    </script>
@endsection
