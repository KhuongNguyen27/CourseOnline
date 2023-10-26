@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('students.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Học viên</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm học viên</h1>
</header>

<div class="page-section">
    <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="group_id" value="3">
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên người dùng<abbr name="Trường bắt buộc">*</abbr></label> <input name="name"
                        type="text" class="form-control" id="" placeholder="Nhập tên học viên"
                        value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('name')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label> <input name="email" type="text"
                        class="form-control" id="" placeholder="Nhập email đăng nhập" value="{{ old('email') }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('email')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Số điện thoại<abbr name="Trường bắt buộc">*</abbr></label> <input name="phone"
                        type="text" class="form-control" id="" placeholder="Nhập số điện thoại"
                        value="{{ old('phone') }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('phone')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="tf1">Mật khẩu<abbr name="Trường bắt buộc">*</abbr></label> <input
                                name="password" type="password" class="form-control" id="" placeholder="******">
                            <small id="" class="form-text text-muted"></small>
                            @error('password')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tf1">Nhập lại mật khẩu<abbr name="Trường bắt buộc">*</abbr></label> <input
                                name="repeatpassword" type="password" class="form-control" id="" placeholder="******">
                            <small id="" class="form-text text-muted"></small>
                            @error('repeatpassword')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tf1">Ảnh<abbr name="Trường bắt buộc">*</abbr></label> <input name="avatar" type="file"
                        class="form-control" id="">
                    <small id="" class="form-text text-muted"></small>
                    @error('avatar')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('students.index') }}">Quay lại</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection