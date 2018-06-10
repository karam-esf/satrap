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
</body>
</html>