@extends('layouts.main')
@section('content')
    <main class="content"style="margin-top: -65px; margin-left: -40px" >
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Tạo mới <strong>Phiếu mượn sách</strong></h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <form action="{{route('borrowing-form.store')}}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="input-data" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">Tên khách hàng:</label>
                                <input type="text" name="customer_name" class="form-control" placeholder="Tên">
                            </div>
                            <div class="input-data" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">SĐT khách hàng:</label>
                                <input type="text" name="customer_phone" class="form-control" placeholder="SĐT">
                            </div>
                            <div class="input-data" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">Email khách hàng:</label>
                                <input type="text" name="customer_email" class="form-control" placeholder="Email">
                            </div>
                            <div class="input-data" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">Địa chỉ khách hàng:</label>
                                <input type="text" name="customer_address" class="form-control" placeholder="Địa chỉ">
                            </div>
                            <div class="input-data" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">Từ ngày:</label>
                                <input type="date" name="usage_period_from"  class="form-control">
                            </div>
                            <div class="input-data" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">Đến ngày:</label>
                                <input type="date"  name="usage_period_to" class="form-control">
                            </div>
                            <div class="input-data" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">Đặt cọc:</label>
                                <input type="number" name="deposit" class="form-control" placeholder="Đặt cọc">
                            </div>
                            <div class="book-input">
                                <div class="row book-entry">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="book" style="margin-bottom: 5px">Sách:</label>
                                            <select class="form-control" id="book" name="books[0][book_id]">
                                                <option selected>Chọn sách</option>
                                                @foreach($books as $book)
                                                    <option value="{{$book->id}}">{{$book->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="amount" style="margin-bottom: 5px">Số lượng:</label>
                                            <input type="number" name="books[0][amount]" class="form-control amount" id="amount">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="price" style="margin-bottom: 5px">Số tiền:</label>
                                            <input type="text" name="books[0][price]" class="form-control price" id="price" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="margin-top: 25px">
                                            <label>&nbsp;</label>
                                            <button type="button" class="btn btn-success btn-add">+</button>
                                        </div>
                                    </div>
                                </div>
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
        $(document).ready(function() {
            let bookPrice = 0;

            const calculateTotalPrice = (amountInput, priceInput) => {
                const amount = amountInput.val();
                const total = amount * bookPrice;
                priceInput.val(total);
            }

            $(document).on('change', '#book', function() {
                const selectedBookId = $(this).val();
                const bookEntry = $(this).closest('.book-entry');
                const priceInput = bookEntry.find('.price');
                const amountInput = bookEntry.find('.amount');

                $.ajax({
                    url: `/book/get-rental-price/${selectedBookId}`,
                    type: 'GET',
                    success: function(response) {
                        bookPrice = response;
                        const formattedPrice = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(bookPrice);
                        priceInput.val(formattedPrice);
                        calculateTotalPrice(amountInput, priceInput);
                    }
                });
            });

            $(document).on('input', '.amount', function() {
                const amountInput = $(this);
                const priceInput = amountInput.closest('.book-entry').find('.price');
                calculateTotalPrice(amountInput, priceInput);
            });

            $('.btn-add').on('click', function() {
                const newEntry = $('.book-entry').first().clone();
                newEntry.find('input').val('');
                newEntry.find('label').remove();
                newEntry.find('.btn-add').remove();
                newEntry.appendTo('.book-input');

                const index = $('.book-entry').length - 1;
                newEntry.find('.amount').attr('name', `books[${index}][amount]`);
                newEntry.find('.price').attr('name', `books[${index}][price]`);
                newEntry.find('#book').attr('name', `books[${index}][book_id]`);

                const amountInput = newEntry.find('.amount');
                const priceInput = newEntry.find('.price');
                amountInput.on('input', function() {
                    calculateTotalPrice(amountInput, priceInput);
                });
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
