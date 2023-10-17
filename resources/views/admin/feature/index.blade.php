@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
            </li>
        </ol>
    </nav>
    <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Quản Lý Khách Hàng</h1>
        <div class="btn-toolbar">
            <a href="#" class="btn btn-primary mr-2">
                <i class="fa-solid fa fa-plus"></i>
                <span class="ml-1">Thêm Mới</span>
            </a>
            <a href="#" class="btn btn-primary">
                <i class="fas fa-file"></i>
                <span class="ml-1">Xuất file excel</span>
            </a>
        </div>
    </div>
</header>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active " href="#">Tất Cả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thùng Rác</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <form action="" method="GET" id="form-search">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary" type="button" data-toggle="modal"
                                    data-target="#modalFilterColumns">Tìm nâng cao</button>
                            </div>
                            <div class="input-group has-clearable">
                                <button type="button" class="close trigger-submit trigger-submit-delay"
                                    aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                </button>
                                <div class="input-group-prepend trigger-submit">
                                    <span class="input-group-text"><span class="fas fa-search"></span></span>
                                </div>
                                <input type="text" class="form-control" name="query" value=""
                                    placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                    type="button">Lưu bộ lọc</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Tên khách hàng </th>
                                        <th> Địa chỉ </th>
                                        <th> Số điện thoại </th>
                                        <th> Chức năng </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle"> 1 </td>
                                        <td class="align-middle"> phan van trung </td>
                                        <td class="align-middle">vinh linh </td>
                                        <td class="align-middle"> 0911150816 </td>
                                        <td>
                                            <form style="display:inline" method="post">
                                                <button class="btn btn-sm btn-icon btn-secondary"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>

                                            <span class="sr-only">Edit</span></a> <a href="#"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="fa fa-pencil-alt"></i> <span
                                                    class="sr-only">Remove</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="float:right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection