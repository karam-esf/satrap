<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Memories;
use App\Allstuffs;
use App\Stock;
class MemoryController extends Controller
{
    public function addMemory(Request $request)
    {
        $memory = new Memories();
        $memory->mark = $request->mark;
        $memory->modell = $request->modell;
        $memory->speed = $request->speed;
        $memory->formatt = $request->formatt;
        $memory->capacity = $request->capacity;
        $memory->warranty = $request->warranty;
        $memory->price = $request->price;
        $memory->explanation = $request->explanation;
        $memory->image = $request->image;
        if($memory->save())
        {
            $row = Memories::orderBy('id', 'desc')->first();
            $id = (int)$row->id;
            $stock = new Stock();
            $stock->stuff_id = $id;
            $stock->group_id = $request->group_id;
            $stock->stock = $request->stock;

            $stuff = new Allstuffs();
            $stuff->stuff_id = $id;
            $stuff->group_id = $request->group_id;
            $stuff->mark = $request->mark;
            $stuff->image = $request->image;
            $stuff->price = $request->price;
            if($stock->save() and $stuff->save()) {
                Session()->flash('message', 'با موفقیت ذخیره گردید');
                return view('/forms/memoryForm');
            }
        }
    }

    public function updateMemory(Request $request)
    {
        $memory = new Memories();
        $memory = Memories::find($request->id);
        $memory->fill($request->all());
        $result = $memory->update();
        if($result) {
            $stock = DB::table('stocks')
                ->where(['stuff_id' => $request->id, 'group_id' => $request->group_id])
                ->update(['stock' => $request->stock]);
            if ($stock) {
                echo '<h3 style="background-color: #def0d8; color: #446d45;
                            text-align: center;font-size: 14px">با موفقیت بروزرسانی شد<br>
                            <a href="management" style="color: #4a778e; margin: auto; ">مدیریت</a></h3>';
            }
        }
    }
}
