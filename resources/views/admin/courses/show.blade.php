@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('courses.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Khoá học</a>
            </li>
        </ol>
    </nav>
    <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Chi tiết khoá học</h1>
        <div class="btn-toolbar">
            <a href="#" class="btn btn-primary">
                <i class='bx bx-vertical-bottom'></i>
                <span class="ml-1">Xuất excel</span>
            </a>
        </div>
    </div>
</header>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active " href="#">Tất cả</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Trash</a>
                </li> -->
            </ul>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th> STT</th>
                                    <td class="align-middle">{{ $course->id }}</td>
                                </tr>

                                <tr>
                                    <th>Tên</th>
                                    <td class="align-middle">{{ $course->name  }}</td>

                                 </tr>
                                 <tr>
                                    <th>Ảnh</th>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <img class="img-fluid" src="{{ asset($course->image_url) }}" alt="">
                                        </a>
                                    </td>
                                </tr>


                                <tr>
                                    <th>Danh mục</th>
                                    <td class="align-middle">{{ $course->category ? $course->category->name : '' }}</td>
                                </tr>


                                <tr>
                                    <th>Giá cũ</th>
                                    <td class="align-middle">{{ number_format($course->price_old) }} VND</td>
                                </tr>

                                <tr>
                                    <th>giá mới</th>
                                    <td class="align-middle">{{ number_format($course->price) }} VND</td>
                                </tr>

                                <tr>
                                    <th>Trình độ</th>
                                    <td class="align-middle">
                                       {{ $course->level ? $course->level->name : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hình thức học</th>
                                    <td class="align-middle">{{ $course->formality }}</td>
                                </tr>
                                <tr>
                                    <th>Người đăng ký</th>
                                    <td class="align-middle">{{ $course->selled }}</td>
                                </tr>
                                <tr>
                                    <th>Mô tả</th>
                                    <td class="align-middle">{{ $course->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="page-title-bar">
   
    <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Chương học</h1>
        <div class="btn-toolbar">
            <a href="#" class="btn btn-primary mr-2">
                <i class='bx bx-add-to-queue'></i>
                <span class="ml-1">Thêm mới</span>
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
                    <a class="nav-link active " href="#">Tất Cả</a>
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
                                <input name="searchname" class="form-control" type="text" placeholder=" tên chương học..."
                                    value="" />
                            </div>
                            <div class="col">
                                <input name="searchlevel" class="form-control" type="text" placeholder=" "
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
                                    <th>STT</th>
                                    <th>Tên Chương Hoc</th>
                                    <th>Miễn Phí</th>
                                    <th>Khoá học</th>
                                    <th class="text-center">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">s</td>
                                    <td class="align-middle">d</td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class='d-flex justify-content-center align-items-center'>
                                        <span class="sr-only">Edit</span><a
                                            href="#"
                                            class="btn btn-sm btn-icon btn-secondary"><i
                                                class='bx bx-edit-alt'></i><span class="sr-only">Remove</span>
                                        </a>
                                        <form style="display:inline" method="POST"
                                            action="#">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-icon btn-secondary">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="float:right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection