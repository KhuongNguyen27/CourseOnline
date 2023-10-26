<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\CategoryServiceInterface;




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
            return response()->json($items, 200);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show($id)
    {
        try {
            $items = $this->categoryService->find($id);
            return response()->json($items, 200);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        try {
            // $this->categoryService->destroy($category->id);
            echo 'Delete success';
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
}