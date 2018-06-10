<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use function Sodium\crypto_box_publickey_from_secretkey;

class ManagementController extends Controller
{
    public function showPanel()
    {
        return view('management');
    }
    public function showForm(Request $request)
    {
        $stuff = $request->stuff;
        switch ($stuff){
            case 'glasses':
                return view('forms/glassForm');
                break;
            case 'guards':
                return view('forms/guardForm');
                break;
            case 'battries':
                return view('forms/battryForm');
                break;
            case 'cables':
                return view('forms/cableForm');
                break;
            case 'adaptors':
                return view('forms/adaptorForm');
                break;
            case 'chargers':
                return view('forms/chargerForm');
                break;
            case 'carchargers':
                return view('forms/carchargerForm');
                break;
            case 'carmp3s':
                return view('forms/carmp3Form');
                break;
            case 'speakers':
                return view('forms/speakerForm');
                break;
            case 'memories':
                return view('forms/memoryForm');
                break;
            case 'flashmemories':
                return view('forms/flashmemoryForm');
                break;
            case 'handsfrees':
                return view('forms/handsfreeForm');
                break;
            case 'headphones':
                return view('forms/headphoneForm');
                break;
            case 'holders':
                return view('forms/holderForm');
                break;
            case 'auxcables':
                return view('forms/auxcableForm');
                break;
            case 'mp3players':
                return view('forms/mp3playerForm');
                break;
        }
    }
    public function Find(Request $request)
    {
        $table = $request->stuff;
        //$result = DB::select('select * from '.$table.'' );
        $result = DB::table("$table")->orderBy('id')->get();
        if($result){
            switch ($table) {
                case('adaptors'): $group_id = 1; break;
                case('auxcables'): $group_id = 2; break;
                case('battries'):  $group_id = 3; break;
                case('cables'): $group_id = 4; break;
                case('carchargers'): $group_id = 5; break;
                case('carmp3s'): $group_id = 6; break;
                case('chargers'): $group_id = 7; break;
                case('flashmemories'): $group_id = 8; break;
                case('glasses'): $group_id = 9; break;
                case('guards'): $group_id = 10; break;
                case('handsfrees'): $group_id = 11; break;
                case('headphones'): $group_id = 12; break;
                case('holders'): $group_id = 13; break;
                case('memories'): $group_id = 14; break;
                case('mp3players'): $group_id = 15; break;
                case('speakers'): $group_id = 16; break;
            }
            /*$stock = DB::table('stocks')
                            ->leftJoin("$table",'stocks.stuff_id','=',"$table.id")
                            ->where('group_id',$group_id)->get();*/
            $stock = DB::table('stocks')->where('group_id','=',$group_id)->orderBy('stuff_id')->get();
            switch ($table) {
                case ('glasses'):
                    return view('tables/allGlasses',compact(['result','stock']));
                    break;
                case 'guards':
                    return view('tables/allGuards',compact(['result','stock']));
                    break;
                case 'battries':
                    return view('tables/allBattries',compact(['result','stock']));
                    break;
                case 'cables':
                    return view('tables/allCables',compact(['result','stock']));
                    break;
                case 'adaptors':
                    return view('tables/allAdaptors',compact(['result','stock']));
                    break;
                case 'chargers':
                    return view('tables/allChargers',compact(['result','stock']));
                    break;
                case 'carchargers':
                    return view('tables/allCarchargers',compact(['result','stock']));
                    break;
                case 'mp3players':
                    return view('tables/allMp3players',compact(['result','stock']));
                    break;
                case 'carmp3s':
                    return view('tables/allCarmp3s',compact(['result','stock']));
                    break;
                case 'speakers':
                    return view('tables/allSpeakers',compact(['result','stock']));
                    break;
                case 'memories':
                    return view('tables/allMemories',compact(['result','stock']));
                    break;
                case 'flashmemories':
                    return view('tables/allFlashmemories',compact(['result','stock']));
                    break;
                case 'handsfrees':
                    return view('tables/allHandsfrees',compact(['result','stock']));
                    break;
                case 'headphones':
                    return view('tables/allHeadphones',compact(['result','stock']));
                    break;
                case 'holders':
                    return view('tables/allHolders',compact(['result','stock']));
                    break;
                case 'auxcables':
                    return view('tables/allAuxcables',compact(['result','stock']));
                    break;
            }
        }
        else
            return back();
    }

    public function FindBy(Request $request)
    {
        $table = $request->stuff;
        $parametr = $request->parametr;
        $searchText = $request->searchText;
        if($parametr=='id')
            $result = DB:: select('select * from '.$table.' where id = '.$searchText.' ');
        if($parametr=='mark')
            $result = DB::select('select * from '.$table.' where mark = ?', [$searchText]);
        $count = count($result);
        if($result){
            switch ($table) {
                case('adaptors'): $group_id = 1; break;
                case('auxcables'): $group_id = 2; break;
                case('battries'):  $group_id = 3; break;
                case('cables'): $group_id = 4; break;
                case('carchargers'): $group_id = 5; break;
                case('carmp3s'): $group_id = 6; break;
                case('chargers'): $group_id = 7; break;
                case('flashmemories'): $group_id = 8; break;
                case('glasses'): $group_id = 9; break;
                case('guards'): $group_id = 10; break;
                case('handsfrees'): $group_id = 11; break;
                case('headphones'): $group_id = 12; break;
                case('holders'): $group_id = 13; break;
                case('memories'): $group_id = 14; break;
                case('mp3players'): $group_id = 15; break;
                case('speakers'): $group_id = 16; break;
            }
            if($parametr=='id')
                $stock = DB::table('stocks')->where([['stuff_id','=',$searchText] ,
                                                    ['group_id','=',$group_id]])->get();
            else
                foreach ($result as $res)
                    $stock = DB::table('stocks')->where([['stuff_id','=',$res->id] ,
                        ['group_id','=',$group_id]])->get();

            switch ($table) {
                case ('glasses'):
                    if($count==1)
                        return view('forms/glassForm',compact(['result','stock']));
                    else
                        return view('tables/allGlasses',compact(['result','stock']));
                    break;
                case 'guards':
                    if($count==1)
                        return view('forms/guardForm',compact(['result','stock']));
                    else
                        return view('tables/allGuards',compact(['result','stock']));
                    break;
                case 'cables':
                    if($count==1)
                        return view('forms/cableForm',compact(['result','stock']));
                    else
                        return view('tables/allCables',compact(['result','stock']));
                    break;
                case 'adaptors':
                    if($count==1)
                        return view('forms/adaptorForm',compact(['result','stock']));
                    else
                        return view('tables/allAdaptors',compact(['result','stock']));
                    break;
                case 'chargers':
                    if($count==1)
                        return view('forms/chargerForm',compact(['result','stock']));
                    else
                        return view('tables/allChargers',compact(['result','stock']));
                    break;
                case 'battries':
                    if($count==1)
                        return view('forms/battryForm',compact(['result','stock']));
                    else
                        return view('tables/allBattries',compact(['result','stock']));
                    break;
                case 'carchargers':
                    if($count==1)
                        return view('forms/carchargerForm',compact(['result','stock']));
                    else
                        return view('tables/allCarchargers',compact(['result','stock']));
                    break;
                case 'mp3s':
                    if($count==1)
                        return view('forms/mp3Form',compact(['result','stock']));
                    else
                        return view('tables/allMp3s',compact(['result','stock']));
                    break;
                case 'carmp3s':
                    if($count==1)
                        return view('forms/carmp3Form',compact(['result','stock']));
                    else
                        return view('tables/allCarmp3s',compact(['result','stock']));
                    break;
                case 'speakers':
                    if($count==1)
                        return view('forms/speakerForm',compact(['result','stock']));
                    else
                        return view('tables/allSpeakers',compact(['result','stock']));
                    break;
                case 'memories':
                    if($count==1)
                        return view('forms/memoryForm',compact(['result','stock']));
                    else
                        return view('tables/allMemories',compact(['result','stock']));
                    break;
                case 'flashmemories':
                    if($count==1)
                        return view('forms/flashmemoryForm',compact(['result','stock']));
                    else
                        return view('tables/allFlashmemories',compact(['result','stock']));
                    break;
                case 'handsfrees':
                    if($count==1)
                        return view('forms/handsfreeForm',compact(['result','stock']));
                    else
                        return view('tables/allHandsfrees',compact(['result','stock']));
                    break;
                case 'headphones':
                    if($count==1)
                        return view('forms/headphoneForm',compact(['result','stock']));
                    else
                        return view('tables/allHeadphones',compact(['result','stock']));
                    break;
                case 'holders':
                    if($count==1)
                        return view('forms/holderForm',compact(['result','stock']));
                    else
                        return view('tables/allHolders',compact(['result','stock']));
                    break;
                case 'auxcables':
                    if($count==1)
                        return view('forms/auxcableForm',compact(['result','stock']));
                    else
                        return view('tables/allAuxcables',compact(['result','stock']));
                    break;
                case 'mp3players':
                    if($count==1)
                        return view('forms/mp3playerForm',compact(['result','stock']));
                    else
                        return view('tables/allMp3players',compact(['result','stock']));
                    break;
            }

        }
            else
                return back();
    }
    public function select(Request $request)
    {
        $id = $request->id;
        $table = $request->table;
        $result = DB::table("$table")->where('id',$id)->get();
        if($result) {
            switch ($table) {
                case('adaptors'): $group_id = 1; break;
                case('auxcables'): $group_id = 2; break;
                case('battries'):  $group_id = 3; break;
                case('cables'): $group_id = 4; break;
                case('carchargers'): $group_id = 5; break;
                case('carmp3s'): $group_id = 6; break;
                case('chargers'): $group_id = 7; break;
                case('flashmemories'): $group_id = 8; break;
                case('glasses'): $group_id = 9; break;
                case('guards'): $group_id = 10; break;
                case('handsfrees'): $group_id = 11; break;
                case('headphones'): $group_id = 12; break;
                case('holders'): $group_id = 13; break;
                case('memories'): $group_id = 14; break;
                case('mp3players'): $group_id = 15; break;
                case('speakers'): $group_id = 16; break;
            }
            /*o$stock = DB::table('stocks')
                ->leftJoin("$table", 'stocks.stuff_id', '=', "$table.id")
                ->where('group_id', $group_id)->get();*/
            $stock = DB::table('stocks')->where([['stuff_id','=',$request->id] ,
                ['group_id','=',$group_id]])->get();
            switch ($table) {
                case("guards"):
                    return view('forms/guardForm', compact(['result','stock']));
                    break;
                case("glasses"):
                    return view('forms/glassForm', compact(['result','stock']));
                    break;
                case("chargers"):
                    return view('forms/chargerForm', compact(['result','stock']));
                    break;
                case("cables"):
                    return view('forms/cableForm', compact(['result','stock']));
                    break;
                case("adaptors"):
                    return view('forms/adaptorForm', compact(['result','stock']));
                    break;
                case("memories"):
                    return view('forms/memoryForm', compact(['result','stock']));
                    break;
                case("carchargers"):
                    return view('forms/carchargerForm', compact(['result','stock']));
                    break;
                case("battries"):
                    return view('forms/battryForm', compact(['result','stock']));
                    break;
                case("holders"):
                    return view('forms/holderForm', compact(['result','stock']));
                    break;
                case("speakers"):
                    return view('forms/speakerForm', compact(['result','stock']));
                    break;
                case("flashmemories"):
                    return view('forms/flashmemoryForm', compact(['result','stock']));
                    break;
                case("handsfrees"):
                    return view('forms/handsfreeForm', compact(['result','stock']));
                    break;
                case("headphones"):
                    return view('forms/headphoneForm', compact(['result','stock']));
                    break;
                case("auxcables"):
                    return view('forms/auxcableForm', compact(['result','stock']));
                    break;
                case("mp3players"):
                    return view('forms/mp3playerForm', compact(['result','stock']));
                    break;
                case("carmp3s"):
                    return view('forms/carmp3Form', compact(['result','stock']));
                    break;
            }
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $table = $request->table;
        $result = DB::table("$table")->where('id',$id)->delete();
        if($result){
            switch ($table) {
                case('adaptors'): $group_id = 1; break;
                case('auxcables'): $group_id = 2; break;
                case('battries'):  $group_id = 3; break;
                case('cables'): $group_id = 4; break;
                case('carchargers'): $group_id = 5; break;
                case('carmp3s'): $group_id = 6; break;
                case('chargers'): $group_id = 7; break;
                case('flashmemories'): $group_id = 8; break;
                case('glasses'): $group_id = 9; break;
                case('guards'): $group_id = 10; break;
                case('handsfrees'): $group_id = 11; break;
                case('headphones'): $group_id = 12; break;
                case('holders'): $group_id = 13; break;
                case('memories'): $group_id = 14; break;
                case('mp3players'): $group_id = 15; break;
                case('speakers'): $group_id = 16; break;
            }
            $del = DB::table('stocks')->where([['stuff_id','=',$id],['group_id','=',$group_id]])->delete();
            if($del)
                echo'<h3 style="background-color: #def0d8; color: #446d45; text-align: center;font-size: 14px">با موفقیت حذف شد<br>
                    <a href="management" style="color: #4a778e; margin: auto; ">مدیریت</a>
                     <a href="management" onclick="history.back()" style="color: #4a778e; margin: auto; ">بازگشت</a>
                    </h3>';
            else
                echo'';
        }
    }
}