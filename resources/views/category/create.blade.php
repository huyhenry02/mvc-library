@extends('layouts.main')
@section('content')
    <main class="content"style="margin-top: -65px; margin-left: -40px" >
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Tạo mới <strong>Thể loại sách</strong></h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="input-data" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Tên:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên">
                                </div>
                                <div class="input-data mb-5" style="margin-bottom: 15px">
                                    <label for="input" style="margin-bottom: 5px">Mô tả:</label>
                                    <input type="text" name="description" class="form-control" placeholder="Mô tả">
                                </div>
                                <div class="action-button text-end">
                                    <button class="btn btn-primary">Submit</button>
                                    <a href="{{route('category.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
