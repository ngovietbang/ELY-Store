<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/home.png" />
                    <span>Home</span>
                </a>
            </div>
            <!---->
            <div class="menu">
                <!---->
                <a class="menu-bt-main" href="{{ route('employee.AdminQuanLyNguoiDung') }}">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/user2.png" />
                    <span>Quản lý người dùng</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
                <!--action****************************************************-->
                <div class="main-action">
                    <p>Action:</p>
                    <button id="bt-form-themuser" class="main-action-bt" type="button" disabled style="cursor:not-allowed;color:#808080">Thêm người dùng</button>
                </div>

                <!---->
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/loaisp.png" />
                    <span>Quản lý loại sản phẩm</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/tag.png" />
                    <span>Quản lý thể loại</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/sanpham.png" />
                    <span>Quản lý sản phẩm</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/s.png" />
                    <span>Quản lý bán hàng</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
            </div>
            <!--setting-->
            <div class="menu menu-setting">
                <a class="menu-bt-main" href="">
                    <img class="menu-bt-main-img1" src="/HomeImage/icon/setting.png" />
                    <span>Setting</span>
                    <img class="menu-bt-main-img2" src="/HomeImage/icon/arrow.png" />
                </a>
            </div>
        </div>
        <!--hien thi user***********************************************-->
        <div class="content-div2">
            <!--phan lua chon quan ly-->
            <div class="content-div2-select">
                <img class="content-div2-select-img1" src="/HomeImage/icon/home2.png" />
                <select class="content-div2-select-div1">
                    <!--quan ly khach hang-->
                    <option value="{{ route('employee.AdminQuanLyNguoiDung.Customer') }}">Quản lý khách hàng</option>
                    <!--quan ly nhan su-->
                    <option value="{{ route('employee.AdminQuanLyNguoiDung') }}">Quản lý nhân sự</option>
                </select>
            </div>

            <!--phan hien thi-->
            <div class="content-div3">
                <h1 style="background-color:#1494d3">Thông tin khách hàng</h1>
                <!--tim kiem-->
                <form class="content-div3-timkiem" action="{{ route('employee.FindCustomer') }}" method="get" style="margin-right:60px">
                    <input type="text" placeholder="Tìm kiếm người dùng" name="keyword" value="{{ request('keyword') }}" />
                    <button type="submit">
                        <img src="/HomeImage/icon/timkiem.png" />
                    </button>
                </form>
                <!--thong tin nhan su-->
                <table class="table-nhansu">
                    <tr class="table-nhansu-tr1">
                        <th style="width:40px;"></th>
                        <th style="width:60px;">ID</th>
                        <th>Tên tài khoản</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                    </tr>
                    <!---->
                    @foreach($user as $row)
                    <tr class="table-nhansu-tr2">
                        <td>
                            <img src="{{ asset($row['anh']) }}" />
                        </td>
                        <td>{{ $row['customerid'] }}</td>
                        <td title="{{$row['tentk']}}">{{ $row['tentk'] }}</td>
                        <td title="{{ $row['hovaten'] }}">{{ $row['hovaten'] }}</td>
                        <td title="{{ $row['ngaysinh'] }}">{{ $row['ngaysinh'] }}</td>
                        <td title="{{ $row['gioitinh'] }}">{{ $row['gioitinh'] }}</td>
                        <td title="{{ $row['diachi'] }}">{{ $row['diachi'] }}</td>
                        <td title="{{ $row['email'] }}">{{ $row['email'] }}</td>
                        <td title="{{ $row['sdt'] }}">{{ $row['sdt'] }}</td>
                    </tr>
                    @endforeach
                </table>

                <!--phân trang-->
                <div class="phantrang">
                    <button type="button" class="bt-phantrang-pre">
                        <img src="/HomeImage/icon/arrow.png"/>
                    </button>
                    <div class="phantrang-div1"></div>
                    <button type="button" class="bt-phantrang-next">
                        <img src="/HomeImage/icon/arrow.png"/>
                    </button>
                </div>
            </div>

            <!--end-->
            <div class="content-end"></div>
        </div>
    </div>


    <!--script-->
    <script src="/js/Employee/Admin/Admin.js"></script>
    <!--main js-->
    <script src="/js/Employee/Admin/AdminQuanLyNguoiDung.js"> </script>
</body>
</html>
