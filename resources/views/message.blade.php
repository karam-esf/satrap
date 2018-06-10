<!doctype html>
<html lang="en">
<heade>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/styles2.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</heade>
<body>
    @if(Session()->has('flash_message'))
        <div class="alert alert-success alert-dismissable" style="text-align: center">
            {{Session()->get('flash_message')}}
            <a href="/management">بازگشت به مدیریت</a>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        @endif
        {{--@if(Session::has('flash_message'))
            {{Session::get('flash_message')}}
            <!--<strong>Success!</strong> Indicates a successful or positive action.-->
            <!--<h3>با موفقیت ذخیره گردید </h3><br>
            <a href="/showForm"  >ثبت کالای بعدی</a><br>
            <a href="/management">بازگشت به مدیریت</a>-->
        @endif--}}
</body>
</html>