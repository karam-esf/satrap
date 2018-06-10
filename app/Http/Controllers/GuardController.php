<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Guard;
use App\Allstuffs;
use App\Stock;

class GuardController extends Controller
{
    public function addGuard (Request $request)
    {
        $guard = new Guard();
        $guard->mark = $request->mark;
        $guard->mobile = $request->mobile;
        $guard->material = $request->material;
        $guard->image = $request->image;
        $guard->price = $request->price;
        $guard->explanation = $request->explanation;
        if ($guard->save()) {
            $row = Guard::orderBy('id', 'desc')->first();
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
                Session()->flash('message', 'با موفقیت ذخیره گردید');//get
                return view('/forms/guardForm');
            }
        }
    }

    public function updateGuard(Request $request)
    {
        $guard = new Guard();
        $guard = Guard::find($request->id);
        $guard->fill($request->all());
        $result = $guard->update();
        if($result)
        {
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
