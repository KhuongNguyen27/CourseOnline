<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    protected $categoryService;
    /**
     * Create class Category.
     */
    function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $items = $this->categoryService->paginate(5);
            return view('admin.categories.index',compact('items'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.categories.create');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try{
            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $fieldName = 'image_url';
            if ($request->hasFile($fieldName)) {
                $get_img = $request->file($fieldName);
                $path = 'storage/category/';
                $new_name_img = rand(1,100).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $category->image_url = $path.$new_name_img;
            }
            $category->save();
            // alert()->success('Success created');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            // alert()->warning('Have problem, Please try again late!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $items = $this->categoryService->find($id);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $item = $this->categoryService->find($id);
            return view('admin.categories.edit',compact('item'));
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $fieldName = 'image_url';
            if ($request->hasFile($fieldName)) {
                $get_img = $request->file($fieldName);
                $path = 'storage/category/';
                $new_name_img = rand(1,100).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $category->image_url = $path.$new_name_img;
            }
            $category->save();
            // alert()->success('Success created');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->categoryService->destroy($id);
            return back();
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
}