<!doctype html>
<html lang="en">
<header>
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
</header>
<body>
<table id="allTable">
    <th colspan="12" id="all-th">MP3 PLAYER</th>
    <tr>
        <td style="font-weight: bold">آیدی</td>
        <td style="font-weight: bold">نام کالا</td>
        <td style="font-weight: bold">مدل</td>
        <td style="font-weight: bold">رنگ</td>
        <td style="font-weight: bold">قابلیت ها</td>
        <td style="font-weight: bold">مدت زمان کارکرد</td>
        <td style="font-weight: bold">ظرفیت باطری</td>
        <td style="font-weight: bold">گارانتی</td>
        <td style="font-weight: bold">قیمت</td>
        <td style="font-weight: bold">موجودی</td>
        <td style="font-weight: bold">توضیحات</td>
        <td style="font-weight: bold">تصویر</td>
        <td style="font-weight: bold">عملیات</td>
    </tr>
    @foreach($result as $res)
        <tr>
            <form action="select" method="post"  id="mp3players">
                {!! csrf_field() !!}
                <input type="hidden" name="table" value="mp3players">
                <input type="hidden" id="group_id" name="group_id" value="15">
                <td><input type="text" style="width: 50px" name="id" id="id" readonly  value="{{$res->id}}"></td>
                <td id="tdd"><input type="text" name="mark" readonly value="{{$res->mark}}"></td>
                <td><input type="text" name="modell" readonly value="{{$res->modell}}"></td>
                <td><input type="text" style="width: 80px" name="color" readonly value="{{$res->color}}"></td>
                <td><textarea name="facilities" readonly >{{($res->facilities)}}</textarea></td>
                <td><input type="text" style="width: 100px" name="timeWork" readonly value="{{$res->timeWork}}"></td>
                <td><input type="text" style="width: 100px" name="capacity" readonly value="{{$res->capacity}}"></td>
                <td><input type="text" style="width: 80px" name="warranty" readonly value="{{$res->warranty}}"></td>
                <td><input type="text" style="width: 100px" name="price" readonly value="{{$res->price}}"></td>
                <td><input type="text" style="width: 50px;" name="stock"  value="" id="stock"></td>
                <td><textarea name="explanation" readonly >{{$res->explanation}}</textarea></td>
                <td><img name="image" style="width: 100px;height: 70px" src="/images/{{$res->image}}"></td>
                <td><button type="submit"> ویرایش</button>
                    <br><button type="button"   onclick="delet()">حذف</button>
                </td>
            </form>
        </tr>
    @endforeach
</table>
</body>
</html>