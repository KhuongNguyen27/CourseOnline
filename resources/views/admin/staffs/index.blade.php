@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('staffs.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Trang Chủ</a>
            </li>
        </ol>
    </nav>
    <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Quản lí nhân viên</h1>
        <div class="btn-toolbar">

            <a href="{{ route('staffs.create') }}" class="btn btn-primary mr-2 ">
                <i class='bx bx-user-plus'></i>
                <span class="ml-1">Tạo mới</span>
            </a>
            <a href="#" class="btn btn-primary">
                <i class='bx bx-vertical-bottom'></i>
                <span class="ml-1">Xuất excel</span>
            </a>
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
                    <form action="" method="GET" id="form-search">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <input name="id" class="form-control" type="text" placeholder="Id..." value="" />
                                </div>
                                <div class="col">
                                    <input name="searchname" class="form-control" type="text"
                                        placeholder="Tên người dùng..." value="" />
                                </div>
                                <div class="col">
                                    <input name="searchemail" class="form-control" type="text" placeholder="Email..."
                                        value="" />
                                </div>
                                <div class="col">
                                    <input name="searchphone" class="form-control" type="text"
                                        placeholder="Số điện thoại..." value="" />
                                </div>
                                <div class="col-lg-2">
                                    <button style='float:right' class="btn btn-secondary" data-toggle="modal"
                                        data-target="#modalSaveSearch" type="submit">Tìm Kiếm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Chức vụ</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $user)
                                <tr>
                                    <td class="align-middle">{{ $user->id }}</td>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <img class="img-fluid" src="{{ asset($user->avatar) }}" alt="">
                                        </a>
                                        {{ $user->name }}
                                    </td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">{{ $user->phone }}</td>
                                    <td class="align-middle">{{ $user->group->name }}</td>
                                    <td class='d-flex justify-content-center align-items-center'>
                                        <span class="sr-only">Edit</span>
                                        <a href="{{ route('staffs.edit', $user->id) }}"
                                            class="btn btn-sm btn-icon btn-secondary">
                                            <i class='bx bx-edit-alt'></i>
                                            <span class="sr-only">Remove</span>
                                        </a>
                                        <form style="display:inline" method="post"
                                            action="{{ route('staffs.destroy',$user->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-icon btn-secondary"
                                                onclick="return confirm('Are you sure?')">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('staffs.show', $user->id) }}"
                                            class="btn btn-sm btn-icon btn-secondary">
                                            <i class='bx bxs-user-detail'></i>
                                            <span class="sr-only">Detail</span>
                                        </a>
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