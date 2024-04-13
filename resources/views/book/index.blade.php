@extends('layouts.main')
@section('content')
    <main class="content" style="margin-top: -65px; margin-left: -40px">
        <div class="container-fluid p-0">
            <div class="row d-flex">
                <div class="col-11">
                    <h1 class="h3"> Danh sách <strong>Sách</strong></h1>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" style="margin-bottom: 5px" href="{{route('book.create')}}">Thêm mới</a>
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
                                <th class="d-none d-xl-table-cell">Thể loại sách</th>
                                <th class="d-none d-xl-table-cell">Tác giả</th>
                                <th class="d-none d-xl-table-cell">Số lượng</th>
                                <th class="d-none d-xl-table-cell">Giá cho mượn</th>
                                <th class="d-none d-md-table-cell">Giá mua</th>
                                <th class="d-none d-md-table-cell">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td class="d-none d-xl-table-cell">{{$book->id ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$book->name ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$book->category->name ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$book->author->name ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$book->amount ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{number_format($book->rental_price, 0, ',', '.')}} VNĐ</td>
                                    <td class="d-none d-xl-table-cell">{{number_format($book->purchase_price, 0, ',', '.')}} VNĐ</td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{route('book.edit', $book->id)}}" class="btn btn-secondary">Sửa</a>
                                        <a href="{{route('book.destroy', $book->id)}}" class="btn btn-danger">Xóa</a>
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
