<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>ELY Store</title>
    <link rel="icon" href="{{ asset('HomeImage/image/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/Home/Home.css') }}?v={{ time() }}" />
</head>
<body>
    <!--khung-->
    <div class="khung">
        <!--header-->
        @include('Header')

        <!--content-->


        <!--footer-->
        @include('Footer')
    </div>
    <!--js-->
    
</body>
</html>
