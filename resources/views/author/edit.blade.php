@extends('layouts.main')
@section('content')
    <main class="content"style="margin-top: -65px; margin-left: -40px" >
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Chỉnh sửa <strong>Tác giả</strong></h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <form action="{{route('author.update', $author->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Tên:</label>
                                    <input type="text" name="name" value="{{$author->name ?? ''}}" class="form-control" placeholder="Tên">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Địa chỉ:</label>
                                    <input type="text" name="address" value="{{$author->address ?? ''}}" class="form-control" placeholder="Địa chỉ">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Số điện thoại:</label>
                                    <input type="text" name="phone" value="{{$author->phone ?? ''}}" class="form-control" placeholder="Số điện thoại">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Email:</label>
                                    <input type="text" name="email" value="{{$author->email ?? ''}}" class="form-control" placeholder="Email">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Tuổi:</label>
                                    <input type="number" name="age" value="{{$author->age ?? ''}}" class="form-control" placeholder="Tuổi">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Nơi làm việc:</label>
                                    <input type="text" name="workplace" value="{{$author->workplace ?? ''}}" class="form-control" placeholder="Nơi làm việc">
                                </div>
                                <div class="action-button text-end">
                                    <button class="btn btn-primary">Xác nhận</button>
                                    <a href="{{route('author.index')}}" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
