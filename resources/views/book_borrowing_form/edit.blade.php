@php use App\Models\BookBorrowingForm; @endphp
@extends('layouts.main')
@section('content')
    <main class="content" style="margin-top: -65px; margin-left: -40px">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Chỉnh sửa <strong>Phiếu mượn sách</strong></h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <form action="{{route('borrowing-form.update', $borrowingForm->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Tên khách hàng:</label>
                                    <input type="text" name="customer_name" value="{{$borrowingForm->customer_name}}"
                                           class="form-control" placeholder="Tên">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">SĐT khách hàng:</label>
                                    <input type="text" name="customer_phone" value="{{$borrowingForm->customer_phone}}"
                                           class="form-control" placeholder="SĐT">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Email khách hàng:</label>
                                    <input type="text" name="customer_email" value="{{$borrowingForm->customer_email}}"
                                           class="form-control" placeholder="Email">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Địa chỉ khách hàng:</label>
                                    <input type="text" name="customer_address"
                                           value="{{$borrowingForm->customer_address}}" class="form-control"
                                           placeholder="Địa chỉ">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Từ ngày:</label>
                                    <input type="date" name="usage_period_from"
                                           value="{{$borrowingForm->usage_period_from}}" class="form-control">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Đến ngày:</label>
                                    <input type="date" name="usage_period_to"
                                           value="{{$borrowingForm->usage_period_to}}" class="form-control">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Đặt cọc:</label>
                                    <input type="number" name="deposit" value="{{$borrowingForm->deposit}}"
                                           class="form-control" placeholder="Đặt cọc">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <select class="form-control" id="book" name="status">
                                        <option selected>{{BookBorrowingForm::STATUS_TYPES[$borrowingForm->status]}}</option>
                                        <option value="{{BookBorrowingForm::STATUS_APPROVED}}">{{BookBorrowingForm::STATUS_TYPES[BookBorrowingForm::STATUS_APPROVED]}}</option>
                                        <option value="{{BookBorrowingForm::STATUS_REJECTED}}">{{BookBorrowingForm::STATUS_TYPES[BookBorrowingForm::STATUS_REJECTED]}}</option>
                                        <option value="{{BookBorrowingForm::STATUS_COMPLETED}}">{{BookBorrowingForm::STATUS_TYPES[BookBorrowingForm::STATUS_COMPLETED]}}</option>
                                    </select>
                                </div>
                                <div class="book-input">
                                    @foreach($details as $detail)
                                        <div class="row book-entry">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="book" style="margin-bottom: 5px">Sách:</label>
                                                    <select class="form-control" id="book" name="books[0][book_id]">
                                                        <option selected>{{$detail->book->name ?? ''}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="amount" style="margin-bottom: 5px">Số lượng:</label>
                                                    <input type="number" name="books[0][amount]"
                                                           value="{{$detail->amount ?? ''}}" class="form-control amount"
                                                           id="amount" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="price" style="margin-bottom: 5px">Số tiền:</label>
                                                    <input type="text" name="books[0][price]"
                                                           value="{{$detail->price ?? ''}}" class="form-control price"
                                                           id="price" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" style="margin-top: 25px">
                                                    <label>&nbsp;</label>
                                                    <button type="button" class="btn btn-success btn-add">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="action-button text-end">
                                    <button class="btn btn-primary">Submit</button>
                                    <a href="{{route('borrowing-form.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        .book-entry {
            margin-bottom: 5px;
        }
    </style>
    <script>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
