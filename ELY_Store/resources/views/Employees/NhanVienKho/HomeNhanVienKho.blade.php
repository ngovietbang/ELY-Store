<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/HomeImage/image/logo.png" />
    <link rel="stylesheet" href="/css/Employee/Admin/HomeAdmin.css?v={{ time() }}" />
    <title>ELY Store Admin</title>

</head>
<body>
    <!--header-->
    @include('Employees.Admin.AdminHeader')

    <!--content-->
    <div class="content">
        <!--menu trai-->
        <div class="content-div1">
            <!--home-->
            <div class="menu menu-home">
                <a class="menu-bt-main" href="{{ route('employee.HomeAdmin') }}">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/home.png"/>
                    <span>Home</span>
                </a>
            </div>
            <!---->
            <div class="menu">
                <!---->
                <a class="menu-bt-main" href="{{ route('employee.AdminQuanLyNguoiDung') }}">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/user2.png"/>
                    <span>Quản lý người dùng</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/loaisp.png"/>
                    <span>Quản lý loại sản phẩm</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/tag.png"/>
                    <span>Quản lý thể loại</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/sanpham.png"/>
                    <span>Quản lý sản phẩm</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/s.png"/>
                    <span>Quản lý bán hàng</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
            </div>
            <!--setting-->
            <div class="menu menu-setting">
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/setting.png"/>
                    <span>Setting</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
            </div>
        </div>
        <!---->
        <div class="content-div2">

        </div>
    </div>

    <!--script-->
    <script src="/js/Employee/Admin/Admin.js"></script>
</body>
</html>
