<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Allstuffs;
use Session;
class HomeController extends Controller
{
    public function __construct()
    {
        Session::put('guest', rand());
    }
    public function showHome()
    {
        $result [] = DB::table("guards")->orderBy('id', 'DESC')->first();
        $table [] = "guards";
        $result [] = DB::table("handsfrees")->orderBy('id', 'DESC')->first();
        $table [] = "handsfrees";
        $result [] = DB::table("headphones")->orderBy('id', 'DESC')->first();
        $table [] = "headphones";
        $result [] = DB::table("mp3players")->orderBy('id', 'DESC')->first();
        $table [] = "mp3players";
        $result [] = DB::table("glasses")->orderBy('id', 'DESC')->first();
        $table [] = "glasses";
        $result [] = DB::table("carmp3s")->orderBy('id', 'DESC')->first();
        $table [] = "carmp3s";
        $result [] = DB::table("memories")->orderBy('id', 'DESC')->first();
        $table [] = "memories";
        $result [] = DB::table("speakers")->orderBy('id', 'DESC')->first();
        $table [] = "speakers";
        $result [] = DB::table("holders")->orderBy('id', 'DESC')->first();
        $table [] = "holders";
        $result [] = DB::table("flashmemories")->orderBy('id', 'DESC')->first();
        $table [] = "flashmemories";
        $result [] = DB::table("carchargers")->orderBy('id', 'DESC')->first();
        $table [] = "carchargers";
        $result [] = DB::table("chargers")->orderBy('id', 'DESC')->first();
        $table [] = "chargers";
        $result [] = DB::table("cables")->orderBy('id', 'DESC')->first();
        $table [] = "cables";
        $result [] = DB::table("adaptors")->orderBy('id', 'DESC')->first();
        $table [] = "adaptors";
        $result [] = DB::table("auxcables")->orderBy('id', 'DESC')->first();
        $table [] = "auxcables";
        $result [] = DB::table("battries")->orderBy('id', 'DESC')->first();
        $table [] = "battries";
        return view('template',compact(['result','table']));
    }

    public function selectStuff($table,$id)
    {
        switch ($table) {
            case('adaptors'): $group_id = 1; ; break;
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

        $result = DB::table("$table")->where('id',$id)->get();
        $stock = DB::table('stocks')->where([['stuff_id','=',$id] ,['group_id','=',$group_id]])->get();
        foreach ($stock as $st)
        switch ($table) {
            case('adaptors'):
                return view('stuffs/showAdaptor',compact(['result','stock']));
                break;
            case('guards'):
                return view('stuffs/showGuard',compact(['result','stock']));
                break;
            case('auxcables'): 
                return view('stuffs/showAuxcable',compact(['result','stock']));
                break;
            case('battries'):  
                return view('stuffs/showBattery',compact(['result','stock']));
                break;
            case('cables'): 
                return view('stuffs/showCable',compact(['result','stock']));
                break;
            case('carchargers'): 
                return view('stuffs/showCarcharger',compact(['result','stock']));
                break;
            case('carmp3s'): 
                return view('stuffs/showCarmp3',compact(['result','stock']));
                break;
            case('chargers'):
                return view('stuffs/showCharger',compact(['result','stock']));
                break;
            case('flashmemories'): 
                return view('stuffs/showFlashmemory',compact(['result','stock']));
                break;
            case('glasses'): 
                return view('stuffs/showGlass',compact(['result','stock']));
                break;
            case('handsfrees'):
                return view('stuffs/showHandsfree',compact(['result','stock']));
                break;
            case('headphones'): 
                return view('stuffs/showHeadphone',compact(['result','stock']));
                break;
            case('holders'): 
                return view('stuffs/showHolder',compact(['result','stock']));
                break;
            case('memories'): 
                return view('stuffs/showMemory',compact(['result','stock']));
                break;
            case('mp3players'): 
                return view('stuffs/showMp3player',compact(['result','stock']));
                break;
            case('speakers'):
                return view('stuffs/showSpeaker',compact(['result','stock']));
                break;
        }
    }

    public function search(Request $request,$category='')
    {
        if($category!='')
        {
            $sel = DB::table('allstuffs')->where('mark', 'like', '%'.$category.'%')
                ->orWhere('modell','like', '%'. $category.'%')->get();
            switch ($category) {
                case('iphone'):
                    $mark = 'لوازم جانبی آیفون';
                    break;
                case('samsung'):
                    $mark = 'لوازم جانبی سامسونگ';
                    break;
                case('LG'):
                    $mark = 'LGلوازم جانبی';
                    break;
                case('sony'):
                    $mark = 'لوازم جانبی سونی';
                    break;
            }
        }
        else
        {
            $parametr = $request->parametr;
            $sel = DB::table('allstuffs')->where('mark', 'like', '%'.$parametr.'%')
                ->orWhere('modell','like', '%'. $parametr.'%')->get();
        }
        foreach ($sel as $select)
        {
            switch ($select->group_id) {
                case('1'): $Table = 'adaptors';       $table[]='adaptors'; break;
                case('2'): $Table = 'auxcables';      $table[]='auxcables';break;
                case('3'): $Table = 'battries';       $table[]='battries'; break;
                case('4'): $Table = 'cables';         $table[]='cables';break;
                case('5'): $Table = 'carchargers';    $table[]='carchargers';break;
                case('6'): $Table = 'carmp3s';        $table[]='carmp3s'; break;
                case('7'): $Table = 'chargers';       $table[]='chargers'; break;
                case('8'): $Table = 'flashmemories';  $table[]='flashmemories'; break;
                case('9'): $Table = 'glasses';        $table[]='glasses'; break;
                case('10'): $Table = 'guards';        $table[]='guards'; break;
                case('11'): $Table = 'handsfrees';    $table[]='handsfrees'; break;
                case('12'): $Table = 'headphones';    $table[]='headphones'; break;
                case('13'): $Table = 'holders';       $table[]='holders'; break;
                case('14'): $Table = 'memories';      $table[]='memories'; break;
                case('15'): $Table = 'mp3players';    $table[]='mp3players'; break;
                case('16'): $Table = 'speakers';      $table[]='speakers'; break;
            }
            $search[] = DB::table("$Table")->where('id',$select->stuff_id)->get();
        }
        if(isset($mark))
            return view('template',compact(['search','table','mark']));
        else
            return view('template',compact(['search','table']));
    }
    public function category($categoryArr)
    {
        //$rows = DB::table("$categoryArr")->get();
        $rows = DB::select('select * from '.$categoryArr.'' );
        switch ($categoryArr) {
            case('adaptors'): $lable = 'آداپتور'; $table='adaptors'; break;
            case('auxcables'): $lable = 'کابل AUX'; $table='auxcables';break;
            case('battries'):  $lable = 'باطری'; $table='battries'; break;
            case('cables'): $lable = 'کابل شارژ'; $table='cables'; break;
            case('carchargers'): $lable = 'شارژر فندکی'; $table='carchargers'; break;
            case('carmp3s'): $lable = 'MP3 فندکی'; $table='carmp3s'; break;
            case('chargers'): $lable = 'شارژر'; $table='chargers'; break;
            case('flashmemories'): $lable = 'فلش مموری'; $table='flashmemories'; break;
            case('glasses'): $lable = 'گلس'; $table='glasses'; break;
            case('guards'): $lable = 'گارد'; $table='guards'; break;
            case('handsfrees'): $lable = 'هندزفری'; $table='handsfrees'; break;
            case('headphones'): $lable = 'هدفون'; $table='headphones'; break;
            case('holders'): $lable = 'هلدر'; $table='holders'; break; break;
            case('memories'): $lable = 'مموری کارت'; $table='memories'; break;
            case('mp3players'): $lable = 'MP3 Player'; $table='mp3players'; break;
            case('speakers'): $lable = 'اسپیکر'; $table='speakers'; break;
        }
        return view('template',compact(['rows','lable','table']));
    }

    public function aboutUs()
    {
        return view('aboutUs');

    }
    public function contactUs()
    {
        return view('contactUs');

    }
    public function shoppingGuide()
    {
        return view('shoppingGuide');

    }
    public function accountNumber()
    {
        return view('accountNumber');

    }
    public function sendStuff()
    {
        return view('sendStuff');

    }


}

