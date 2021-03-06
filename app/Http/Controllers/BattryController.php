<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Battry;
use App\Stock;
use App\Allstuffs;
class BattryController extends Controller
{
    public function addBattry(Request $request)
    {
        $battry = new Battry();
        $battry->mobile = $request->mobile;
        $battry->kind = $request->kind;
        $battry->capacity = $request->capacity;
        $battry->warranty = $request->warranty;
        $battry->voltage = $request->voltage;
        $battry->image = $request->image;
        $battry->price = $request->price;
        $battry->explanation = $request->explanation;
        if($battry->save())
        {
            $row = Battry::orderBy('id', 'desc')->first();
            $id = (int)$row->id;
            $stock = new Stock();
            $stock->stuff_id = $id;
            $stock->group_id = $request->group_id;
            $stock->stock = $request->stock;

            $stuff = new Allstuffs();
            $stuff->stuff_id = $id;
            $stuff->group_id = $request->group_id;
            $stuff->mark = $request->mobile;
            $stuff->image = $request->image;
            $stuff->price = $request->price;
            if($stock->save() and $stuff->save()) {
                Session()->flash('message', 'با موفقیت ذخیره گردید');
                return view('/forms/battryForm');
            }
        }
    }

    public function updateBattry(Request $request)
    {
        $battry = new Battry();
        $battry = Battry::find($request->id);
        $battry->fill($request->all());
        $result = $battry->update();
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
