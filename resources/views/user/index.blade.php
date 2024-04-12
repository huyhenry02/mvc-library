@extends('layouts.main')
@section('content')
    <main class="content" style="margin-top: -65px; margin-left: -40px">
        <div class="container-fluid p-0">
            <div class="row d-flex">
                <div class="col-11">
                    <h1 class="h3"> Danh sách</h1>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" style="margin-bottom: 5px" href="">Thêm mới</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                    <div class="card flex-fill">
                        <table class="table table-hover my-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Start Date</th>
                                <th class="d-none d-xl-table-cell">End Date</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">Assignee</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Project Apollo</td>
                                <td class="d-none d-xl-table-cell">01/01/2021</td>
                                <td class="d-none d-xl-table-cell">31/06/2021</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">
                                    <a href="" class="btn btn-secondary">Sửa</a>
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
