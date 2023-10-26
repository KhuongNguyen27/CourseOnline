@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('staffs.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Nhân viên</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Cập nhập nhân viên</h1>
</header>
<div class="page-section">
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <form method="post" action="{{ route('staffs.update',$item->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$item->id}}">
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tf1">Tên người dùng<abbr name="Trường bắt buộc">*</abbr></label> <input name="name"
                            type="text" class="form-control" id="" value='{{ $item->name }}'>
                        <small id="" class="form-text text-muted"></small>
                        @error('name')
                        <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tf1">Ngày sinh<abbr name="Trường bắt buộc">*</abbr></label> <input
                            name="day_of_birth" type="date" class="form-control" id=""
                            value="{{ $item->day_of_birth }}">
                        <small id="" class="form-text text-muted"></small>
                        @error('day_of_birth')
                        <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="email" type="text" class="form-control" value="{{ $item->email }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('email')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Số điện thoại<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="phone" type="text" class="form-control" value="{{ $item->phone }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('phone')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Địa chỉ<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="address" type="text" class="form-control" value="{{ $item->address }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('address')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Giới tính<abbr name="Trường bắt buộc">*</abbr></label>
                    <select name="gender" class='form-control'>
                        <option value="0" checked>Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                    <small id="" class="form-text text-muted"></small>
                    @error('gender')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Giới tính<abbr name="Trường bắt buộc">*</abbr></label>
                    <select name="group_id" class='form-control'>
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                    <small id="" class="form-text text-muted"></small>
                    @error('group_id')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Ảnh<abbr nam="Trường bắt buộc">*</abbr></label>
                    <input name="avatar" type="file" class="form-control" id="">
                    <div class="image-container w-25">
                        <img class='img-fluid rounded img-thumbnail' src="{{ $item->avatar }}" alt="" srcset="">
                    </div>
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('staffs.index') }}">Quay lại</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection