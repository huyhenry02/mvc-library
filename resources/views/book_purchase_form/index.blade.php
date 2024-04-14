@extends('layouts.main')
@section('content')
    <main class="content" style="margin-top: -65px; margin-left: -40px">
        <div class="container-fluid p-0">
            <div class="row d-flex">
                <div class="col-11">
                    <h1 class="h3"> Danh sách <strong>Phiếu mua sách</strong></h1>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" style="margin-bottom: 5px" href="{{route('purchase-form.create')}}">Thêm mới</a>
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
                                <th class="d-none d-xl-table-cell">Tổng tiền</th>
                                <th class="d-none d-xl-table-cell">Người tạo</th>
                                <th class="d-none d-md-table-cell">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookPurchaseForms as $bookPurchaseForm)
                                <tr>
                                    <td>{{$bookPurchaseForm->id ?? ''}}</td>
                                    <td>{{$bookPurchaseForm->customer_name ?? ''}}</td>
                                    <td>{{$bookPurchaseForm->customer_phone ?? ''}}</td>
                                    <td>{{$bookPurchaseForm->customer_email ?? ''}}</td>
                                    <td>{{number_format($bookPurchaseForm->total_price, 0, ',', '.')}} VNĐ</td>
                                    <td>{{$bookPurchaseForm->user->name ?? ''}}</td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{route('purchase-form.edit', $bookPurchaseForm->id)}}" class="btn btn-secondary">Sửa</a>
                                        <a href="{{route('purchase-form.destroy', $bookPurchaseForm->id)}}" class="btn btn-danger">Xóa</a>
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
