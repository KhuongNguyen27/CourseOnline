<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Group;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $this->authorize('viewAny',User::Class);
            $query = User::query();
            if ($request->searchname) {
                $query->where('name', 'like', '%' . $request->searchname . '%');
            }
            if ($request->searchemail) {
                $query->orWhere('email', 'like', '%' . $request->searchemail . '%');
            }
            if ($request->searchphone) {
                $query->orWhere('phone', 'like', '%' . $request->searchphone . '%');
            }
            if ($request->searchpoint) {
                $query->orWhere('point', 'like', '%' . $request->searchpoint . '%');
            }
            if ($request->id) {
                $query->orWhere('id', $request->id);
            }
            $items = $query->orderBy('group_id', 'ASC')->where('group_id','<>','3')->with('group')->paginate(5);
            return view('admin.staffs.index',compact('items'));
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
        try{
            $this->authorize('create',User::Class);
            $groups = Group::get();
            return view('admin.staffs.create',compact('groups'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        try{
            $data = $request->except(['_token', '_method', 'repeatpassword']);
            $data['password'] = bcrypt($data['password']);
            $fieldName = 'avatar';
                if ($request->hasFile($fieldName)) {
                    $get_img = $request->file($fieldName);
                    $path = 'storage/staff/';
                    $new_name_img = $request->name.$get_img->getClientOriginalName();
                    $get_img->move($path,$new_name_img);
                    $data['avatar'] = $path.$new_name_img;
                }
            User::create($data);
            return redirect()->route('staffs.index')->with('success','Thêm nhân viên thành công');
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
        try{
            $item = User::with('group')->find($id);
            return view('admin.staffs.detail',compact('item'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $this->authorize('update',User::Class);
            $groups = Group::get();
            $item = User::find($id);
            return view('admin.staffs.edit',compact('item','groups'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, string $id)
    {
        try {
            $data = $request->except(['_token', '_method']);
            $fieldName = 'avatar';
                if ($request->hasFile($fieldName)) {
                    $get_img = $request->file($fieldName);
                    $path = 'storage/staff/';
                    $new_name_img = $request->name.$get_img->getClientOriginalName();
                    $get_img->move($path,$new_name_img);
                    $data['avatar'] = $path.$new_name_img;
                }
            User::where('id',$id)->update($data);
            return redirect()->route('staffs.index')->with('success','Cập nhập nhân viên thành công');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->authorize('delete',User::class);
            User::destroy($id);
            return back()->with('success','Xóa nhân viên thành công');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
}