@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('levels.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Trình Độ</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm Trình Độ</h1>
</header>

<div class="page-section">
    <form method="post" action="{{ route('levels.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông Tin</legend>
                <div class="form-group">
                    <label for="tf1">Tên Trình Độ<abbr name="Trường bắt buộc">*</abbr></label> <input name="name" type="text" class="form-control" id="" placeholder="Nhập tên cấp độ" value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('name')
                    <p style="color:red">Trường tên trình độ bắt buộc nhập</p>
                    @enderror
                    <div class="form-group">
                    <label for="tf1">Trình Độ<abbr name="Trường bắt buộc">*</abbr></label> <input name="level" type="text" class="form-control" id="" placeholder="Nhập cấp độ" value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('level')
                    <p style="color:red">Trường Trình độ bắt buộc nhập </p>
                    @enderror
                </div>
               

                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('levels.index') }}">Quay lại</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection