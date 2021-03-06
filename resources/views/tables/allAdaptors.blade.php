<!doctype html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/styles2.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var x = document.getElementById("allTable").querySelectorAll("#stock");
            var i =0;
            @foreach($stock as $store){
                stock = {{$store->stock}};
                $(x[i]).val(stock);
                ++i;
            }
            @endforeach
            $("tr").mousemove(function () {
                $(this).css("background-color", "yellow");
                CLASS = $(this).find("td").first().children().val();
                form =  $(this).find("form");
                $(form).attr('class',CLASS);
            });
            $("tr").mouseleave(function(){
                $(this).css("background-color", "white");
            });
        });
            function delet()
            {
                $(form).attr('action','delete');
                $(form).submit();
            }
    </script>
</head>
<body>
<table id="allTable">
    <th colspan="12" id="all-th">آداپتور</th>
    <tr>
        <td style="font-weight: bold">آیدی</td>
        <td style="font-weight: bold">نام کالا</td>
        <td style="font-weight: bold">رنگ</td>
        <td style="font-weight: bold">ولتاژ ورودی</td>
        <td style="font-weight: bold">آمپر</td>
        <td style="font-weight: bold">گارانتی</td>
        <td style="font-weight: bold">مدل گوشی</td>
        <td style="font-weight: bold">قیمت</td>
        <td style="font-weight: bold">موجودی</td>
        <td style="font-weight: bold">توضیحات</td>
        <td style="font-weight: bold">تصویر</td>
        <td style="font-weight: bold">عملیات</td>
    </tr>
    @foreach($result as $res)
        <tr>
            <form action="select" method="post" id="adaptors" >
                {!! csrf_field() !!}
                <input type="hidden" name="table" id="table" value="adaptors">
                <input type="hidden" id="group_id" name="group_id" value="1">
                <td><input style="width: 50px" type="text" id="id" name="id" readonly  value="{{$res->id}}"></td>
                <td><input type="text" name="mark" readonly value="{{$res->mark}}"></td>
                <td><input style="width: 50px" type="text" name="color" readonly value="{{$res->color}}"></td>
                <td><input style="width: 50px" type="text" name="inputVoltage" readonly value="{{$res->inputVoltage}}"></td>
                <td><input style="width: 50px" type="text" name="ampere" readonly value="{{$res->ampere}}"></td>
                <td><input type="text" name="warranty" readonly value="{{$res->warranty}}"></td>
                <td><input type="text" name="mobile" readonly value="{{$res->mobile}}"></td>
                <td><input type="text" name="price" readonly value="{{$res->price}}"></td>
                <td><input type="text" name="stock"  value="" id="stock"></td>
                <td><textarea name="explanation" readonly >{{$res->explanation}}</textarea></td>
                <td><img name="image" style="width: 100px;height: 70px" src="/images/{{$res->image}}"></td>
                <td><br><button type="submit"> ویرایش</button><br>
                    <br><button class="delet" type="button" onclick="delet()">حذف</button>
                </td>
            </form>
        </tr>
    @endforeach
</table>
</body>
</html>