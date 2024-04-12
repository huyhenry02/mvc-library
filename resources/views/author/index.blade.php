@extends('layouts.main')
@section('content')
    <main class="content" style="margin-top: -65px; margin-left: -40px">
        <div class="container-fluid p-0">
            <div class="row d-flex">
                <div class="col-11">
                    <h1 class="h3"> Danh sách <strong>Tác giả</strong></h1>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" style="margin-bottom: 5px" href="{{route('author.create')}}">Thêm mới</a>
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
                                <th class="d-none d-xl-table-cell">Địa chỉ</th>
                                <th class="d-none d-xl-table-cell">Số điện thoại</th>
                                <th class="d-none d-xl-table-cell">Email</th>
                                <th class="d-none d-md-table-cell">Tuổi</th>
                                <th class="d-none d-md-table-cell">Nơi làm việc</th>
                                <th class="d-none d-md-table-cell">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{$author->id ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$author->name ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$author->address ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$author->phone ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$author->email ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$author->age ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$author->workplace ?? ''}}</td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{route('author.edit', $author->id)}}" class="btn btn-secondary">Sửa</a>
                                        <a href="{{route('author.destroy', $author->id)}}" class="btn btn-danger">Xóa</a>
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
