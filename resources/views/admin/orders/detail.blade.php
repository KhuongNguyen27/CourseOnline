@extends('admin.layouts.master')
@section('content')
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('orders.index') }}"><i class='bx bx-chevrons-left mr-2'></i>Quản lí giao dịch</a>
            </li>
        </ol>
    </nav>
    <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Chi tiết giao dịch</h1>
        <div class="btn-toolbar">
            <a href="#" class="btn btn-primary">
                <i class='bx bx-vertical-bottom'></i>
                <span class="ml-1">Xuất excel</span>
            </a>
        </div>
    </div>
</header>
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
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th> # </th>
                                    <td class="align-middle">{{ $item->id }}</td>
                                </tr>
                                <tr>
                                    <th>Người mua</th>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <img class="img-fluid" src="{{ asset($item->user->avatar) }}" alt="">
                                        </a>
                                        {{ $item->user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Khóa học</th>
                                    <td class="align-middle">
                                        <a href="#" class="tile tile-img mr-1">
                                            <img class="img-fluid" src="{{ asset($item->course->image_url) }}" alt="">
                                        </a>
                                        {{ $item->course->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Xu đã giao dịch</th>
                                    <td class="align-middle">{{ $item->point }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection