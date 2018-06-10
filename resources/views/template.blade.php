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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../public/jspersiannumber.js"></script>
    <title>ساتراپ موبایل</title>
    <script>
        $(document).ready(function(){
            <?php

            ?>
            $('#price').persiaNumber();
            $(".input-group-addon").mouseover(function(){
                $(this).css('cursor','pointer');

            });
            $(".input-group-addon").click(function(){
                $(".searchForm").submit();
            });
        });
    </script>
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
    <div style="margin: auto; margin-top: 15px; overflow: auto; width: 1200px; background-color: #ffffff">
        <aside id="aside">
            <image style="border-radius:4px" src="/images/free3.png"></image>
            <a href="#" ><image style="border-radius:4px; margin:5px 0 0 4px" src="/images/tel.png"></image></a>
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
        <section id="section" >
            <div class="" style="width:900px; height: 300px;  margin: auto; float: left;  ">
                <img class="mySlides w3-animate-top" src="/images/glass.png" style="width:100%; border-radius:4px; height: 300px">
                <img class="mySlides w3-animate-bottom" src="/images/guard.png" style="width:100%; border-radius:4px; height: 300px" >
                <img class="mySlides w3-animate-top" src="/images/remax.png" style="width:100%; border-radius:4px; height: 300px">
                <img class="mySlides w3-animate-bottom" src="/images/cote.png" style="width:100%; border-radius:4px; height: 300px ">
            </div>
        @if(isset($search) and isset($mark))
                <label id="newsLable">{{$mark}}&nbsp;&nbsp;</label>
        @endif
        @if(isset($search) and !isset($mark))
            <label id="newsLable">نتایج جستجو&nbsp;&nbsp;</label>
        @endif
        @if(isset($result))
            <label id="newsLable">جدیدترین ها&nbsp;&nbsp;</label>
        @endif
        @if(isset($lable))
             <label id="newsLable">{{$lable}}&nbsp;&nbsp;</label>
        @endif
        <?php
            if(isset($rows)){
                echo'<table style="overflow: auto;  "><tr>';
                $rowCounter = 0;
                    //$i = 0;
                foreach($rows as $row){
                    echo "<td style='border:1px solid #e6eecb; width: 300px'>
                        <a href='/selectStuff/$table/$row->id' target='_blank'>
                            <img alt='$row->explanation' src='/images/$row->image'
                                 style=' width: 250px;'>
                        </a>";
                        //++$i;
                        if(isset($row->mark))
                        echo"<label style='display: block'>$row->mark</label>";
                        if(isset($row->modell))
                        echo"<label style='display: block'>$row->modell</label>";
                        if(isset($row->mobile))
                        echo"<label style='display: block'>$row->mobile</label>";
                        echo"<label>تومان</label>&nbsp;<label style='color: #31708f'>$row->price</label>";
                        echo"";
                        echo"</td>";
                    ++$rowCounter;
                    if($rowCounter==3)
                    {
                    echo'</tr>';
                echo'<tr>';
                    $rowCounter = 0 ;
                    }
                    }
                    echo'</table>';
            }
            ?>

        <?php
            if(isset($search)){
                echo'<table style="overflow: auto; "><tr>';
                $rowCounter = 0;
                $i = 0;
                foreach($search as $res){
                    $id=(int)$res[0]->id;
                    $exolanation = $res[0]->explanation;
                    $price = $res[0]->price;
                    $image = $res[0]->image;
                    if(isset($res[0]->mark))
                        $mark = $res[0]->mark;
                    if(isset($res[0]->modell))
                        $modell = $res[0]->modell;
                    echo "<td style='border: 1px solid #e6eecb; width: 300px'>
                            <a href='/selectStuff/$table[$i]/$id' target='_blank'>
                                <img alt='$exolanation' src='/images/$image' class='img-home'
                                         style='width: 250px; '><a>";
                    ++$i;
                    if(isset($mark))
                        echo"<label style='display: block'>$mark</label>";
                    if(isset($modell))
                        echo"<label style='display: block'>$modell</label>";

                    echo"<label>تومان</label>&nbsp;<label style='color: #31708f'>$price</label>";
                    echo"";
                    echo"</td>";
                    ++$rowCounter;
                    if($rowCounter==3)
                    {
                        echo'</tr>';
                        echo'<tr>';
                        $rowCounter = 0 ;
                    }
                }
                echo'</table>';
            }
            ?>
                <?php
                    if(isset($result)){
                        echo'<table style="overflow: auto;  "><tr>';
                        $rowCounter = 0;
                        $i = 0;
                        foreach($result as $res){
                            echo "<td style='border:1px solid #e6eecb; width: 300px'>
                                    <a href='/selectStuff/$table[$i]/$res->id' target='_blank'>
                                        <img alt='$res->explanation' src='/images/$res->image'
                                         style=' width: 250px;'>
                                    </a>";
                            ++$i;
                            if(isset($res->mark))
                                echo"<label style='display: block'>$res->mark</label>";
                            if(isset($res->modell))
                                echo"<label style='display: block'>$res->modell</label>";
                            if(isset($res->mobile))
                                echo"<label style='display: block'>$res->mobile</label>";
                            echo"<label>تومان</label>&nbsp;<label id='price' style='color: #31708f;'>$res->price</label>";
                            echo"";
                            echo"</td>";
                            ++$rowCounter;
                            if($rowCounter==3)
                            {
                                echo'</tr>';
                                echo'<tr>';
                                $rowCounter = 0 ;
                            }
                        }
                        echo'</table>';
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