<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $this->authorize('viewAny',Order::Class);
            $query = Order::query();
            if ($request->searchname) {
                $user = User::where('name', 'LIKE', '%' . $request->searchname . '%')->first();
                $query->where('user_id', $user->id);
            }
            if ($request->searchcourse) {
                $course = Course::where('name', 'like', '%' . $request->searchcourse . '%')->first();
                $query->orWhere('course_id', $course->id);
            }
            if (isset($request->searchstatus)) {
                $query->where('status', '=', $request->searchstatus);
            }
            if ($request->id) {
                $query->orWhere('id', $request->id);
            }
            $items = $query->with('course','user')->orderBy('id', 'DESC')->paginate(5);
            return view('admin.orders.index',compact('items'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $this->authorize('create',Order::class);
            $users = User::get();
            $courses = Course::get();
            return view('admin.orders.create',compact('users', 'courses'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $data = $request->except(['_method', '_token']);
            $user = User::find($data['user_id']);
            $course = Course::find($data['course_id']);
            if($user->point < $course->price ){
                return redirect()->route('orders.index')->with('error','Số lượng xu khả dụng không đủ');
            }
            $data['point'] =  $course->price;
            $course->selled += 1;
            $course->save();
            $user->point -= $course->price;
            $user->save();
            Order::create($data);
            return redirect()->route('orders.index')->with('success','Thêm giao dịch thành công');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Order::with('user', 'course')->find($id);
        return view('admin.orders.detail',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}