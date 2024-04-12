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
                        <div class="card-body">
                            <div class="input-data" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">Input:</label>
                                <input type="text" class="form-control" placeholder="Input">
                            </div>
                            <div class="input-data mb-5" style="margin-bottom: 15px">
                                <label for="input" style="margin-bottom: 5px">Input:</label>
                                <input type="text" class="form-control" placeholder="Input">
                            </div>
                            <div class="action-button text-end">
                                <button class="btn btn-primary">Submit</button>
                                <button class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
