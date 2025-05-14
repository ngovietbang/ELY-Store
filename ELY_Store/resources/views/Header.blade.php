<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="customer-check-tentk-url" content="{{ route('customer.CheckTentk') }}" />
    <meta name="login-url" content="{{ route('login') }}" />
    <meta charset="UTF-8" />
    <title></title>
</head>
<body>
    <!---->
    <div class="header">
        <!--menu header-->
        <div class="menu_header">
            <a class="a_menu_header" href="{{ route('home') }}">Trang chủ</a>
            <a class="a_menu_header" href="#">Tin tức</a>
            <a class="a_menu_header" href="#">Sản phẩm</a>
            <a class="a_menu_header" href="#">Kết nối</a>
            <a class="a_menu_header" id="head-taikhoan" href="" style="display:none">Tài khoản</a>
        </div>
        <!--menu header 2-->
        <div style="width:auto;margin:auto;margin-right:3px;display:flex;">
            <div class="menu_header_2">
                <a class="a_menu_header_2" href="#">Thông báo</a>
                <a class="a_menu_header_2" href="#">Hỗ trợ</a>
                <a style="color:turquoise;font-size:20px;font-weight:bold;margin-top:-3px;margin-left:6px;margin-right:9px;display:block;">|</a>
            </div>
            <!---->
            <nav style="width:auto;margin:auto;margin-right:70px;color:white;display:flex;">
                @if(Session::get('user.hovaten'))
                <span class="menu-tentk" style="">
                    <img src="{{ Session::get('user.anh') }}" />
                    <span>{{ Session::get('user.hovaten') }}</span>
                </span>
                <form class="logout-div" action="{{ route('logout') }}" method="post">
                    @csrf
                    <p>【 </p>
                    <button class="a_menu_header_2" type="submit">Đăng Xuất</button>
                    <p> 】</p>
                </form>
                @else
                <button class="a_menu_header_2" id="bt_login"> Đăng Nhập</button>
                @endif
            </nav>
        </div>
    </div>
    <!--phần tìm kiếm-->
    <div class="header2">
        <!--logo-->
        <a class="a_logo" href="{{ route('home') }}">
            <img src="/HomeImage/icon/logo2.png" class="logo_img" />
        </a>
        <!--find-->
        <form class="find_header" method="get" action="index.php">
            <input type="hidden" name="action" value="HomeTimKiemSp" />
            <input class="search" type="text" placeholder="Tìm kiếm sản phẩm" name="keyword" value="" />
            <button class="bt-timkiem" type="submit">Tìm kiếm</button>
        </form>
        <!--giỏ hàng-->
        <div class="gio-hang">
            <a class="gio-hang-a" href="">
                <img src="/HomeImage/icon/shop.png" />
            </a>
        </div>
    </div>
    <!---->

    <!--đăng nhập-->
    <!--form login-->
    <form method="post" action="{{ route('login') }}" class="form_login" id="form_login">
        @csrf
        <!---->
        <div class="model_form_login">
            <!--nut close-->
            <span class="close">&times;</span>
            <!--logo bno store-->
            <div class="logo-dangnhap">
                <img class="" src="/HomeImage/icon/logo2.png" />
            </div>
            <!---->
            <h2>Đăng nhập</h2>
            <!--username-->
            <div class="">
                <span id="error-message"></span>
                <input class="input-dangnhap" id="tentk-dn" type="text" placeholder="Tên tài khoản/Email" name="tentk" maxlength="30" required />
            </div>
            <!--mật khẩu-->
            <div class="">
                <input class="input-dangnhap" id="matkhau-dn" type="password" placeholder="Mật khẩu" name="matkhau" required maxlength="30" />
            </div>
            <!--submit-->
            <input type="submit" name="submit" value="Đăng nhập" class="bt_submit_login" />
            <!--đăng ký, quên mật khẩu-->
            <div style="display:flex;margin:auto;width:384px;margin-top:20px;">
                <a class="quen_mat_khau" href="{{ route('auth.QuenMatKhau') }}">Quyên mật khẩu</a>
                <a id="dang-ky" class="dang_ky">Đăng ký</a>
            </div>
            <!---->
            <div class="text-phuong-thuc-dn">Phương thức đăng nhập khác</div>
            <!--cac phuong thuc dang nhap khac-->
            <div class="third-login">
                <!--google-->
                <div class="item-third-login google"></div>
                <!--apple-->
                <div class="item-third-login apple"></div>
                <!--facebook-->
                <div class="item-third-login facebook"></div>
                <!--twitter-->
                <div class="item-third-login twitter"></div>
            </div>
        </div>
    </form>

    <!--đăng ký-->
    <!--form register-->
    <form method="post" action="{{ route('customer.DangKy') }}" class="form_login form_register" id="form-register" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
        @csrf
        <!---->
        <div class="model_form_login" style="height:700px;">
            <!--nut close-->
            <span class="close close-register">&times;</span>
            <!--logo bno store-->
            <div class="logo-dangnhap">
                <img class="" src="/HomeImage/icon/logo2.png" />
            </div>
            <!---->
            <h2>Đăng Ký</h2>
            <!--div relative-->
            <div class="dk-relative">
                <!--div1 tk va mat khau-->
                <div class="dangky-div1" id="dk-1">
                    <!--username-->
                    <div class="">
                        <span id="tentk-error">*Tài khoản này đã tồn tại</span>
                        <input class="input-dangnhap" id="tentk-dk" type="text" placeholder="Tên tài khoản/Email" name="tentk" required maxlength="30"/>
                    </div>
                    <!--mật khẩu-->
                    <div class="">
                        <input class="input-dangnhap" id="dk-matkhau" type="password" placeholder="Mật khẩu" name="matkhau" required maxlength="30"/>
                    </div>
                    <!--xác nhận mật khẩu-->
                    <div class="">
                        <input class="input-dangnhap" id="dk-rematkhau" type="password" placeholder="Xác nhận mật khẩu" name="xacnhanmatkhau" required maxlength="30"/>
                        <span id="message-remk"></span>
                    </div>
                    <!--submit-->
                    <!--<input type="submit" name="submit" value="Đăng Ký" class="bt_submit_login" id="bt-dang-ky" />-->
                    <button id="bt-next-1" class="bt_submit_login bt-next-1" type="button">Đăng ký</button>
                </div>
                <!--div ho va ten, ngay sinh, gioi tinh-->
                <div class="dangky-div1" id="dk-2">
                    <!--ho va ten-->
                    <div class="">
                        <input class="input-dangnhap" type="text" placeholder="Họ và tên" name="hovaten" required maxlength="50"/>
                    </div>
                    <!--ngay sinh-->
                    <div class="">
                        <input class="input-dangnhap" type="date" placeholder="Ngày sinh" name="ngaysinh" required />
                    </div>
                    <!--gioi tinh-->
                    <div class="">
                        <select class="input-dangnhap" name="gioitinh">
                            <option value="">--Chọn giới tính--</option>
                            <option>Nam</option>
                            <option>Nữ</option>
                        </select>
                    </div>
                    <!---->
                    <div class="dk-2-bt">
                        <button id="bt-pre-2" class="bt_submit_login bt-pre bt-pre-2" type="button">Quay lại</button>
                        <button id="bt-next-2" class="bt_submit_login bt-next bt-next-2" type="button">Tiếp theo</button>
                    </div>
                </div>
                <!--dia chi, sdt, anh-->
                <div class="dangky-div1" id="dk-3">
                    <!--dia chi co ban-->
                    <div class="diachi-coban">
                        <!---->
                        <div class="diachi-coban-div1">
                            <label>Tỉnh/Thành phố:</label>
                            <select id="tinh" name="tinh" required>
                                <option value="">-- Chọn Tỉnh/TP --</option>
                            </select>
                        </div>
                        <!---->
                        <div class="diachi-coban-div1">
                            <label>Quận/Huyện:</label>
                            <select id="huyen" name="huyen" required>
                                <option value="">-- Chọn Quận/Huyện --</option>
                            </select>
                        </div>
                        <!---->
                        <div class="diachi-coban-div1">
                            <label>Xã/Phường:</label>
                            <select id="xa" name="xa" required>
                                <option value="">-- Chọn Xã/Phường --</option>
                            </select>
                        </div>
                    </div>
                    <!--dia chi-->
                    <div class="">
                        <input class="input-dangnhap" type="text" placeholder="Địa chỉ nhận hàng" name="diachi" required />
                    </div>
                    <!--sdt-->
                    <div class="">
                        <input class="input-dangnhap" type="text" placeholder="Số điện thoại" name="sdt" required id="input-dk-sdt" maxlength="11"/>
                    </div>
                    <!--anh-->
                    <div class="dk-anh-div">
                        <input type="file" class="file-anh" id="file-select-dk" name="anh" />
                        <label class="lb-anh" for="file-select-dk">Chọn ảnh</label>
                        <img class="file-pre-anh" id="pre-anh" src="" />
                    </div>
                    <!--dang ky bt-->
                    <div class="dk-2-bt">
                        <button id="bt-pre-3" class="bt_submit_login bt-pre" type="button">Quay lại</button>
                        <input id="bt-next-3" class="bt_submit_login bt-next" type="submit" value="Đăng ký" />
                    </div>
                </div>
            </div>

            <!--đã có tk -> dng nhap-->
            <div style="display:flex;margin:auto;width:384px;margin-top:20px;">
                <p class="" style="margin: auto; margin-right: 4px;">Đã có tài khoản? </p>
                <a class="dang_ky" id="bt-dang-nhap" style="margin: auto; margin-left: 4px;">Đăng Nhập</a>
            </div>
            <!---->
            <div class="text-phuong-thuc-dn">Phương thức đăng nhập khác</div>
            <!--cac phuong thuc dang nhap khac-->
            <div class="third-login">
                <!--google-->
                <div class="item-third-login google"></div>
                <!--apple-->
                <div class="item-third-login apple"></div>
                <!--facebook-->
                <div class="item-third-login facebook"></div>
                <!--twitter-->
                <div class="item-third-login twitter"></div>
            </div>
        </div>
    </form>

    <!--thong bao-->
    <div class="thongbao" id="thongbao">
        <p class="head-thongbao">Message</p>
        <p id="thongbao-text"></p>
    </div>
    <div class="model-thongbao" id="model-thongbao"></div>

    <!--banner-->
    <div class="content1">
        <div class="slides-container">
            <div class="slides-wrapper">
                <div class="slide">
                    <img src="/HomeImage/image/s1.jpg" />
                    <img src="/HomeImage/image/s2.jpg" />
                </div>
                <div class="slide">
                    <img src="/HomeImage/image/s3.jpg" />
                    <img src="/HomeImage/image/s4.jpg" />
                </div>
                <div class="slide">
                    <img src="/HomeImage/image/s5.jpg" />
                    <img src="/HomeImage/image/s6.jpg" />
                </div>
                <div class="slide">
                    <img src="/HomeImage/image/s10.jpg" />
                    <img src="/HomeImage/image/s11.jpg" />
                </div>
            </div>
        </div>
        <a class="banner-pre" onclick="moveSlide(-1)">&#10094;</a>
        <a class="banner-next" onclick="moveSlide(1)">&#10095;</a>
    </div>

    <!--len dau trang-->
    <button onclick="scrollToTop()" id="scrollTopBtn" title="Lên đầu trang">&#9650;</button>
    <!--script diachi-->
    <script src="/js/AdressVietNam/diachi.js"></script>
    <script src="/js/Home/HomeJs.js"></script>
    <script src="/js/Customer/Customer.js"></script>
</body>
</html>
