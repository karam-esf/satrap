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
                $("#formFlashmemory").attr('action','/updateFlashmemory');
                $("#mark").val("<?php  if(isset($result))echo $res->mark;?>") ;
                $("#capacity").val("<?php  if(isset($result))echo $res->capacity;?>");
                $("#explanation").val("<?php  if(isset($result))echo $res->explanation;?>") ;
                $("#speed").val("<?php  if(isset($result))echo $res->speed;?>") ;
                $("#usb").val("<?php  if(isset($result))echo $res->usb;?>") ;
                $("#price").val("<?php  if(isset($result))echo $res->price;?>") ;
                $("#stock").val("<?php  if(isset($stock))echo $store->stock;?>") ;
                $("#modell").val("<?php  if(isset($result))echo $res->modell;?>") ;
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
    <div class="panel-heading" style="text-align: center; color: #245269; font-size: 18px">ثبت فلش مموری</div>
    <div class="panel-body" style="text-align: center">
        <form action="/addFlashmemory" method="post" id="formFlashmemory">
            {!! csrf_field() !!}
            <input type="hidden" id="ID" name="id">
            <input type="hidden" id="group_id" name="group_id" value="8">
            <input type="text" name="mark" id="mark">
            <label>:مارک</label><br>
            <input type="text" name="modell" id="modell">
            <label>:مدل</label><br>
            <select name="color" class="formSel" id="color">
                <option value="-">-</option>
                <option value="سفید">سفید</option>
                <option value="مشگی">مشگی</option>
                <option value="نقره ای">نقره ای</option>
            </select>
            <label>:رنگ</label><br>
            <select name="capacity" class="formSel" id="capacity">
                <option value="4G">4G</option>
                <option value="8G">8G</option>
                <option value="16G">16G</option>
                <option value="32G">32G</option>
                <option value="64G">64G</option>
            </select>
            <label>:ظرفیت</label><br>
            <select name="usb" class="formSel" id="usb">
                <option value="USB2-USB3">USB2-USB3</option>
                <option value="USB2">USB2</option>
            </select>
            <label>:درگاه</label><br>
            <select name="speed" class="formSel" id="speed">
                <option value="640Mbps">640Mbps</option>
                <option value="480Mps">480Mps</option>
            </select>
            <label>:سرعت</label><br>
            <select name="warranty" class="formSel" id="warranty">
                <option value="یک سال">یک سال</option>
                <option value="مادام العمر">مادام العمر</option>
            </select>
            <label>:گارانتی</label><br>
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