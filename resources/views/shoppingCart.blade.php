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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ساتراپ موبایل</title>
    <script>
        function delet(stuff){
            <?php
                /*foreach($shoppingCart as $cart)
                {
                    if($cart[0]->mark=='gvhm'){
                        echo 'ooooooooo';
                    }
                }*/
            ?>
        }
        var price,stock,total,Totality=0;
        $(document).ready(function() {
            var table = document.getElementById('shoppingCart'),
                rowLength = table.rows.length;
            for(var i=1; i<rowLength-2; ++i) {
                var row = table.rows[i];
                Totality += parseInt($(row).find('.total').html());
            }
            $('.Totality').text(Totality);
            jQuery('.delete').click(function(e) {
                var stuff = $(this).parents("tr").find('.title').html(),
                    rowId = $(this).parents("tr").attr('id'),
                    total = parseInt($(this).parents("tr").find(".total").html()),
                    Totality = parseInt($('.Totality').html());
               e.preventDefault();
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   }
               });
               jQuery.ajax({
                   url: "/deleteStuff",
                   method: 'post',
                   data: {
                       _token: '{!! csrf_token() !!}',
                       'stuff': stuff,
                       'rowId':rowId
                    },
                    success: function (response) {
                       $(document.getElementById(rowId)).hide();
                        $(this).parents("tr").find(".Totality").html(total),
                        $('.Totality').text(Totality-total);
                    },
                    error: function (response) {
                       $('.data').html( response.error);
                    }
                });

            });
        $("button.Increase").click(function () {
            price = $(this).parents("tr").find(".price").html();
            stock = parseInt($(this).siblings(".stock").val());
            stock += 1;
            total = price * stock;
            $(this).siblings(".stock").val(stock);
            $(this).parents("tr").find(".total").html(total);
            Totality +=parseInt(price);
            $('.Totality').text(Totality);
        });
        $("button.Decrease").click(function () {
            stock = parseInt($(this).siblings(".stock").val());
            if(stock>1)
            {
                price = $(this).parents("tr").find(".price").html();
                stock -= 1;
                total = price * stock;
                $(this).siblings(".stock").val(stock);
                $(this).parents("tr").find(".total").html(total);
                Totality -=parseInt(price);
                $('.Totality').text(Totality);

            }
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
        <label id="newsLable">سبد خرید&nbsp;&nbsp;</label>
        <table id="shoppingCart" style=" margin: auto; width: 850px;">
            <tr style="background-color: skyblue; color: #ffffff;font-family: 'B Nazanin';">
                <td class="cart-td" style="width: 70px;">حذف</td>
                <td class="cart-td" style="">مجموع</td>
                <td class="cart-td" style="width: 150px;">تعداد</td>
                <td class="cart-td" style="width: 150px;">قیمت واحد/تومان</td>
                <td class="cart-td" style="">عنوان محصول</td>
            </tr>
            <?php
                $rowCounter = 0;
            for($i=0;$i<=count($shoppingCart);++$i){
                if(isset($shoppingCart[$i][0])){
                    echo'<tr class="data" id='.$rowCounter.' >';
                    echo"<td style='font-size: 20px; border-color: lightgray'>
                            <button  type='button' class='delete' ><span class='glyphicon glyphicon-remove'></span></button>
                        </td>";
                    echo"<td class='total' style='border-color: lightgray'>".$shoppingCart[$i][0]->price."</td>";
                    echo"<td style='border-color: lightgray'>
                            <button class='Increase'>+</button>
                            <input type='text' value='1' class='stock' style='width: 40px; text-align: center'>
                            <button class='Decrease'>-</button>
                         </td>";
                    echo"<td class='price' style='border-color: lightgray'>".$shoppingCart[$i][0]->price."</td>";
                    if(isset($shoppingCart[$i][0]->mark) and !(isset($shoppingCart[$i][0]->modell)))
                        echo"<td style='border-color: lightgray' class='title'>".$shoppingCart[$i][0]->mark."</td>";
                    if(isset($shoppingCart[$i][0]->mark) and isset($shoppingCart[$i][0]->modell))
                        echo"<td style='border-color: lightgray' class='title'>".$shoppingCart[$i][0]->mark.
                            $shoppingCart[$i][0]->modell."</td>";
                    echo'</tr>';
                    ++$rowCounter;
                }
            }

                /*foreach($shoppingCart as $cart){
                    echo'<tr class="data" id='.$rowCounter.' >';
                    echo"<td style='font-size: 20px; border-color: lightgray'>
                            <button  type='button' class='delete' ><span class='glyphicon glyphicon-remove'></span></button>
                        </td>";
                    echo"<td class='total' style='border-color: lightgray'>".$cart[0]->price."</td>";
                    echo"<td style='border-color: lightgray'>
                            <button class='Increase'>+</button>
                            <input type='text' value='1' class='stock' style='width: 40px; text-align: center'>
                            <button class='Decrease'>-</button>
                         </td>";
                    echo"<td class='price' style='border-color: lightgray'>".$cart[0]->price."</td>";
                    echo"<td style='border-color: lightgray' class='title'>".$cart[0]->mark."</td>";
                    echo'</tr>';
                    ++$rowCounter;
                }*/
            ?>
            <tr style="background-color: skyblue; font-family: 'B Nazanin'">
                <td style="border-right: none; border-color: lightgray;">&nbsp;</td>
                <td class="Totality"  style="color: #ffffff; border-width: 1px 0px 1px 0px; font-size: 20px;  border-color: lightgray; ">
                </td>
                <td colspan="3" style="color: #ffffff; border-color: lightgray; font-size: 20px; font-family: 'B Nazanin';">
                    مجموع
                </td>
            </tr>
            <tr>
                <td colspan="5" style="border: none">
                    <a href="/customerInformation" style="float: right; margin-top: 20px" >
                        <button type="button" class="btn btn-primary" style="font-weight: bold">تایید سفارش</button>
                    </a>
                </td>
            </tr>
        </table>
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
            <li><a href="shoppingGuide"  class="footerLinks">راهنمای خرید</a></li>
            <li><a href="accountNumber"  class="footerLinks">شماره حساب</a></li>
            <li><a href="sendStuff"  class="footerLinks">رویه ارسال کالا</a></li>
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