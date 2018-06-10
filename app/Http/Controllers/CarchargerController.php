<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carcharger;
use App\Allstuffs;
use App\Stock;


class CarchargerController extends Controller
{
    public function addCarcharger(Request $request)
    {
        $carcharger = new Carcharger();
        $carcharger->mark = $request->mark;
        $carcharger->modell = $request->modell;
        $carcharger->color = $request->color;
        $carcharger->inputVoltage = $request->inputVoltage;
        $carcharger->port = $request->port;
        $carcharger->warranty = $request->warranty;
        $carcharger->cable = $request->cable;
        $carcharger->price = $request->price;
        $carcharger->image = $request->image;
        $carcharger->explanation = $request->explanation;
        if($carcharger->save())
        {
            $row = Carcharger::orderBy('id', 'desc')->first();
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
                return view('/forms/carchargerForm');
            }
        }

    }

    public function updateCarcharger(Request $request)
    {
        $carcharger = new Carcharger();
        $carcharger = Carcharger::find($request->id);
        $carcharger->fill($request->all());
        $result = $carcharger->update();
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
