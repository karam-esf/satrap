<!doctype html>
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
    <title></title>
    <script>
        $(document).ready(function () {
            <?php
                if(isset($result)){
                    foreach ($result as $res);
                }            //$img=$res->img;
                if(isset($stock))
                    foreach ($stock as $store);
            ?>
            $("#ID").val("<?php  if(isset($result))echo $res->id;?>") ;
            var id=document.getElementById("ID").value;
            if(id!=='')
            { //alert(id);
                $("#update").prop('disabled',false);
                $("#save").prop('disabled',true);
                $("#formCharger").attr('action','/updateCharger');
                $("#mark").val("<?php  if(isset($result))echo $res->mark;?>") ;
                $("#lenght").val("<?php  if(isset($result))echo $res->lenght;?>");
                $("#explanation").val("<?php  if(isset($result))echo $res->explanation;?>") ;
                $("#color").val("<?php  if(isset($result))echo $res->color;?>") ;
                $("#mobile").val("<?php  if(isset($result))echo $res->mobile;?>") ;
                $("#price").val("<?php  if(isset($result))echo $res->price;?>") ;
                $("#stock").val("<?php  if(isset($stock))echo $store->stock;?>") ;
                $("#ampere").val("<?php  if(isset($result))echo $res->ampere;?>") ;
                $("#inputVoltage").val("<?php  if(isset($result))echo $res->inputVoltage;?>") ;
                $("#warranty").val("<?php  if(isset($result))echo $res->warranty;?>") ;
                $("#img").attr('src','/images/<?php  if(isset($result)) echo $res->image;?>');

            }
            else $("#update").prop('disabled',true);
            $("#file").change(function (){
                var fp = $("#file");
                var items = fp[0].files;
                var name = items[0].name
                var src="/images/"+name;
                $src=$("#file").val();
                $('#img').attr('src',src);
            });
        });
    </script>
</head>

<body>
@if(Session()->has('message'))
    <div class="alert alert-success alert-dismissable" style="text-align: center">
        {{Session()->get('message')}}
        <br>
        <a href="/management">بازگشت به مدیریت</a>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center; color: #245269; font-size: 18px">ثبت شارژر</div>
    <div class="panel-body" style="text-align: center">
        <form action="/addCharger" method="post" id="formCharger">
            {!! csrf_field() !!}
            <input type="hidden" id="ID" name="id">
            <input type="hidden" id="group_id" name="group_id" value="7">
            <input type="text" name="mark" id="mark">
            <label>:مارک</label><br>
            <select name="color" class="formSel" id="color">
                <option value="سفید">سفید</option>
                <option value="مشگی">مشگی</option>
            </select>
            <label>:رنگ</label><br>
            <select name="lenght" class="formSel" id="lenght">
                <option value="نامشخص">نامشخص</option>
                <option value="یک متر">یک متر</option>
                <option value="دومتر">دو متر</option>
            </select>
            <label>:اندازه سیم</label><br>
            <select name="inputVoltage" class="formSel" id="inputVoltage">
                <option value="5">5</option>
                <option value="9">9</option>
                <option value="5,9">5,9</option>
            </select>
            <label>ولتاژ ورودی</label><br>
            <select name="warranty" class="formSel" id="warranty">
                <option value="یک هفته">یک هفته</option>
                <option value="یک ماه">یک ماه</option>
                <option value="سه ماه">سه ماه</option>
                <option value="شش ماه">شش ماه</option>
                <option value="یک سال">یک سال</option>
            </select>
            <label>:گارانتی</label><br>
            <select name="ampere" class="formSel" id="ampere">
                <option value="1">1</option>
                <option value="1.5">1.5</option>
                <option value="2">2</option>
            </select>
            <label>:آمپر</label><br>
            <select name="mobile" class="formSel" id="mobile">
                <option value="سامسونگ j1">سامسونگ j1</option>
                <option value="سامسونگ j1 Ace">سامسونگ j1 Ace</option>
                <option value="سامسونگ j1 2016">سامسونگ j1 2016</option>
                <option value="سامسونگ j2">سامسونگ j2</option>
                <option value="سامسونگ j3">سامسونگ j3</option>
                <option value="سامسونگ j500">سامسونگ j500</option>
            </select>
            <label>:گوشی</label><br>
            <input type="text" id="price" name="price" style="margin-top: 5px"
                   oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
            <label>:قیمت</label><br>
            <input type="text" name="stock" id="stock" style="margin-top: 5px"
                   oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
            <label>:موجودی</label><br>
            <input type="file" name="image" id="file" multiple style="border: 1px solid; margin: auto"><br>
            <img src="" id="img" ><br>
            <textarea cols="50" id="explanation" rows="4" name="explanation" ></textarea><br>
            <input type="submit" value="ثبت تغییرات" id="update" disabled style="margin-top: 5px">
            <input type="submit"  value="ذخیره" id="save" style="margin-top: 5px">
        </form>
    </div>
</div>
</body>
</html>