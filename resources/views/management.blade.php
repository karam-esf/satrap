<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles2.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title></title>
</head>
<body>
    <script>
        $(document).ready(function(){
            $.ajaxSetup(
                {
                    headers:
                        {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                });
            $("#ajax").click(function(){
                var parametr = $('#parametr').val();
                var searchText = $('#searchText').val();
                var stuff = $('#stuff').val();
                $.ajax({
                    type: "POST",
                    url: '/FindBy',
                    data:{stuff:stuff,parametr:parametr,searchText:searchText},
                    success: function( result ) {
                        var data = Ext.util.JSON.decode(respons.responseText);
                        alert(data.GetAllResult[0].id);
                        var arr=JSON.stringify(result);
                        var pr = JSON.parse(arr);
                        alert(typeof result);
                        $("#sf").html(JSON.stringify(result));
                    }
                });
            });
        });
    </script>

    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center; font-size: 24px; color: #31708f; font-family:  'BNazanin'">پنل مدیریت</div>
        <div class="panel-body" style="padding: 0px">
            <div id="managAddDiv" >
                <h4 id="manag-h4" >ثبت کالای جدید</h4>
                <form action="/showForm" method="post" style="text-align: center">
                    {!! csrf_field() !!}
                    <select name="stuff" id="stuff">
                        <option value="guards" >محافظ</option>
                        <option value="glasses">گلس</option>
                        <option value="chargers">شارژر</option>
                        <option value="cables">کابل شارژ</option>
                        <option value="adaptors">آداپپتور</option>
                        <option value="carchargers" >شارژر فندکی</option>
                        <option value="battries" >باطری</option>
                        <option value="holders" >هلدر</option>
                        <option value="speakers" >اسپیکر</option>
                        <option value="auxcables" >کابل aux</option>
                        <option value="mp3players" >MP3 PLAYER</option>
                        <option value="carmp3s" >MP3 PLAYER فندکی</option>
                        <option value="handsfrees" >هندزفری</option>
                        <option value="headphones" >هدفون</option>
                        <option value="memories" >مموری</option>
                        <option value="flashmemories" >فلش</option>
                    </select>
                    <br>
                    <button type="submit" id="manag-butt" style="">نمایش فرم</button>
                </form>
            </div>

            <div id="mngSearchDiv">
                <h4 id="manag-h4" >جستجوی کالا</h4>
                <form action="/FindBy" method="post" style="text-align: center; ">
                    {!! csrf_field() !!}
                    <input type="text" name="searchText" id="searchText">
                    <select name="parametr" id="parametr" >
                        <option value="id">:کد کالا</option>
                        <option value="mark">:نام کالا</option>
                    </select>
                    <label>جستجو بر اساس</label><br>
                    <select name="stuff" id="stuff" style="margin-top: 5px; margin-left:20px">
                        <option value="guards">محافظ</option>
                        <option value="glasses">گلس</option>
                        <option value="chargers">شارژر</option>
                        <option value="cables">کابل شارژ</option>
                        <option value="adaptors">آداپپتور</option>
                        <option value="carchargers" >شارژر فندکی</option>
                        <option value="battries" >باطری</option>
                        <option value="holders" >هلدر</option>
                        <option value="speakers" >اسپیکر</option>
                        <option value="auxcables" >کابل aux</option>
                        <option value="mp3players" >MP3 PLAYER</option>
                        <option value="carmp3s" >MP3 PLAYER فندکی</option>
                        <option value="handsfrees" >هندزفری</option>
                        <option value="headphones" >هدفون</option>
                        <option value="memories">مموری</option>
                        <option value="flashmemories" >فلش</option>
                    </select>
                    <label style="float: right; margin-top: 5px">گروه کالا</label>
                    <br>
                    <button type="submit" id="manag-butt"  >نمایش کالا</button>
                    <button id="ajax" style="margin-top: 10px;">ajax</button>
                </form>
            </div>

            <div id="mngSearchDiv">
                <h4 id="manag-h4" >نمایش کالا</h4>
                <form action="/Find" method="post" style="text-align: center">
                    {!! csrf_field() !!}
                    <select name="stuff" id="stuff" style="margin-top: 10px">
                        <option value="guards">محافظ</option>
                        <option value="glasses">گلس</option>
                        <option value="chargers">شارژر</option>
                        <option value="cables">کابل شارژ</option>
                        <option value="adaptors">آداپپتور</option>
                        <option value="carchargers">شارژر فندکی</option>
                        <option value="battries" >باطری</option>
                        <option value="holders" >هلدر</option>
                        <option value="speakers" >اسپیکر</option>
                        <option value="auxcables" >کابل aux</option>
                        <option value="mp3players" >MP3 PLAYER</option>
                        <option value="carmp3s" >MP3 PLAYER فندکی</option>
                        <option value="handsfrees" >هندزفری</option>
                        <option value="headphones" >هدفون</option>
                        <option value="memories">مموری</option>
                        <option value="flashmemories">فلش</option>
                    </select>
                    <label>انتخاب کالا</label>
                    <br>
                    <button type="submit" id="manag-butt"  >نمایش کالا</button>
                </form>
            </div>
        </div>
    </div>
    <div id="sf"></div>
</body>
</html>
