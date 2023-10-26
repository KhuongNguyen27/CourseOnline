<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Http\Requests\StoreCourseRequest;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Course::with('category', 'level')->paginate(8);

        return view('admin.courses.index', compact('items'));
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
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
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
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $this->authorize('delete',Course::class);
        $course = Course::find($id);
        if ($course) {
            $course->delete();
        }
        return redirect()->route('courses.index');
    }
}
