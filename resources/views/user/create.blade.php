@extends('layouts.main')
@section('content')
    <main class="content"style="margin-top: -65px; margin-left: -40px" >
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Tạo mới</h1>
            </div>


            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Tên:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <select class="form-select mb-3" name="role_type">
                                        <option selected>Chức vụ</option>
                                        <option value="admin">Quản lý</option>
                                        <option value="employee">Nhân viên</option>
                                    </select>
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Địa chỉ:</label>
                                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Số điện thoại:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Email:</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Tuổi:</label>
                                    <input type="number" name="age" class="form-control" placeholder="Tuổi">
                                </div>
                                <div class="action-button text-end">
                                    <button class="btn btn-primary">Xác nhận</button>
                                    <a href="{{route('user.index')}}" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
