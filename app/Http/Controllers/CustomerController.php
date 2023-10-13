<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Http\Requests\StoreCustomerRequest;

class CustomerController extends Controller
{
    protected $customerService;
    
    function __construct(CustomerServiceInterface $customerService){
        $this->customerService = $customerService;
    }

    function index(Request $request){
        $items = $this->customerService->paginate(5,$request);
        return view('admin.customer.index',compact('items'));
    }

    function create(){
        return view('admin.customer.create');
    }

    function edit(){
        return view('admin.customer.edit');
    }

    function store(StoreCustomerRequest $request){
        dd($request);
        $item = $this->customerService->store($request);
        redirect()->route(home);
    }
}