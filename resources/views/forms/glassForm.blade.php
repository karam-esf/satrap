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
           {//alert(id);
               $("#update").prop('disabled',false);
               $("#save").prop('disabled',true);
               $("#formGlass").attr('action','/updateGlass');
               $("#mark").val("<?php  if(isset($result))echo $res->mark;?>") ;
               $("#material").val("<?php  if(isset($result))echo $res->material;?>");
               $("#explanation").val("<?php  if(isset($result))echo $res->explanation;?>") ;
               $("#color").val("<?php  if(isset($result))echo $res->color;?>") ;
               $("#kind").val("<?php  if(isset($result))echo $res->kind;?>") ;
               $("#mobile").val("<?php  if(isset($result))echo $res->mobile;?>") ;
               $("#price").val("<?php  if(isset($result))echo $res->price;?>") ;
               $("#stock").val("<?php  if(isset($stock))echo $store->stock;?>") ;
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
    {!! Session::forget('error_message') !!}
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center; color: #245269; font-size: 18px">ثبت گلس</div>
        <div class="panel-body" style="text-align: center">
            <form action="/addGlass" method="post" id="formGlass">
                {!! csrf_field() !!}
                <input type="hidden" id="ID" name="id">
                <input type="hidden" id="group_id" name="group_id" value="9">
                <input type="text" name="mark" id="mark" >
                <label>:مارک</label><br>
                <input type="text" name="material" id="material" style="margin-top: 5px;width: 150px">
                <label>:جنس</label><br>
                <select name="color" id="color" class="formSel">
                    <option value="بدون رنگ">بدون رنگ</option>
                    <option value="سفید">سفید</option>
                    <option value="مشگی">مشگی</option>
                    <option value="قرمز">قرمز</option>
                    <option value="طلایی">طلایی</option>
                </select>
                <label>:رنگ</label><br>
                <select name="kind" id="kind" class="formSel" >
                    <option value="معمولی">معمولی</option>
                    <option value="تمام صفحه">تمام صفحه</option>
                </select>
                <label>:اندازه</label><br>
                <select name="mobile" id="mobile" class="formSel">
                    <option value="سامسونگ j1">سامسونگ j1</option>
                    <option value="سامسونگ j1 Ace">سامسونگ j1 Ace</option>
                    <option value="سامسونگ j1 2016">سامسونگ j1 2016</option>
                    <option value="سامسونگ j2">سامسونگ j2</option>
                    <option value="سامسونگ j3">سامسونگ j3</option>
                    <option value="سامسونگ j500">سامسونگ j500</option>
                </select>
                <label>:گوشی</label><br>
                <input type="text" name="price" id="price" style="margin-top: 5px"
                       oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                <label>:قیمت</label><br>
                <input type="text" name="stock" id="stock" style="margin-top: 5px"
                       oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                <label>:موجودی</label><br>
                <input type="file" name="image" id="file" multiple style="border: 1px solid; margin: auto;"><br>
                <img src="" id="img"  ><br>
                <textarea cols="50" rows="4" name="explanation" id="explanation"></textarea><br>
                <input type="submit" value="ثبت تغییرات" id="update" disabled>
                <input type="submit"  value="ذخیره" id="save">
            </form>
        </div>
    </div>
</body>
</html>