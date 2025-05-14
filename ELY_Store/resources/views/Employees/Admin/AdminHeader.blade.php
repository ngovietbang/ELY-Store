<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <!--header-->
    <div class="header">
        <!--logo-->
        <div class="header-div1">
            <a class="header-div1-a" href="{{ route('employee.HomeAdmin') }}">
                <img src="/HomeImage/image/logo.png" />
            </a>
        </div>
        <!---->
        <div class="header-div2">
            <!--thong bao va message-->
            <div class="header-div3">
                <!--thong bao-->
                <div class="thongbao">
                    <img src="/HomeImage/icon/notifi.png" />
                </div>
                <!--tin nhan-->
                <div class="tinnhan">
                    <img src="/HomeImage/icon/mail.png" />
                </div>
            </div>
            <!--profile-->
            <div class="header-div4">
                <!--anh va ten-->
                <div class="header-div5">
                    <img class="header-div5-img1" src="/{{ Session::get('user.anh') }}" />
                    <p>{{ Session::get('user.hovaten') }}</p>
                    <img class="header-div5-img2" src="/HomeImage/icon/arrow.png" />
                </div>
                <!--menu profile-->
                <div class="header-div6">
                    <!---->
                    <div class="header-div7">
                        <button type="button"> <img src="/HomeImage/icon/setting2.png" /> Setting</button>
                    </div>
                    <!---->
                    <div class="header-div7">
                        <button type="button"> <img src="/HomeImage/icon/user3.png" /> Profile</button>
                    </div>
                    <!---->
                    <form class="header-div7" id="form-logout" method="post" action="{{ route('logout') }}"  onsubmit="return confirm('Xác nhận đăng xuất?')">
                        @csrf
                        <button type="submit">
                            <img src="/HomeImage/icon/logout.png" />
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--scroll to top-->
    <button id="bt-top" onclick="Top()" title="Lên đầu trang">
        <img src="/HomeImage/icon/arrow.png" />
    </button>

</body>
</html>
