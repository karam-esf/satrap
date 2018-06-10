<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Holder;
use App\Allstuffs;
use App\Stock;
class HolderController extends Controller
{
    public function addHolder(Request $request)
    {
        $holder = new Holder();
        $holder->mark = $request->mark;
        $holder->modell = $request->modell;
        $holder->color = $request->color;
        $holder->warranty = $request->warranty;
        $holder->image = $request->image;
        $holder->price = $request->price;
        $holder->explanation = $request->explanation;
        if($holder->save())
        {
            $row = Holder::orderBy('id', 'desc')->first();
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
                return view('/forms/holderForm');
            }
        }
    }

    public function updateHolder(Request $request)
    {
        $holder = new Holder();
        $holder = Holder::find($request->id);
        $holder->fill($request->all());
        $result = $holder->update();
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
