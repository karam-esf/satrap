<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charger;
use App\Allstuffs;
use App\Stock;
class ChargerController extends Controller
{
    public function addCharger(Request $request)
    {
        $charger = new Charger();
        $charger->mark = $request->mark;
        $charger->color = $request->color;
        $charger->mobile = $request->mobile;
        $charger->ampere = $request->ampere;
        $charger->lenght = $request->lenght;
        $charger->inputVoltage = $request->inputVoltage;
        $charger->warranty = $request->warranty;
        $charger->image = $request->image;
        $charger->price = $request->price;
        $charger->explanation = $request->explanation;
        if($charger->save())
        {
            $row = Charger::orderBy('id', 'desc')->first();
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
                return view('/forms/chargerForm');
            }
        }
    }
    public function updateCharger(Request $request)
    {
        $charger = new Charger();
        $charger = Charger::find($request->id);
        $charger->fill($request->all());
        $result = $charger->update();
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
