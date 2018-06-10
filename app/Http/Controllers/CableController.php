<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cable;
use App\Stock;
use App\Allstuffs;
class CableController extends Controller
{
    public function addCable(Request $request)
    {
        $cable = new Cable();
        $cable->mark = $request->mark;
        $cable->color = $request->color;
        $cable->lenght = $request->lenght;
        $cable->mobile = $request->mobile;
        $cable->warranty = $request->warranty;
        $cable->image = $request->image;
        $cable->price = $request->price;
        $cable->explanation = $request->explanation;

        if($cable->save())
        {
            $row = Cable::orderBy('id', 'desc')->first();
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
            if($stock->save()and $stuff->save()){
                Session()->flash('message','با موفقیت ذخیره گردید');
                return view('/forms/cableForm');
            }
        }
    }
    public function updateCable(Request $request)
    {
        $cable = new Cable();
        $cable = Cable::find($request->id);
        $cable->fill($request->all());
        $result = $cable->update();
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
