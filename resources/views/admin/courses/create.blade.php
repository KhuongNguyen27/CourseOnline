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
    <h1 class="page-title">Thêm khoá học</h1>
</header>

<div class="page-section">
    <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên khoá học<abbr name="Trường bắt buộc">*</abbr></label> <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên khoá học" value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('name')
                    <p style="color:red">{{ $message }}</p>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="tf1">Mô tả<abbr name="Trường bắt buộc">*</abbr></label>
                    <textarea name="description" type="text" class="form-control" id="description" value="{{ old('description') }}"></textarea>
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="tf1">Ảnh<abbr name="Trường bắt buộc">*</abbr></label> <input name="image_url" type="file" class="form-control" id="">
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="tf1">Tên danh mục<abbr name="Trường bắt buộc">*</abbr></label>
                    <select name="category_id" class="form-control">
                        <option value="">--Vui lòng chọn--</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('device_type_id') == $category->id ? 'selected' : ''  }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="tf1">Giá cũ<abbr name="Trường bắt buộc">*</abbr></label> <input name="price_old" type="text" class="form-control" id="" placeholder="Nhập giá" value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="tf1">Giá hiện tại<abbr name="Trường bắt buộc">*</abbr></label> <input name="price" type="text" class="form-control" id="" placeholder="Nhập giá" value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="tf1">Trình độ<abbr name="Trường bắt buộc">*</abbr></label>
                    <select name="level_id" class="form-control">
                        <option value="">--Vui lòng chọn--</option>
                        @foreach ($levels as $level)
                        <option value="{{ $level->id }}" {{ old('device_type_id') == $level->id ? 'selected' : ''  }}">
                            {{ $level->name }}
                        </option>
                        @endforeach
                    </select>
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="tf1">Hình thức học<abbr name="Trường bắt buộc">*</abbr></label> <input name="formality" type="text" class="form-control" id="" placeholder="Nhập hình thức học" value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="tf1">Người đăng ký<abbr name="Trường bắt buộc">*</abbr></label> <input name="selled" type="text" class="form-control" id="" placeholder="Nhập số người đăng ký" value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('categories.index') }}">Quay lại</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection