@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('levels.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Trang Chủ</a>
            </li>
        </ol>
    </nav>
    <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Quản Lý Trình Độ</h1>
        <div class="btn-toolbar">
            <a href="{{ route('levels.create') }}" class="btn btn-primary mr-2">
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
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active " href="{{ route('levels.index') }}">Tất Cả</a>
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
                                <input name="searchname" class="form-control" type="text" placeholder=" tên trình độ..."
                                    value="" />
                            </div>
                            <div class="col">
                                <input name="searchlevel" class="form-control" type="text" placeholder=" trình độ"
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
                                    <th>Tên Trình độ</th>
                                    <th>Trình Độ</th>
                                    <th class="text-center">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $level)
                                <tr>
                                    <td class="align-middle">{{ $level->id }}</td>
                                    <td class="align-middle">{{ $level->name }}</td>
                                    <td class="align-middle">{{ $level->level }}</td>
                                    <td class='d-flex justify-content-center align-items-center'>
                                        <span class="sr-only">Edit</span><a
                                            href="{{ route('levels.edit', $level->id) }}"
                                            class="btn btn-sm btn-icon btn-secondary"><i
                                                class='bx bx-edit-alt'></i><span class="sr-only">Remove</span>
                                        </a>
                                        <form style="display:inline" method="POST"
                                            action="{{ route('levels.destroy', $level->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-icon btn-secondary">
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