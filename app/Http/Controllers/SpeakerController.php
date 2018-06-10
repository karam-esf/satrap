<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Speaker;
use App\Stock;
class SpeakerController extends Controller
{
    public function addSpeaker(Request $request)
    {
        $speaker = new Speaker();
        foreach ($_POST['facilities'] as $facility)
            $speaker->facilities .='-'.$facility;
        $speaker->facilities=serialize($speaker->facilities);
       // echo unserialize($speaker->facilities);
       // $speaker->facilities = serialize($_POST['facilities']);
        $speaker->mark = $request->mark;
        $speaker->modell = $request->modell;
        $speaker->color = $request->color;
        $speaker->warranty = $request->warranty;
        $speaker->timeWork = $request->timeWork;
        $speaker->kindBattery = $request->kindBattery;
        $speaker->image = $request->image;
        $speaker->price = $request->price;
        $speaker->explanation = $request->explanation;
        if($speaker->save())
        {
            $row = Speaker::orderBy('id', 'desc')->first();
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
                return view('/forms/speakerForm');
            }
        }
    }

    public function updateSpeaker(Request $request)
    {
        $speaker = new Speaker();
        $speaker = Speaker::find($request->id);
        $speaker->fill(array('facilities' => serialize($request->facilities)));
        $speaker->fill(array('id' => $request->id,'mark'=>$request->mark,'color'=>$request->color
        ,'modell'=>$request->modell,'kindBattery'=>$request->kindBattery,'warranty'=>$request->warranty,
            'image'=>$request->image,'price'=>$request->price,'explanation'=>$request->explanation,
            'timeWork'=>$request->timeWork));
        $result = $speaker->update();
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
