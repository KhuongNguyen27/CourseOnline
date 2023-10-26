<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\StudentResource;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        try{
            $items = User::orderBy('group_id', 'ASC')->where('group_id','3')->paginate(5);
            return  StudentResource::collection($items);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    public function show(string $id)
    {
        try{
            $item = User::where('group_id','3')->find($id);
            return  response()->json($item,200);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
}