<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Stock;
use App\Flashmemory;
use App\Allstuffs;

class FlashmemoryController extends Controller
{
    public function addFlashmemory(Request $request)
    {
        $flashmemory = new Flashmemory();
        $flashmemory->mark = $request->mark;
        $flashmemory->modell = $request->modell;
        $flashmemory->color = $request->color;
        $flashmemory->speed = $request->speed;
        $flashmemory->usb = $request->usb;
        $flashmemory->capacity = $request->capacity;
        $flashmemory->warranty = $request->warranty;
        $flashmemory->price = $request->price;
        $flashmemory->image = $request->image;
        $flashmemory->explanation = $request->explanation;
        if($flashmemory->save())
        {
            $row = Flashmemory::orderBy('id', 'desc')->first();
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
                return view('/forms/flashmemoryForm');
            }
        }

    }

    public function updateFlashmemory(Request $request)
    {
        $flashmemory = new Flashmemory();
        $flashmemory = Flashmemory::find($request->id);
        $flashmemory->fill($request->all());
        $result = $flashmemory->update();
        if($result) {
            $stock = DB::table('stocks')
                ->where(['stuff_id' => $request->id , 'group_id' => $request->group_id])
                ->update(['stock'=> $request->stock]);
            if ($stock) {
                echo '<h3 style="background-color: #def0d8; color: #446d45;
                            text-align: center;font-size: 14px">با موفقیت بروزرسانی شد<br>
                            <a href="management" style="color: #4a778e; margin: auto; ">مدیریت</a></h3>';
            }
        }

    }
}
