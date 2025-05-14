<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="laymk-url" content="{{ route('password.LayMatKhau') }}" />
    <title>ELY Store</title>
    <link rel="stylesheet" href="/css/Home/Auth.css?v={{ time() }}" />
    <link rel="stylesheet" href="/css/Home/Home.css?v={{ time() }}" />
    <link rel="icon" href="/HomeImage/image/logo.png" />
</head>
<body>
    <!--header-->
    <div class="header-quenmk">
        <a href="{{ route('home') }}">
            <img class="header-quenmk-img" src="/HomeImage/icon/logo2.png" />
        </a>
        <h1>Đặt lại mật khẩu</h1>
        <p>Bạn cần giúp đỡ?</p>
    </div>

    <!--content-->
    <div class="content-quenmk">
        <form class="form-quenmk" action="{{ route('password.LayMatKhau') }}" method="post" id="form-quenmk">
            @csrf
            <!---->
            <div class="form-quenmk-div0">
                <a href="{{ route('home') }}">
                    <img src="/HomeImage/icon/leftarrow.png" />
                </a>
                <h1>Đặt lại mật khẩu</h1>
                <p></p>
            </div>
            <!---->
            <div class="quenmk-div1">
                <input id="tentk-quenmk" type="text" name="tentk" placeholder="Nhập tên tài khoản" maxlength="30" required />
                <p></p>
                <input id="email-quenmk" type="text" name="email" placeholder="Email đăng ký tài khoản" required />
            </div>
            <!---->
            <button type="submit" id="bt-laymk">Lấy mật khẩu</button>
        </form>
    </div>
    <!--thong bao-->
    <div class="quenmk-overlay"></div>
    <div class="quenmk-thongbao">
        <img src="/HomeImage/icon/loading.gif" />
        <p>Đang xử lý, vui lòng chờ...</p>
    </div>

    <!--footer-->
    @include('Footer')

    <!--js-->
    <script src="/js/Auth/Auth.js"></script>
</body>
</html>
