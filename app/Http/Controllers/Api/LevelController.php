<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\LevelServiceInterface;
use Illuminate\Support\Facades\Log;


class LevelController extends Controller
{
    protected $levelService;
    /**
     * Create class Category.
     */
    function __construct(LevelServiceInterface $levelService)
    {
        $this->levelService = $levelService;
    }
    public function index()
    {
        try {
            $items = $this->levelService->paginate(5);
            return response()->json($items, 200);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $items = $this->levelService->find($id);
            return response()->json($items, 200);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
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
