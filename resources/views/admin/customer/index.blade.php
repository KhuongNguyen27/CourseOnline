@extends('admin.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Customers Table</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('customers.create') }}" class='btn btn-primary mb-4'>Create</a>
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 46px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="cardtableCheck">
                                                <label class="form-check-label" for="cardtableCheck"></label>
                                            </div>
                                        </th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Day of birth</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col" style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $customer)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="cardtableCheck01">
                                                <label class="form-check-label" for="cardtableCheck01"></label>
                                            </div>
                                        </td>
                                        <td><a href="#" class="fw-medium">{{ $customer->id }}</a></td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->day_of_birth }}</td>
                                        <td>
                                            @php
                                            if($customer->gender == 1)
                                            echo "Male";
                                            elseif($customer->gender == 2)
                                            echo "Female";
                                            else
                                            echo "Another";
                                            @endphp
                                        </td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary">Edit</button>
                                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                            <button type="button" class="btn btn-sm btn-light">Details</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="float:right; margin-top:10px">
                                {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection