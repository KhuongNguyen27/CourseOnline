@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('categories.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Danh mục</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Cập nhập danh mục</h1>
</header>
<div class="page-section">
    <form method="post" action="{{ route('categories.update',$item->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên danh mục<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="name" type="text" class="form-control" value="{{ $item->name }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('name')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Mô tả<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="description" type="text" class="form-control" id="description"
                        value="{{ $item->description }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('description')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Ảnh<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="image_url" type="file" class="form-control" id="">
                    <small id="" class="form-text text-muted"></small>
                    @error('image_url')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                    <div class="image-container w-25">
                        <img class='img-fluid rounded img-thumbnail' src="{{ $item->image_url }}" alt="" srcset="">
                    </div>
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