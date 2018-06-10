<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ShoppingcartController extends Controller
{
    public function shoppingCart()
    {
        $shoppingCart = Session::get('shopping-cart');
        return view('shoppingCart',compact('shoppingCart'));
    }
    public function delete(Request $request)
    {
        $rowId = $request->rowId;
        $shoppingCart = Session::get('shopping-cart');
        unset($shoppingCart[$rowId][0]);
        return response()->json(['success' =>Session::get('shopping-cart')], 200);
        // Session::pull('shopping-cart',$shoppingCart[$rowId][0]);
    }

    public function customerInformation()
    {
        return view('customerInformation');

        
    }
    public function registerCustomer()
    {
        
    }

    public function getcity(Request $request)
    {
        $city = Array();
        switch ($request->state){
            case('آذربایجان شرقی'):
                $city[][] = 'هشترود';$city[][] = 'هریس';$city[][] = 'آذرشهر';$city[] = 'ورزقان'; $city[] = 'میانه';
                $city[] = 'ملکان';$city[] = 'مرند';$city[] = 'مراغه';$city[] = 'کلیبر';$city[] = 'عجب‌شیر';
                $city[] = 'شبستر';$city[] = 'سراب';$city[] = 'چاراویماق';$city[] = 'جلفا';$city[] = 'تبریز';
                $city[] = 'بناب';$city[] = 'بستان‌آباد';$city[] = 'اهر';$city[] = 'اسکو';
            break;
            case('آدزبایجان غربی'):
                $city[] = 'نقده';$city[] = 'میاندوآب';$city[] = 'مهاباد';$city[] = 'ماکو';$city[] = 'شاهین‌دژ';
                $city[] = 'سلماس';$city[] = 'سردشت';$city[] = 'خوی';$city[] = 'چالدران';$city[] = 'تکاب';
                $city[] = 'پیرانشهر';$city[] = 'بوکان';$city[] = 'اشنویه';$city[] = 'ارومیه';
            break;
            case('اردبیل'):
                $city[] = 'نیر';$city[] = 'نَمین';$city[] = 'مِشگین‌شهر';$city[] = 'گِرمی';$city[] = 'کوثر';$city[] = 'خلخال';
                $city[] = 'پارس‌آباد';$city[] = 'بیله‌سوار';$city[] = 'اردبیل';
            break;
            case('اصفهان'):
                $city[] = 'نطنز';$city[] = 'آران و بیدگل ';$city[] = 'نجف‌آباد';$city[] = 'نائین';$city[] = 'مبارکه';
                $city[] = 'لنجان';$city[] = 'گلپایگان';$city[] = 'کاشان';$city[] = 'فلاورجان';$city[] = 'فریدون‌شهر';
                $city[] = 'فریدن';$city[] = 'سمیرم سفلی';$city[] = 'سمیرم ,شهرضا';$city[] = 'خوانسار';$city[] = 'خمینی‌شهر';
                $city[] = 'چادگان';$city[] = 'تیران و کرون';$city[] = 'برخوار و میمه';$city[] = 'اصفهان';$city[] = 'اردستان';
            break;
            case('ایلام'):
                $city[] = 'مهران';$city[] = 'شیروان و چرداول';$city[] = 'دهلران';$city[] = 'دره‌شهر';$city[] = 'ایوان';
                $city[] = 'ایلام';$city[] = 'آبدانان';
            break;
            case('بوشهر'):
                $city[] = 'گناوه';$city[] = 'کنگان';$city[] = 'دیلم';$city [] = 'دشتی,دیر';$city[] = 'دشتستان';
                $city[] = 'جم';$city[] = 'تنگستان';$city[] = 'بوشهر';
            break;
            case('تهران'):
                $city[] = 'ورامین';$city[] = 'نظرآباد';$city[] = 'کرج';$city[] = 'فیروزکوه';$city[] = 'شهریار';
                $city[] = 'شمیرانات';$city[] = 'ساوجبلاغ';$city[] = 'ری';$city[] = 'رباط‌کریم';$city[] = 'دماوند';
                $city[] = 'تهران';$city[] = 'پاکدشت';$city[] = 'اسلام‌شهر';
            break;
            case('چهارمحال و بختیاری'):
                $city[] = 'لردگان';$city[] = 'کوهرنگ';$city[] = 'فارسان';$city[] = 'شهرکرد';$city[] = 'بروجن';
                $city[] = 'اردل';
            break;
            case('خراسان جنوبی'):
                $city[] = 'نهبندان';$city[] = 'قائنات';$city[] = 'فردوس';$city[] = 'سربیشه';$city[] = 'سرایان';
                $city[] = 'درمیان';$city[] = 'بیرجند';$city[] = ',بیرجند';
            break;
            case('خراسان شمالی'):
                $city[] = 'مانه و سملقان';$city[] = 'فاروج';$city[] = 'شیروان';$city[] = 'جاجرم';
                $city[] = 'بجنورد';$city[] = 'اسفراین';
            break;
            case('خوزستان'):
                $city[] = 'هندیجان';$city[] = 'مسجد سلیمان';$city[] = 'لالی'; $city[] = 'لالی';$city[] = 'گتوند';
                $city[] = 'شوشتر'; $city[] = 'شوش';$city [] = 'شادگان'; $city[] = 'رامهرمز';$city[] = 'رامشیر';
                $city[] = 'دشت آزادگان';$city[] = 'دزفول';$city[] = 'خرمشهر';$city[] = 'بهبهان';
                $city[] = 'بندر ماهشهر';$city[] = 'باغ‌ملک';$city[] = 'ایذه';$city[] = 'اهواز';
                $city[] = 'اندیمشک';$city[] = 'امیدیه';$city[] = 'آبادان';
            break;
            case('زنجان'):
                $city[] = 'ماه‌نشان';$city[] = 'طارم';$city[] = 'زنجان';$city[] = 'خرمدره';$city[] = 'خدابنده';
                $city[] = 'ایجرود';$city[] = 'ابهر';
            break;
            case('سمنان'):
                $city[] = 'مهدی‌شهر';$city[] = 'گرمسار';$city[] = 'شاهرود';$city[] = 'سمنان';$city[] = 'دامغان';
            break;
            case('سیستان و بلوچستان'):
                $city[] = 'نیک‌شهر';$city[] = 'کنارک';$city[] = 'سرباز';$city[] = 'سراوان';$city[] = 'زهک';
                $city[] = 'زاهدان';$city[] = 'زابل';$city[] = 'دلگان';$city[] = 'خاش';$city[] = 'چابهار';
                $city[] = 'ایرانشهر';
            break;
            case('فارس'):
                $city[] = 'نی‌ریز';$city[] = 'مهر';$city[] = 'ممسنی';$city[] = 'مرودشت';$city[] = 'لامِرد';
                $city[] = 'لارستان';$city[] = 'کازرون';$city[] = 'قیر و کارزین'; $city[] = 'فیروزآباد';
                $city[] = 'فسا';$city[] = 'فراشبند';$city[] = 'شیراز';$city[] = 'سپیدان';$city[] = 'زرین‌دشت';
                $city[] = 'داراب';$city[] = 'خنج';$city[] = 'خرم‌بید';$city[] = 'جهرم';$city[] = 'پاسارگاد';
                $city[] = 'بوانات';$city[] = 'اقلید';$city[] = 'استهبان';$city[] = 'ارسنجان';$city[] = 'آباده';
            break;
            case('قزوین'):
                $city[] = 'قزوین';$city[] = 'تاکستان'; $city[] = 'بوئین‌زهرا';$city[] = 'البرز';$city[] = 'آبیک';
            break;
            case('قم'):$city[] = 'قم';break;
            case('کردستان'):
                $city[] = 'مریوان';$city[] = 'کامیاران';$city[] = 'قروه';$city[] = 'سنندج';$city [] = 'سقز';
                $city[] = 'سروآباد';$city[] = 'دیواندره';$city[] = 'بیجار';$city[] = 'بانه';
            break;
            case('کرمان'):
                $city[] = 'منوجان';$city[] = 'کهنوج';$city[] = 'کوهبنان';$city[] = 'کرمان';$city[] = 'قلعه گنج';
                $city[] = 'عنبرآباد';$city[] = 'شهر بابک';$city[] = 'سیرجان';$city[] = 'زرند';$city[] = 'رودبار جنوب';
                $city[] = 'رفسنجان';$city[] = 'راور';$city[] = 'جیرفت';$city[] = 'بم';$city[] = 'بردسیر';
                $city[] = 'بافت';
            break;
            case('کرمانشاه'):
                $city[] = 'گیلان غرب';$city[] = 'کنگاور';$city[] = 'کرمانشاه';$city[] = 'قصر شیرین';
                $city[] = 'صحنه';$city[] = 'سنقر';$city[] = 'سرپل ذهاب';$city[] = 'روانسر';$city[] = 'دالاهو';
                $city[] = 'جوانرود';$city[] = 'ثلاث باباجانی';$city[] = 'پاوه';$city[] = 'اسلام‌آباد غرب';
            break;
            case('کهگیلویه و بویراحمد'):
                $city[] = 'گچساران';$city[] = 'کهگیلویه';$city[] = 'دنا';$city[] = 'بهمئی';$city[] = 'بویراحمد';
            break;
            case('گلستان'):
                $city[] = 'مینودشت';$city[] = 'مراوه‌تپه';$city[] = 'گنبد کاووس';$city[] = 'گرگان';$city[] = 'کلاله';
                $city[] = 'کردکوی';$city[] = 'علی‌آباد';$city[] = 'رامیان';$city[] = 'ترکمن';$city[] = 'بندر گز';
                $city[] = 'آق‌قلا';$city[] = 'آزادشهر';
            break;
            case('لرستان'):
                $city[] = 'کوهدشت';$city[] = 'سلسله';$city[] = 'دلفان';$city[] = 'دورود';$city[] = 'خرم‌آباد';
                $city[] = 'پل‌دختر';$city[] = 'بروجرد';$city[] = 'الیگودرز';$city[] = 'ازنا';
            break;
            case('مازندران'):
                $city[] = 'نوشهر';$city[] = 'نور';$city[] = 'نکا';$city[] = 'محمودآباد';$city[] = 'گلوگاه';
                $city[] = 'قائم‌شهر';$city[] = 'سوادکوه';$city[] = 'ساری';$city[] = 'رامسر';$city[] = 'چالوس';
                $city[] = 'جویبار';$city[] = 'تنکابن';$city[]= 'بهشهر';$city[]= 'بابلسر';$city[] = 'بابل';
                $city[] = 'آمل';
            break;
            case('مرکزی'):
                $city[] = 'محلات';$city[] = 'کمیجان';$city[] = 'شازند';$city[] = 'ساوه';$city[] = 'زرندیه';
                $city[] = 'دلیجان';$city[] = 'خمین';$city[] = 'تفرش';$city[] = 'اراک';$city[] = 'آشتیان';
            break;
            case ('هرمزگان'):
                $city[] = 'میناب';$city[] = 'گاوبندی';$city[] = 'قشم';$city[] = 'رودان';$city[] = 'شهرستان خمیر';
                $city[] = 'حاجی‌آباد';$city[] = 'جاسک';$city[] = 'بندر لنگه';$city[] = 'بندر عباس';
                $city[] = 'بستک';$city[] = 'ابوموسی';$city[] = 'ابوموسی';
            break;
            case('همدان'):
                $city[] = 'همدان';$city[] = 'نهاوند';$city[] = 'ملایر';$city[] = 'کبودرآهنگ';$city[] = 'رزن';
                $city[] = 'تویسرکان';$city[] = 'بهار';$city[] = 'اسدآباد';
            break;
            case('یزد'):
                $city[] = 'یزد';$city[] = 'مِیبُد';$city[] = 'مهریز';$city[] = 'طبس';$city[] = 'صدوق';
                $city[] = 'خاتم';$city[] = 'تفت';$city[] = 'بافق';$city[] = 'اردکان';$city[] = 'ابرکوه';
            break;
        }
        return response()->json(['success' =>$city], 200);
    }

}
