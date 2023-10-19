@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class='bx bx-chevrons-left mr-2'></i>Home</a>
            </li>
        </ol>
    </nav>
    <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Category</h1>
        <div class="btn-toolbar">
            <a href="#" class="btn btn-primary mr-2">
                <i class='bx bx-add-to-queue'></i>
                <span class="ml-1">Create</span>
            </a>
            <a href="#" class="btn btn-primary">
                <i class='bx bx-vertical-bottom'></i>
                <span class="ml-1">Export excel</span>
            </a>
        </div>
    </div>
</header>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active " href="#">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trash</a>
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
                                    data-target="#modalFilterColumns">Search advance</button>
                            </div>
                            <div class="input-group has-clearable">
                                <button type="button" class="close trigger-submit trigger-submit-delay"
                                    aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                </button>
                                <div class="input-group-prepend trigger-submit">
                                    <span class="input-group-text"><span class="bx bx-search-alt-2"></span></span>
                                </div>
                                <input type="text" class="form-control" name="query" value=""
                                    placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                    type="button">Save Filter</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Image</th>
                                        <th> Địa chỉ </th>
                                        <th> Số điện thoại </th>
                                        <th> Chức năng </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">1</td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle">khunog</td>
                                        <td class="align-middle"></td>
                                        <td>
                                            <form style="display:inline" method="post">
                                                <button class="btn btn-sm btn-icon btn-secondary">
                                                    <i class='bx bx-edit-alt'></i></button>
                                            </form>
                                            <span class="sr-only">Edit</span></a> <a href="#"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class='bx bx-trash'></i><span class="sr-only">Remove</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="float:right">
                                {{-- $items->appends(request()->query())->links('pagination::bootstrap-4') --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection