<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Http\Requests\StoreCourseRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {
            $this->authorize('viewAny', Course::class);
            $query = Course::query();
            if ($request->searchname) {
                $query->where('name', 'like', '%' . $request->searchname . '%');
            }
            if ($request->searchcategory) {
                $category = Category::where('name', 'like', '%' . $request->searchcategory)->first();
                $query->orWhere('category_id', 'like', '%' . $category->id . '%');
            }
            if ($request->searchprice) {
                $query->orWhere('price', 'like', '%' . $request->searchprice . '%');
            }
            if ($request->searchlevel) {
                $level = Level::where('name','like', '%' . $request->searchlevel )->first();
                $query->orWhere('level_id', 'like', '%' . $level->id . '%');
            }
            if ($request->searchformality) {
                $query->orWhere('formality', 'like', '%' . $request->searchformality . '%');
            }
            if ($request->id) {
                $query->orWhere('id', $request->id);
            }
            $items = $query->orderBy('id', 'ASC')->paginate(8);
            return view('admin.courses.index', compact('items'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $items = [
            'categories' => Category::get(),
            'levels' => Level::get(),
        ];

        return view('admin.courses.create', $items);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            $this->authorize('create', Course::class);
            $course = new Course();
            $course->name = $request->name;
            $course->slug = $request->slug;
            $course->description = $request->description;
            $course->price_old = $request->price_old;
            $course->price = $request->price;
            $course->formality = $request->formality;
            $course->category_id = $request->category_id;
            $course->level_id = $request->level_id;
            $course->selled = $request->selled;
            $course->image_url = '';
            if ($request->hasFile('image_url') && $request->file('image_url')->isValid()) {
                $path = $request->file('image_url')->store('public/course');
                $url = Storage::url($path);
                $course->image_url = $url;
            } else {
                $course->image_url = 'assets/apple-touch-icon.png';
            }
            $course->video_url = '';

            $course->save();
            return redirect()->route('courses.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $course = Course::with('category','level')->find($id);
            return view('admin.courses.show',compact('course'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->authorize('update', Course::class);
        $course = Course::findOrFail($id);
        $categories = Category::all();
        $levels = Level::all();

        return view('admin.courses.edit', compact('course', 'categories', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $course = Course::find($id);
            $course->name = $request->name;
            $course->slug = $request->slug;
            $course->description = $request->description;
            $course->price_old = $request->price_old;
            $course->price = $request->price;
            $course->formality = $request->formality;
            $course->category_id = $request->category_id;
            $course->level_id = $request->level_id;
            $course->selled = $request->selled;
            $course->image_url = '';
            if ($request->hasFile('image_url') && $request->file('image_url')->isValid()) {
                $path = $request->file('image_url')->store('public/course');
                $url = Storage::url($path);
                $course->image_url = $url;
            } else {
                $course->image_url = 'assets/apple-touch-icon.png';
            }
            $course->video_url = '';

            $course->save();
            return redirect()->route('courses.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Course::class);
        $course = Course::find($id);
        if ($course) {
            $course->delete();
        }
        return redirect()->route('courses.index')->with('success', 'Cập nhật thành công');
    }

    public function trash()
{
    try {
        $this->authorize('viewTrash', Course::class);
        $items = Course::onlyTrashed()->get();
        return view('admin.courses.trash', compact('items'));
    } catch (\Exception $e) {
        Log::error('Bug occurred: ' . $e->getMessage());
        return back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
    }
}
    function restore(String $id)
    {
        try {
            $items = Course::withTrashed()->find($id);
            $this->authorize('restore',$items);
            $items->restore();
            return redirect()->route('courses.index')->with('success', 'Khôi phục thành công');
        }catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    function deleteforever(String $id)
    {
        try {
            $items = Course::withTrashed()->find($id);
            $this->authorize('forceDelete', $items);
            $items->forceDelete();
            return redirect()->route('courses.index')->with('success', 'Xoá thành công');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
        }
    }

