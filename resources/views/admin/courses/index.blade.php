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
            <a href="{{ route('courses.create') }}" class="btn btn-primary mr-2">
                <i class='bx bx-add-to-queue'></i>
                <span class="ml-1">Tạo mới</span>
            </a>
            <!-- <a href="#" class="btn btn-primary">
                <i class='bx bx-vertical-bottom'></i>
                <span class="ml-1">Export excel</span>
            </a> -->
        </div>
    </div>
</header>
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active " href="{{ route('courses.index') }}">Tất cả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.trash') }}">Thùng rác</a>
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
                                <input name="searchname" class="form-control" type="text" placeholder=" tên khoá học..."
                                    value="" />
                            </div>
                            <div class="col">
                                <input name="searchcategory" class="form-control" type="text" placeholder=" danh mục..."
                                    value="" />
                            </div>
                            <div class="col">
                                <input name="searchprice" class="form-control" type="text" placeholder=" giá..."
                                    value="" />
                            </div>
                            <div class="col">
                                <input name="searchlevel" class="form-control" type="text" placeholder=" trình độ..."
                                    value="" />
                            </div>
                            <div class="col">
                                <input name="searchformality" class="form-control" type="text" placeholder=" hình thức học..."
                                    value="" />
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                    type="submit">Tìm Kiếm</button>
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
                                @foreach($items as $course)
                                <tr>
                                    <td class="align-middle">{{ $course->id }}</td>

                                    <td class="align-middle">{{ $course->name }}</td>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <img class="img-fluid" src="{{ asset($course->image_url) }}" alt="">
                                        </a>
                                    </td>
                                    <td class="align-middle">{{ $course->category ? $course->category->name : '' }}</td>
                                    <td class="align-middle">
                                        <span style="text-decoration: line-through; color: red;">
                                            <span style="color: black;">{{ number_format($course->price_old) }}</span>VND
                                        </span>
                                    </td>
                                    <td class="align-middle">{{ number_format($course->price) }} VND</td>
                                    <td class="align-middle">{{ $course->level ? $course->level->name : '' }}</td>
                                    <td class="align-middle">{{ $course->formality }}</td>
                                    <td class="align-middle">{{ $course->selled }}</td>



                                    <td class="d-flex justify-content-center align-items-center">
                                        <span class="sr-only">Edit</span>
                                        <a href="{{ route('courses.edit', $course->id) }}"  class="btn btn-sm btn-icon btn-secondary">
                                        <i class="bx bx-edit-alt"></i>
                                           
                                            <span class="sr-only">show</span>
                                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-icon btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                                <span class="sr-only">Remove</span>
                                            </a>
                                            <form style="display:inline" method="post"
                                            action="{{ route('courses.destroy',$course->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-icon btn-secondary"
                                                onclick="return confirm('xoá khoá học?')">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float:right">
                            {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection