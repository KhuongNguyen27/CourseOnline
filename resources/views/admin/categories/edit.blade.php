@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('categories.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Category</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Update Category</h1>
</header>
<div class="page-section">
    <form method="post" action="{{ route('categories.update',$item->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <legend>Information</legend>
                <div class="form-group">
                    <label for="tf1">Name category<abbr name="Trường bắt buộc">*</abbr></label> <input name="name"
                        type="text" class="form-control" id="" placeholder="Insert name category"
                        value="{{ $item->name }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('name')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Description<abbr name="Trường bắt buộc">*</abbr></label> <input name="description"
                        type="text" class="form-control" id="description" placeholder="Insert description"
                        value="{{ $item->description }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('description')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tf1">Image<abbr name="Trường bắt buộc">*</abbr></label> <input name="image_url"
                        type="file" class="form-control" id="">
                    <small id="" class="form-text text-muted"></small>
                    @error('image_url')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                    <div class="image-container w-25">
                        <img class='img-fluid rounded img-thumbnail' src="{{ $item->image_url }}" alt="" srcset="">
                    </div>
                </div>

                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('categories.index') }}">Back</a>
                    <button class="btn btn-primary ml-auto" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection