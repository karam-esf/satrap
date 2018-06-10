<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Glass;
use App\Allstuffs;
Use App\Stock;

class GlassController extends Controller
{
    public function addGlass(Request $request)
    {
        $glass = new Glass();
        $glass->mark = $request->mark;
        $glass->kind =$request->kind;
        $glass->color = $request->color;
        $glass->mobile = $request->mobile;
        $glass->material = $request->material;
        $glass->image = $request->image;
        $glass->price = $request->price;
        $glass->explanation = $request->explanation;
        if($glass->save())
        {
            $row = Glass::orderBy('id', 'desc')->first();
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
                return view('/forms/glassForm');
            }
        }
    }

    public function updateGlass(Request $request)
    {
        $glass = new Glass();
        $glass = Glass::find($request->id);
        $glass->fill($request->all());
        $result = $glass->update();
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
