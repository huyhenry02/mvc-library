@php use App\Models\User; @endphp
@extends('layouts.main')
@section('content')
    <main class="content" style="margin-top: -65px; margin-left: -40px">
        <div class="container-fluid p-0">
            <div class="row d-flex">
                <div class="col-11">
                    <h1 class="h3"> Danh sách <strong>Nhân viên</strong></h1>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" style="margin-bottom: 5px" href="{{route('user.create')}}">Thêm mới</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                    <div class="card flex-fill">
                        <table class="table table-hover my-0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th class="d-none d-xl-table-cell">Chức vụ</th>
                                <th class="d-none d-xl-table-cell">Địa chỉ</th>
                                <th class="d-none d-xl-table-cell">Số điện thoại</th>
                                <th class="d-none d-md-table-cell">Tuổi</th>
                                <th class="d-none d-md-table-cell">Email</th>
                                <th class="d-none d-md-table-cell">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$user->name ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$user->role_type ? User::ROLE_TYPES[$user->role_type] : ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$user->address ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$user->phone ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$user->age ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$user->email ?? ''}}</td>

                                    <td class="d-none d-md-table-cell">
                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-secondary">Sửa</a>
                                        <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
