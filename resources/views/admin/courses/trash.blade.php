@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('categories.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Trang Chủ</a>
            </li>
        </ol>
    </nav>
    <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Quản lý khóa học</h1>
        <div class="btn-toolbar">
        </div>
    </div>
</header>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active " href="{{ route('courses.index') }}">Tất cả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thùng rác</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <form action="" method="GET" id="form-search">
                        <div class="row">
                            <div class="col">
                                <input name="id" class="form-control" type="text" placeholder=" Id..." value="" />
                            </div>
                            <div class="col">
                                <input name="searchname" class="form-control" type="text" placeholder=" tên khoá học..." value="" />
                            </div>
                            <div class="col">
                                <input name="searchcategory" class="form-control" type="text" placeholder=" danh mục..." value="" />
                            </div>
                            <div class="col">
                                <input name="searchprice" class="form-control" type="text" placeholder=" giá..." value="" />
                            </div>
                            <div class="col">
                                <input name="searchlevel" class="form-control" type="text" placeholder=" trình độ..." value="" />
                            </div>
                            <div class="col">
                                <input name="searchformality" class="form-control" type="text" placeholder=" hình thức học..." value="" />
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch" type="submit">Tìm Kiếm</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> STT </th>
                                    <th>Tên Khoá Học</th>
                                    <th>Ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Giá Cũ</th>
                                    <th>Giá Hiện Tại</th>
                                    <th>Trình Độ</th>
                                    <th>Hình Thức học</th>
                                    <th>Người Đăng Ký </th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $soft)
                                <tr>
                                    <td class="align-middle">{{ $soft->id }}</td>
                                    <td class="align-middle">{{ $soft->name }}</td>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <img class="img-fluid" src="{{ asset($soft->image_url) }}" alt="">
                                        </a>
                                    </td>
                                    <td class="align-middle">{{ $soft->category ? $soft->category->name : '' }}</td>
                                    <td class="align-middle">
                                        <span style="text-decoration: line-through; color: red;">
                                            <span style="color: black;">{{ number_format($soft->price_old) }}</span>VND
                                        </span>
                                    </td>
                                    <td class="align-middle">{{ number_format($soft->price) }} VND</td>
                                    <td class="align-middle">{{ $soft->level ? $soft->level->name : '' }}</td>
                                    <td class="align-middle">{{$soft->formality }}</td>
                                    <td class="align-middle">{{ $soft->selled }}</td>

                                    <td class="d-flex justify-content-center align-items-center">
                                        <span class="sr-only">khoi phuc</span>
                                        <a href="{{ route('courses.restore', $soft->id) }}" class="btn btn-sm btn-icon btn-secondary">
                                            <i class='bx bx-arrow-back'></i>
                                            <span class="sr-only">khôi phục</span>
                                        </a>
                                        
                                        <form style="display:inline" method="post" action="{{ route('courses.deleteforever',$soft->id) }}">
                                        
                                        @csrf
                                            <button class="btn btn-sm btn-icon btn-secondary" onclick="return confirm('xoá khoá học?')">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection