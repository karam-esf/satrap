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
    </head>
    <body>
        @foreach($result as $res)
            <table>
                <tr>
                    <td>{{$res->id}} </td>
                    <td>{{$res->id}} </td>
                    <td>{{$res->id}} </td>
                    <td>{{$res->id}} </td>
                    <td>{{$res->id}} </td>
                    <td>{{$res->id}} </td>
                    <td>{{$res->id}} </td>
                </tr>
            </table>
        @endforeach
    </body>
</html>