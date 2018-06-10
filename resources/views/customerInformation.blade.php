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
        $(document).ready(function(){
                jQuery('#state').change(function(e){
                    var province = $('#state').val(),cities = [];
                    //alert (province);
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "/getCity",
                        method: 'post',
                        data: {
                            _token: '{!! csrf_token() !!}',
                            'state': province
                        },
                        success: function(response) {
                            cities = response.success;
                            for(i=0;i<=cities.length;i++)
                                $("#city").append(new Option(cities[i],cities[i]));
                        }
                    });
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
<div style="margin: auto; margin-top: 15px; overflow: auto; width: 1200px; background-color: #f6f6f6">
    <section id="section">
    <h3 class="shopCart-h3">اطلاعات ارسال&nbsp;</h3>
    <table border="0" style="float: right; width: 700px; margin-top: 20px;">
        <form style="width:600px; float: right; clear: both;  " action="/signUp"  method="post">
            {!! csrf_field() !!}
            <tr style="border: none">
                <td style="border: none;" ><label class="shop-label">ضروری</label></td>
                <td style="border: none"><input type="text" required name="name" id="name" style="width: 200px;margin-top: 20px;"
                    oninput="this.value = this.value.replace(/[^ا-ی.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                </td>
                <td style="border: none"><label class="reg-label" style="margin-top: 0px">نام</label></td>
            </tr>
            <tr style="border: none">
                <td style="border: none"><label class="shop-label">ضروری</label></td>
                <td style="border: none"><input type="text" required name="family" id="family" style="width: 200px;margin-top: 20px;"
                    oninput="this.value = this.value.replace(/[^ا-ی.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                </td>
                <td style="border: none"><label class="reg-label" style="margin-top: 0px">نام خانوادگی</label></td>
            </tr>
            <tr style="border: none">
                <td style="border: none"><label class="shop-label">ضروری</label></td>
                <td style="border: none"><input type="text" required name="tel" id="tel" style="width: 200px;margin-top: 20px;"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                </td>
                <td style="border: none"><label class="reg-label" style="margin-top: 0px">تلفن ثابت</label></td>
            </tr>
            <tr style="border: none">
                <td style="border: none"><label class="shop-label">ضروری</label></td>
                <td style="border: none"><input type="text" required name="mobile" id="mobile" style="width: 200px; margin-top: 20px;"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                </td>
                <td style="border: none"><label class="reg-label" style="margin-top: 0px">موبایل</label></td>
            </tr>
            <tr>
                <td style="border: none"><label class="shop-label">ضروری</label></td>
                <td style="border: none">
                    <select id="state" name="state" required runat="server" onchange="" class="reg-select"  >
                        <option value=""></option>
                        <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                        <option value="آذربایجان غربی">آذربایجان غربی</option>
                        <option value="اردبیل">اردبیل</option>
                        <option value="اصفهان">اصفهان</option>
                        <option value="ایلام">ایلام</option>
                        <option value="بوشهر">بوشهر</option>
                        <option value="تهران">تهران</option>
                        <option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
                        <option value="خراسان جنوبی">خراسان جنوبی</option>
                        <option value="خراسان رضوی">خراسان رضوی</option>
                        <option value="خراسان شمالی">خراسان شمالی</option>
                        <option value="خوزستان">خوزستان</option>
                        <option value="زنجان">زنجان</option>
                        <option value="سمنان">سمنان</option>
                        <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                        <option value="فارس">فارس</option>
                        <option value="قزوین">قزوین</option>
                        <option value="قم">قم</option>
                        <option value="کردستان">کردستان</option>
                        <option value="کرمان">کرمان</option>
                        <option value="کرمانشاه">کرمانشاه</option>
                        <option value="کهگیلویه و بویراحمد">کهگیلویه و بویراحمد</option>
                        <option value="گلستان">گلستان</option>
                        <option value="گیلان">گیلان</option>
                        <option value="لرستان">لرستان</option>
                        <option value="مازندران">مازندران</option>
                        <option value="مرکزی">مرکزی</option>
                        <option value="هرمزگان">هرمزگان</option>
                        <option value="همدان">همدان</option>
                        <option value="یزد">یزد</option>
                    </select>
                <td style="border: none"><label class="reg-label">استان</label></td>
            </tr>
            <tr>
                <td style="border: none"><label class="shop-label">ضروری</label></td>
                <td style="border: none"><select id="city" name="city" required runat="server" style="margin-top: 20px; width: 200px;direction: rtl; " ></select></td>
                <td style="border: none"><label class="reg-label">شهرستان</label></td>
            </tr>
            <tr style="border: none">
                <td style="border: none"><label class="shop-label">ضروری</label></td>
                <td style="border: none">
                    <textarea required name="address" id="address" style="width: 200px;margin-top: 20px;"></textarea>
                </td>
                <td style="border: none"><label class="reg-label" style="margin-top: 0px">نشانی دقیق</label></td>
            </tr>
            <tr>
                <td style="border: none"><label class="shop-label">اختیاری</label></td>
                <td style="border: none"><input required type="email" name="email" id="email" style="margin-top: 20px; width: 200px"></td>
                <td style="border: none"><label class="reg-label">آدرس ایمیل</label></td>
            </tr>
            <tr>
                <td colspan="3" style="border: none; ">
                        <button type="button" class="btn btn-primary" style="margin-top: 20px; font-weight: bold">ثبت سفارش</button>
                </td>
            </tr>
        </form>
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