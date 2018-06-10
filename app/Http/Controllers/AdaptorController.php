<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Adaptor;
use App\Stock;
use App\Allstuffs;

class AdaptorController extends Controller
{
    public function addAdaptor(Request $request)
    {
       // echo $id = Adaptor::latest('id')->get();
        $adaptor = new Adaptor();
        $adaptor->mark = $request->mark;
        $adaptor->color = $request->color;
        $adaptor->mobile = $request->mobile;
        $adaptor->ampere = $request->ampere;
        $adaptor->inputVoltage = $request->inputVoltage;
        $adaptor->warranty = $request->warranty;
        $adaptor->image = $request->image;
        $adaptor->price = $request->price;
        $adaptor->explanation = $request->explanation;
        if($adaptor->save())
        {
            $row = Adaptor::orderBy('id', 'desc')->first();
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

            if($stock->save() and $stuff->save()){
                Session()->flash('message','با موفقیت ذخیره گردید');
                return view('/forms/adaptorForm');
            }
        }
    }
    public function updateAdaptor(Request $request)
    {
        $adaptor = new Adaptor();
        $adaptor = Adaptor::find($request->id);
        $adaptor->fill($request->all());
        $result = $adaptor->update();
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