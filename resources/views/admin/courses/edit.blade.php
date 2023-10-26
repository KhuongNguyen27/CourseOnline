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
    <h1 class="page-title">Sửa khoá học</h1>
</header>

<div class="page-section">
    <form method="post" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="name">Tên khoá học</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên khoá học" value="{{ $course->name }}">
                    @error('name')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ $course->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image_url">Ảnh</label>
                    <input name="image_url" type="file" class="form-control" id="image_url">
                </div>
                <div class="form-group">
                    <label for="category_id">Tên danh mục</label>
                    <select name="category_id" class="form-control">
                        <option value="">--Vui lòng chọn--</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price_old">Giá cũ</label>
                    <input name="price_old" type="text" class="form-control" id="price_old" placeholder="Nhập giá" value="{{ $course->price_old }}">
                </div>
                <div class="form-group">
                    <label for="price">Giá hiện tại</label>
                    <input name="price" type="text" class="form-control" id="price" placeholder="Nhập giá" value="{{ $course->price }}">
                </div>
                <div class="form-group">
                    <label for="level_id">Trình độ</label>
                    <select name="level_id" class="form-control">
                        <option value="">--Vui lòng chọn--</option>
                        @foreach ($levels as $level)
                        <option value="{{ $level->id }}" {{ $level->id == $course->level_id ? 'selected' : '' }}>
                            {{ $level->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="formality">Hình thức học</label>
                    <input name="formality" type="text" class="form-control" id="formality" placeholder="Nhập hình thức học" value="{{ $course->formality }}">
                </div>
                <div class="form-group">
                    <label for="selled">Người đăng ký</label>
                    <input name="selled" type="text" class="form-control" id="selled" placeholder="Nhập số người đăng ký" value="{{ $course->selled }}">
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('courses.index') }}">Quay lại</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection