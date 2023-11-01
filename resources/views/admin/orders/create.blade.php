@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('orders.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Giao dịch</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm giao dịch</h1>
</header>

<div class="page-section">
    <form method="post" action="{{ route('orders.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="tf1">Tên người mua<abbr name="Trường bắt buộc">*</abbr></label>
                    <select name="user_id" class='form-control'>
                        <option value="">--Chọn người mua--</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <small id="" class="form-text text-muted"></small>
                    @error('user')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Khóa học<abbr name="Trường bắt buộc">*</abbr></label>
                    <select name="course_id" class='form-control' id='course-select'>
                        <option value="">--Chọn khóa học--</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}" data-price="{{$course->price}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                    <small id="" class="form-text text-muted"></small>
                    @error('course')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Xu<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="price" type="text" class="form-control" id='price-input' disabled>
                    <small class="form-text text-muted"></small>
                    @error('price')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('orders.index') }}">Quay lại</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
document.getElementById('course-select').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var price = selectedOption.getAttribute('data-price');
    document.getElementById('price-input').value = price;
});
</script>
@endsection