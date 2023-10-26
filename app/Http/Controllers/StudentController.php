<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
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
            $items = $query->orderBy('id', 'DESC')->where('group_id','3')->paginate(5);
            return view('admin.students.index',compact('items'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    public function create()
    {
        try{
            $this->authorize('create',User::Class);
            return view('admin.students.create');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    public function store(StoreStudentRequest $request)
    {
        try{
            $data = $request->except(['_method','_token','repeatpassword']);
            $data['password'] = bcrypt($data['password']);
            $fieldName = 'avatar';
                if ($request->hasFile($fieldName)) {
                    $get_img = $request->file($fieldName);
                    $path = 'storage/student/';
                    $new_name_img = $request->name.$get_img->getClientOriginalName();
                    $get_img->move($path,$new_name_img);
                    $data['avatar'] = $path.$new_name_img;
                }
            User::create($data);
            return redirect()->route('students.index')->with('success','Thêm học viên thành công');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    public function show(string $id)
    {
        try{
            $item = User::with('group')->find($id);
            return view('admin.students.detail',compact('item'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    public function edit(string $id)
    {
        try{
            $this->authorize('update',User::Class);
            $item = User::find($id);
            return view('admin.students.edit',compact('item'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, string $id)
    {
        try {
            $data = $request->except(['_token', '_method']);
            $fieldName = 'avatar';
                if ($request->hasFile($fieldName)) {
                    $get_img = $request->file($fieldName);
                    $path = 'storage/student/';
                    $new_name_img = $request->name.$get_img->getClientOriginalName();
                    $get_img->move($path,$new_name_img);
                    $data['avatar'] = $path.$new_name_img;
                }
            User::where('id',$id)->update($data);
            return redirect()->route('students.index')->with('success','Cập nhập học viên thành công');
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
            return back()->with('success','Xóa học viên thành công');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
}