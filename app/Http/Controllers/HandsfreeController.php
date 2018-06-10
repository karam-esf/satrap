<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Handsfree;
use App\Allstuffs;
use App\Stock;
class HandsfreeController extends Controller
{
    public function addHandsfree(Request $request)
    {
        $handsfree = new Handsfree();
        $handsfree->mark = $request->mark;
        $handsfree->modell = $request->modell;
        $handsfree->color = $request->color;
        $handsfree->typeConnection = $request->typeConnection;
        $handsfree->material = $request->material;
        $handsfree->warranty = $request->warranty;
        $handsfree->capacity = $request->capacity;
        $handsfree->timeBattery = $request->timeBattery;
        $handsfree->timeStanby = $request->timeStanby;
        $handsfree->distance = $request->distance;
        $handsfree->image = $request->image;
        $handsfree->price = $request->price;
        $handsfree->explanation = $request->explanation;
        if($handsfree->save())
        {
            $row = Handsfree::orderBy('id', 'desc')->first();
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
                return view('/forms/handsfreeForm');
            }
        }
    }

    public function updateHandsfree (Request $request)
    {
        $handsfree = new Handsfree();
        $handsfree = Handsfree::find($request->id);
        $handsfree->fill($request->all());
        $result = $handsfree->update();
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
