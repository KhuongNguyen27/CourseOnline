@extends('admin.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Example</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row gy-4">
                            <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-xxl-3 col-md-8 mb-3">
                                    <div>
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control border-dashed" name="name"
                                            placeholder="Enter your name">
                                        @error('name')
                                        <div class="alert alert-danger" role='alert'><strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-8 mb-3">
                                    <div>
                                        <label class="form-label">Day of birth</label>
                                        <input type="date" class="form-control border-dashed" name="day_of_birth">
                                    </div>
                                    @error('day_of_birth')
                                    <div class="alert alert-danger" role='alert'><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-md-8 mb-3">
                                    <div>
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control border-dashed" name="address"
                                            placeholder="Trieu Thuong - Trieu Phong - Quang Tri">
                                    </div>
                                    @error('address')
                                    <div class="alert alert-danger" role='alert'><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-md-8 mb-3">
                                    <div>
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control border-dashed" name="email"
                                            placeholder="nguyenhuukhuong27102000@gmail.com">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger" role='alert'><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-md-8 mb-3">
                                    <div>
                                        <label for="exampleDataList" class="form-label">Gender</label>
                                        <select name="gender" class="form-control form-control-user">
                                            <option>Select gender</option>
                                            <option value="0">Another</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                        @error('gender')
                                        <div class="alert alert-danger" role='alert'><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-8 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control border-dashed" name="phone"
                                        placeholder="0947964***">
                                    @error('phone')
                                    <div class="alert alert-danger" role='alert'><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control border-dashed" name="password"
                                            placeholder="******">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="form-label">Repeat Password</label>
                                        <input type="password" class="form-control border-dashed" name="repeatpassword"
                                            placeholder="******">
                                        @error('repeatpassword')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <a href="{{ route('customers.index') }}" class='btn btn-secondary'>Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection