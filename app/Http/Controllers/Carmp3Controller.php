<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carmp3;
use App\Allstuffs;
use App\Stock;
class Carmp3Controller extends Controller
{
    public function addCarmp3(Request $request)
    {
        $carmp3 = new Carmp3();
        foreach ($_POST['facilities'] as $facility)
            $carmp3->facilities .='-'.$facility;
        $carmp3->facilities=serialize($carmp3->facilities);
        $carmp3->mark = $request->mark;
        $carmp3->modell = $request->modell;
        $carmp3->color = $request->color;
        $carmp3->warranty = $request->warranty;
        $carmp3->price = $request->price;
        $carmp3->image = $request->image;
        $carmp3->explanation = $request->explanation;
        if($carmp3->save())
        {
            $row = Carmp3::orderBy('id', 'desc')->first();
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
                return view('/forms/carmp3Form');
            }
        }
    }
    public function updateCarmp3(Request $request)
    {
        $carmp3 = new Carmp3();
        $carmp3 = Carmp3::find($request->id);
        $carmp3->fill(array('facilities' => serialize($request->facilities)));
        $carmp3->fill(array('id' => $request->id,'mark'=>$request->mark,'color'=>$request->color
        ,'modell'=>$request->modell,'warranty'=>$request->warranty,
            'image'=>$request->image,'price'=>$request->price,'explanation'=>$request->explanation));
        $result = $carmp3->update();
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
