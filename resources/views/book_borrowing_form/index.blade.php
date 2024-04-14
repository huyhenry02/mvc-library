@php use App\Models\BookBorrowingForm; @endphp
@extends('layouts.main')
@section('content')
    <main class="content" style="margin-top: -65px; margin-left: -40px">
        <div class="container-fluid p-0">
            <div class="row d-flex">
                <div class="col-11">
                    <h1 class="h3"> Danh sách <strong>Phiếu mượn sách</strong></h1>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" style="margin-bottom: 5px" href="{{route('borrowing-form.create')}}">Thêm
                        mới</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                    <div class="card flex-fill">
                        <table class="table table-hover my-0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th class="d-none d-xl-table-cell">Tên khách hàng</th>
                                <th class="d-none d-xl-table-cell">SĐT khách hàng</th>
                                <th class="d-none d-xl-table-cell">Email khách hàng</th>
                                <th class="d-none d-xl-table-cell">Từ ngày</th>
                                <th class="d-none d-xl-table-cell">Đến ngày</th>
                                <th>Trạng thái</th>
                                <th class="d-none d-xl-table-cell">Tổng tiền</th>
                                <th class="d-none d-xl-table-cell">Người tạo</th>
                                <th class="d-none d-md-table-cell">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookBorrowingForms as $bookBorrowingForm)
                                <tr>
                                    <td>{{$bookBorrowingForm->id ?? ''}}</td>
                                    <td>{{$bookBorrowingForm->customer_name ?? ''}}</td>
                                    <td>{{$bookBorrowingForm->customer_phone ?? ''}}</td>
                                    <td>{{$bookBorrowingForm->customer_email ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$bookBorrowingForm->usage_period_from ?? ''}}</td>
                                    <td class="d-none d-xl-table-cell">{{$bookBorrowingForm->usage_period_to ?? ''}}</td>
                                    <td>
                                        @switch($bookBorrowingForm->status)
                                            @case('pending')
                                                <span
                                                    class="badge bg-primary">{{BookBorrowingForm::STATUS_TYPES[$bookBorrowingForm->status]}}</span>
                                                @break

                                            @case('completed')
                                                <span class="badge bg-success">{{BookBorrowingForm::STATUS_TYPES[$bookBorrowingForm->status]}}</span>
                                                @break

                                            @case('rejected')
                                                <span class="badge bg-danger">{{BookBorrowingForm::STATUS_TYPES[$bookBorrowingForm->status]}}</span>
                                                @break

                                            @case('approved')
                                                <span class="badge bg-warning">{{BookBorrowingForm::STATUS_TYPES[$bookBorrowingForm->status]}}</span>
                                                @break

                                            @default
                                                <span class="badge bg-secondary">Unknown</span>
                                        @endswitch
                                    </td>
                                    <td class="d-none d-xl-table-cell">{{number_format($bookBorrowingForm->total_price, 0, ',', '.')}} VNĐ</td>
                                    <td>{{$bookBorrowingForm->user->name ?? ''}}</td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{route('borrowing-form.edit', $bookBorrowingForm->id)}}"
                                           class="btn btn-secondary">Sửa</a>
                                        <a href="{{route('borrowing-form.destroy', $bookBorrowingForm->id)}}" class="btn btn-danger">Xóa</a>
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
