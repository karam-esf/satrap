<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Headphone;
use App\Allstuffs;
use App\Stock;
class HeadphoneController extends Controller
{
    public function addHeadphone(Request $request)
    {
        $headphone = new Headphone();
        foreach ($_POST['facilities'] as $facility)
            $headphone->facilities.='-'.$facility;
        $headphone->facilities = serialize($headphone->facilities);
        $headphone->mark = $request->mark;
        $headphone->modell = $request->modell;
        $headphone->color = $request->color;
        $headphone->capacity = $request->capacity;
        $headphone->call = $request->call;
        $headphone->timeWork = $request->timeWork;
        $headphone->warranty = $request->warranty;
        $headphone->image = $request->image;
        $headphone->explanation = $request->explanation;
        $headphone->price = $request->price;
        if($headphone->save())
        {
            $row = Headphone::orderBy('id', 'desc')->first();
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
                return view('/forms/headphoneForm');
            }
        }
    }

    public function updateHeadphone(Request $request)
    {
        $headphone = new Headphone();
        $headphone = Headphone::find($request->id);
        $headphone->fill(array('facilities' => serialize($request->facilities)));
        $headphone->fill(array('id' => $request->id,'mark'=>$request->mark,'color'=>$request->color
        ,'modell'=>$request->modell,'capacity'=>$request->capacity,'warranty'=>$request->warranty,
            'image'=>$request->image,'price'=>$request->price,'explanation'=>$request->explanation,
            'timeWork'=>$request->timeWork));
        $result = $headphone->update();
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
