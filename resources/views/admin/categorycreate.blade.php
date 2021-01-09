<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!--http://127.0.0.1:8000/admin/category/api/categories-->
    <form action="/api/categories" enctype="multipart/form-data" method="POST">
        {!! csrf_field() !!}

        <label for="category_name"></label>
        <input name="category_name" type="text">

        @if ($errors->has('category_name'))
            <span><strong>{{ $errors->first('category_name') }}</strong></span>
        @endif

        <button>Create category</button>
    </form>
</body>
</html>