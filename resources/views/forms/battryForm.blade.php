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
                $("#formBattry").attr('action','/updateBattry');
                $("#mobile").val("<?php  if(isset($result))echo $res->mobile;?>") ;
                $("#capacity").val("<?php  if(isset($result))echo $res->capacity;?>");
                $("#explanation").val("<?php  if(isset($result))echo $res->explanation;?>") ;
                $("#kind").val("<?php  if(isset($result))echo $res->kind;?>") ;
                $("#voltage").val("<?php  if(isset($result))echo $res->voltage;?>") ;
                $("#price").val("<?php  if(isset($result))echo $res->price;?>") ;
                $("#stock").val("<?php  if(isset($stock))echo $store->stock;?>") ;
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
    <div class="panel-heading" style="text-align: center; color: #245269; font-size: 18px">ثبت باطری</div>
    <div class="panel-body" style="text-align: center">
        <form action="/addBattry" method="post" id="formBattry">
            {!! csrf_field() !!}
            <input type="hidden" id="ID" name="id">
            <input type="hidden" id="group_id" name="group_id" value="3">
            <input type="text" name="mobile" id="mobile">
            <label>:گوشی</label><br>
            <select name="kind" class="formSel" id="kind">
                <option value="نیکل - متال هیدرات">نیکل - متال هیدرات </option>
                <option value="نیکل - کادمیوم">نیکل - کادمیوم</option>
            </select>
            <label>:نوع</label><br>
            <select name="capacity" class="formSel" id="capacity">
                <option value="3080 میلی آمپر ساعت">3080 میلی آمپر ساعت</option>
                <option value="5000 میلی آمپر ساعت">5000 میلی آمپر ساعت</option>
            </select>
            <label>:ظرفیت</label><br>
            <select name="voltage" class="formSel" id="voltage">
                <option value="3.85 ولت">3.85 ولت</option>
                <option value="5 ولت">5 ولت</option>
            </select>
            <label>:ولتاژ</label><br>
            <select name="warranty" class="formSel" id="warranty">
                <option value="یک ماه">یک ماه</option>
                <option value="سه ماه">سه ماه</option>
                <option value="شش ماه">شش ماه</option>
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