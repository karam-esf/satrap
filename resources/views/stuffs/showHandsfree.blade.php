<!Doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles2.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ساتراپ موبایل</title>
    <script>
        function addToCart() {
            <?php
             Session::push('shopping-cart', $result);
            ?>
            alert('به سبد خرید اضافه شد');
            $('#shop-button').prop('disabled', true);
            $('#shop-button').css('background-color', 'gray');
        }
        jQuery(document).ready(function(){
            @foreach($stock as $store)
                stock = {{$store->stock}};
            @endforeach
            if(stock ==0) {
                $("#lb-stock").css("background-color","red");
                $(".stuff-shop").css("display", "none");
                $("#lb-stock").html('موجود نیست');
            }
        });
    </script>
    <style>
        #shop-button:hover{background-color: #2a88bd}
    </style>
</head>
<body style="background-color: #f4f1f1">
<!--style="background-color: #7d8d8d"-->
<header id="mainHeader"> <!--style="width: 1200px;  overflow: auto; margin: auto;"-->
    <header id="logoHeader" >
        <a href="/"><img src="/images/satrap.png" id="logo" ></a>
        <!--<h5 id="logoH5" > فروشگاه لوازم جانبی موبایل</h5>-->
    </header>
    <header id="signHeader">
        <i class="fa fa-user fa-lg" id="userIcon"  ></i>
        <h5 id="signH5" >,فروشگاه اینترنتی ساتراپ</h5>
        <a id="signLink" href="/signInForm"  >وارد شوید</a>
        <a id="addUserLink" href="/signUpForm" >ثبت نام کنید&nbsp;
            <i class="fa fa-user-plus" id="addUserIcon" ></i>
        </a>
        <a id="PersuitLink" href="#"   >پیگیری سفارش&nbsp;&nbsp;
            <i class="fa fa-briefcase" id="addUserIcon" ></i>
        </a>
        <a href="/shoppingCart" id="shopping-cartLink" >سبد خرید
            <i class="fa fa-shopping-cart fa-2x" id="shopping-cartIcon" ></i>
        </a>
        <div style="float: left; margin-top: 13px; margin-right: 60px">
            <form class="form-inline" action="/search" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <button type="submit" class="btn btn-default"
                            style="margin-top: 10px; background-color: #2a88bd; color: white">جستجو</button>
                    <input  type="text" class="form-control" name="parametr" id="parametr" style="" placeholder="جستجوی کالا">
                </div>
            </form>
        </div>
        <?php if(Session::has('username') or Cookie::get('usename'))
        {
            echo'<div>';
            echo  '<label style="margin-top: 10px; float: right; color: red">خوش آمدید</label>&nbsp';
            //  echo '<h5 style="float: right; color="#aabbccdd">'.Session::get('username');'</h5>';
            echo '<h5 style="float: right; color="#aabbccdd">'.Cookie::get('usename');'</h5>';
            echo'</div>';
        }
        ?>
    </header>
</header>
<nav id="nav">
    <?php
    $category[]='iphone';$category[]='samsung';$category[]='LG';$category[]='sony';
    echo'
                <div>
                    <a href="/search/'.$category[0].'" class="navLinks">لوازم جانبی آیفون</a>
                    <a href="/search/'.$category[1].'" class="navLinks">لوازم جانبی سامسونگ</a>
                    <a href="/search/'.$category[2].'" class="navLinks"> لوازم جانبی ال جی</a>
                    <a href="/search/'.$category[3].'" class="navLinks">لوازم جانبی سونی</a>
                </div>';
    ?>
</nav>
<div style="margin: auto; margin-top: 15px; overflow: auto; width: 1200px; background-color: #f6f6f6">
    <aside id="aside" >
        <image style="border-radius:4px" src="/images/free3.png"></image>
        <image style="border-radius:4px; margin:5px 0 0 4px" src="/images/tel.png"></image>
        <div style="float:right; overflow: hidden ">
            <p class="p-categori">دسته بندی&nbsp;&nbsp;</p>
            <ul class="ul-categori" style="">
                <?php
                $categoryArr[]='mp3players';$categoryArr[]='guards';$categoryArr[]='carmp3s';
                $categoryArr[]='memories';$categoryArr[]='flashmemories';$categoryArr[]='carchargers';
                $categoryArr[]='auxcables';$categoryArr[]='cables';$categoryArr[]='handsfrees';
                $categoryArr[]='headphones';$categoryArr[]='speakers';$categoryArr[]='adaptors';
                $categoryArr[]='glasses';$categoryArr[]='chargers';$categoryArr[]='battries';
                $categoryArr[]='holders';
                echo'
                    <li class="li-categori"><a href="/category/'.$categoryArr[0].'" style="text-decoration: none">MP3 Player</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[1].'" style="text-decoration: none">محافظ گوشی</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[2].'" style="text-decoration: none">MP3فندکی</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[3].'" style="text-decoration: none">مموری کارت</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[4].'" style="text-decoration: none">فلش مموری</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[5].'" style="text-decoration: none">شارژر فندکی</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[6].'" style="text-decoration: none">کابل AUX</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[7].'" style="text-decoration: none">کابل شارژ</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[8].'" style="text-decoration: none">هندزفری</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[9].'" style="text-decoration: none">هدست</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[10].'" style="text-decoration: none">اسپیکر</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[11].'" style="text-decoration: none">آداپتور</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[12].'" style="text-decoration: none">گلس</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[13].'" style="text-decoration: none">شارژر</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[14].'" style="text-decoration: none">باطری</a></li>
                    <li class="li-categori"><a href="/category/'.$categoryArr[15].'" style="text-decoration: none">هلدر</a></li>';
                ?>
            </ul>
        </div>
    </aside>
    <section id="section">
        <div class="" style="width:900px; height: 300px;  margin: auto;  float: left; overflow: auto ">
            <img class="mySlides w3-animate-top" src="/images/glass.png" style="width:100%; border-radius:4px; height: 300px">
            <img class="mySlides w3-animate-bottom" src="/images/guard.png" style="width:100%; border-radius:4px; height: 300px" >
            <img class="mySlides w3-animate-top" src="/images/remax.png" style="width:100%; border-radius:4px; height: 300px">
            <img class="mySlides w3-animate-bottom" src="/images/cote.png" style="width:100%; border-radius:4px; height: 300px">
        </div>
        <?php
        if(isset($result)){
            foreach ($result as $res)
                echo"<img style='float:right; margin-top: 10px' src='/images/$res->image'>
                        <h3 id='showStuff-h3' style='margin-top: 10px'><br>$res->mark&nbsp;&nbsp;&nbsp;</h3>
                        <h6 id='Technic-h6' >مشخصات فنی&nbsp;&nbsp;&nbsp;</h6><br>
                        <h6 id='stuff-h6-right' >مدل &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-left' >$res->modell &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-right' >نوع اتصال&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-left' >$res->typeConnection &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-right' >مدت زمان شارژ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-left' >$res->capacity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-right' >مدت زمان کارکرد&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-left' >$res->timeBattery &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <div style='float: right; height: 300px'>
                            <h6 class='stuff-price' ><label>تومان</label>&nbsp$res->price</h6>
                            <br>
                            <h6 id='lb-stock' class='stuff-price' style='display: block' >موجود</h6>
                            <button type='button' class='stuff-shop' id='shop-button'  onclick='addToCart();'>
                                افزودن به سبد خرید<i class='fa fa-shopping-cart fa-1x' style='margin-right: 5px'></i>
                            </button>
                        </div>
                        <h6 id='stuff-h6-right' style='margin-right: 60px' >مدت زمان استند بای&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-left' >$res->timeStanby &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-right' style='margin-right: 60px' >فاصله بلوتوث&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-left' >$res->distance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>

                        <h6 id='stuff-h6-right' style='margin-right: 60px' >رنگ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-left' >$res->color &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-right' style='margin-right: 60px' >گارانتی&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-left' >$res->warranty &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <h6 id='stuff-h6-right' style='margin-right: 60px' >توضیحات&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                        <textarea rows='3' id='stuff-textarea'>$res->explanation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</textarea>";
        }
        ?>
    </section>
</div>

<footer id="footer">
    <div id="satrapLinks">
        <h4 style="font-family: 'B Homa'; margin-top: 10px; text-align: right; margin-right: 50px">ساتراپ موبایل</h4>
        <ul style="direction: rtl; margin-right: 50px">
            <li><a href="/" class="footerLinks" >صفحه اصلی</a></li>
            <li><a href="/aboutUs" class="footerLinks" >درباره ساتراپ</a></li>
            <li><a href="/contactUs" class="footerLinks" >تماس با ساتراپ</a></li>
        </ul>
    </div>
    <div id="marks">
        <h4 style="font-family: 'B Homa'; marginb-top: 10px; text-align:right;">خرید&nbsp;&nbsp;</h4>
        <ul style="direction: rtl; float: right; margin-right: 0px">
            <li><a href="/shoppingGuide"  class="footerLinks">راهنمای خرید</a></li>
            <li><a href="/accountNumber"  class="footerLinks">شماره حساب</a></li>
            <li><a href="/sendStuff"  class="footerLinks">رویه ارسال کالا</a></li>
        </ul>
    </div>
    <div id="marks">
        <h4 style="font-family: 'B Homa'; marginb-top: 10px; text-align:right;">دسته بندی</h4>
        <ul style="direction: rtl; float: right; margin-right: 10px">
            <li><a href="/search/Remax"  class="footerLinks">لوازم جانبی <span style="color: #1b6d85">Remax</span></a></li>
            <li><a href="/search/Nilkin"  class="footerLinks">لوازم جانبی <span style="color: #1b6d85">Nilkin</span></a></li>
            <li><a href="/search/JBl" class="footerLinks">لوازم جانبی <span style="color: #1b6d85">JBL</span></a></li>
        </ul>
    </div>
</footer>
<script>
    var myIndex = 0;
    carousel();
    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 3000);
    }
</script>
</body>
</html>