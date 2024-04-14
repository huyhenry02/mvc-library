@extends('layouts.main')
@section('content')
    <main class="content"style="margin-top: -65px; margin-left: -40px" >
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Tạo mới <strong>Sách</strong></h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <form action="{{route('book.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Tên:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Mô tả:</label>
                                    <textarea name="description" class="form-control" placeholder="Mô tả" rows="10"></textarea>
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <select class="form-select mb-3" name="category_id">
                                        <option selected>Thể loại</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <select class="form-select mb-3" name="author_id">
                                        <option selected>Tác giả</option>
                                        @foreach($authors as $author)
                                            <option value="{{$author->id}}">{{$author->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Số lượng:</label>
                                    <input type="number" name="amount" class="form-control" placeholder="Số lượng">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Giá cho thuê:</label>
                                    <input type="number" name="rental_price" class="form-control" placeholder="Giá cho thuê">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Giá bán:</label>
                                    <input type="number" name="purchase_price" class="form-control" placeholder="Giá bán">
                                </div>
                                <div class="action-button text-end">
                                    <button class="btn btn-primary">Submit</button>
                                    <a href="{{route('book.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
