<?php

namespace App\Http\Controllers;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UpdateLevelRequest;
use App\Http\Requests\StoreLevelRequest;
use App\Services\Interfaces\LevelServiceInterface;

class LevelController extends Controller
{
    protected $levelService;

    /**
     * Display a listing of the resource.
     */
function __construct(LevelServiceInterface $levelService)
{
   $this->levelService = $levelService;
}
     
    public function index()
    {   
        try {
            $items = $this->levelService->paginate(5);
            return view('admin.levels.index',compact(['items']));
            // dd($items);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage()); 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLevelRequest $request)
    {
        try {
            $data = $request->except(['_token', '_method']);
            $this->levelService->store($data);
            
            return redirect()->route('levels.index');
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage()); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        try {
            $items = $this->levelService->find($level->id);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        try {
            
            // Lấy dữ liệu của cấp độ và truyền vào tệp Blade
            $item = $this->levelService->find($level->id);
        return view('admin.levels.edit', compact('level', 'item'));
    } catch (\Exception $e) {
        Log::error('Bug occurred: ' . $e->getMessage());
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLevelRequest $request, $id)
{
    try {
        $data = $request->except(['_token', '_method']);
        $this->levelService->update($data, $id);
        return redirect()->route('levels.index');
    } catch (\Exception $e) {
        Log::error('Bug occurred: ' . $e->getMessage());    
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $this->levelService->destroy($id);
            return back();
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
}
