<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mp3player;
use App\Allstuffs;
use App\Stock;
class Mp3playerController extends Controller
{
    public function addMp3player(Request $request)
    {
        $mp3player = new Mp3player();
        foreach ($_POST['facilities'] as $facility)
            $mp3player->facilities .='-'.$facility;
        $mp3player->facilities=serialize($mp3player->facilities);
        $mp3player->mark = $request->mark;
        $mp3player->modell = $request->modell;
        $mp3player->color = $request->color;
        $mp3player->capacity = $request->capacity;
        $mp3player->timeWork = $request->timeWork;
        $mp3player->warranty = $request->warranty;
        $mp3player->price = $request->price;
        $mp3player->image = $request->image;
        $mp3player->explanation = $request->explanation;
        if($mp3player->save())
        {
            $row = Mp3player::orderBy('id', 'desc')->first();
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
                return view('/forms/mp3playerForm');
            }
        }
    }
    public function updateMp3player(Request $request)
    {
        $mp3player = new Mp3player();
        $mp3player = Mp3player::find($request->id);
        $mp3player->fill(array('facilities' => serialize($request->facilities)));
        $mp3player->fill(array('id' => $request->id,'mark'=>$request->mark,'color'=>$request->color
        ,'modell'=>$request->modell,'capacity'=>$request->capacity,'warranty'=>$request->warranty,
            'image'=>$request->image,'price'=>$request->price,'explanation'=>$request->explanation,
            'timeWork'=>$request->timeWork));
        $result = $mp3player->update();
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