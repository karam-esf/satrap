<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Auxcable;
use App\Stock;
use App\Allstuffs;
class AuxcableController extends Controller
{
    public function addAuxcable(Request $request)
    {
        $auxcable = new Auxcable();
        $auxcable->mark = $request->mark;
        $auxcable->modell = $request->modell;
        $auxcable->color = $request->color;
        $auxcable->lenght = $request->lenght;
        $auxcable->warranty = $request->warranty;
        $auxcable->image = $request->image;
        $auxcable->price = $request->price;
        $auxcable->explanation = $request->explanation;
        if($auxcable->save())
        {
            $row = Auxcable::orderBy('id', 'desc')->first();
            $id = (int)$row->id;
            $stock = new Stock();
            $stock->stuff_id = $id;
            $stock->group_id = $request->group_id;
            $stock->stock = $request->stock;

            $stuff = new Allstuffs();
            $stuff->stuff_id = $id;
            $stuff->group_id = $request->group_id;
            $stuff->mark = $request->mark;
            $stuff->modell = $request->modell;
            $stuff->image = $request->image;
            $stuff->price = $request->price;
            if($stock->save()and $stuff->save()) {
                Session()->flash('message', 'با موفقیت ذخیره گردید');
                return view('/forms/auxcableForm');
            }
        }
    }
    public function updateAuxcable(Request $request)
    {
        $auxcable = new Auxcable();
        $auxcable = Auxcable::find($request->id);
        $auxcable->fill($request->all());
        $result = $auxcable->update();
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
