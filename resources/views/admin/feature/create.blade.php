@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Khách Hàng</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm Khách Hàng</h1>
</header>

<div class="page-section">
    <form method="post" action="">
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên khách hàng<abbr name="Trường bắt buộc">*</abbr></label> <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên khách hàng">
                    <small id="" class="form-text text-muted"></small>
                    <p style="color:red"></p>
                </div>
                <div class="form-group">
                    <label for="tf1">Địa chỉ<abbr name="Trường bắt buộc">*</abbr></label> <input name="address" type="text" class="form-control" id="" placeholder="Nhập địa chỉ">
                    <small id="" class="form-text text-muted"></small>
                    <p style="color:red"></p>
                </div>
                <div class="form-group">
                    <label for="tf1">Số điện thoại<abbr name="Trường bắt buộc">*</abbr></label> <input name="phone" type="text" class="form-control" id="" placeholder="Nhập số điện thoại">
                    <small id="" class="form-text text-muted"></small>
                    <p style="color:red"></p>
                </div>

                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="#">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection