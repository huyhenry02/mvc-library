@extends('layouts.main')
@section('content')
    <main class="content" style="margin-top: -65px; margin-left: -40px">
        <div class="container-fluid p-0">
            <div class="row d-flex">
                <div class="col-11">
                    <h1 class="h3"> Danh sách <strong>Thể loại sách</strong></h1>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" style="margin-bottom: 5px" href="{{route('category.create')}}">Thêm mới</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                    <div class="card flex-fill">
                        <table class="table table-hover my-0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th class="d-none d-xl-table-cell">Tên</th>
                                <th class="d-none d-xl-table-cell">Mô tả</th>
                                <th class="d-none d-md-table-cell">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($categories as $category)
                               <tr>
                                   <td>{{$category->id ?? ''}}</td>
                                   <td class="d-none d-xl-table-cell">{{$category->name ?? ''}}</td>
                                   <td class="d-none d-xl-table-cell">{{$category->description ?? ''}}</td>
                                   <td class="d-none d-md-table-cell">
                                       <a href="{{route('category.edit', $category->id)}}" class="btn btn-secondary">Sửa</a>
                                       <a href="{{route('category.destroy', $category->id)}}" class="btn btn-danger">Xóa</a>
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
