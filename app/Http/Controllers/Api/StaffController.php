<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StaffResource;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller
{
    public function index()
    {
        try{
            $items = User::orderBy('group_id', 'ASC')->where('group_id','<>','3')->with('group')->paginate(5);
            return  StaffResource::collection($items);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đã xảy ra lỗi. Vui lòng thử lại sau');
        }
    }
    public function show(string $id)
    {
        try{
            $item = User::where('group_id','<>','3')->with('group')->find($id);
            return  response()->json($item,200);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
}