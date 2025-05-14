<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="check-email-url" content="{{ route('employee.CheckEmail') }}" />
    <meta name="check-tentk-url" content="{{ route('employee.CheckTentk') }}" />
    <meta name="sua-user-url" content="{{ route('employee.SuaUser') }}" />
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
                    <button id="bt-form-themuser" class="main-action-bt" type="button">Thêm người dùng</button>
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
                    <!--quan ly nhan su-->
                    <option value="{{ route('employee.AdminQuanLyNguoiDung') }}">Quản lý nhân sự</option>
                    <!--quan ly khach hang-->
                    <option value="{{ route('employee.AdminQuanLyNguoiDung.Customer') }}">Quản lý khách hàng</option>
                </select>
            </div>

            <!--phan hien thi-->
            <div class="content-div3">
                <h1>Thông tin nhân sự</h1>
                <!--tim kiem-->
                <form class="content-div3-timkiem" action="{{ route('employee.FindUser') }}" method="get">
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
                        <th>CMT/CCCD</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>
                        <th style="width:140px;">Action</th>
                    </tr>
                    <!---->
                    @foreach($user as $row)
                    <tr class="table-nhansu-tr2" id="user-row-{{$row['userid']}}">
                        <td>
                            <img class="user-anh" src="{{ asset($row['anh']) }}" />
                        </td>
                        <td>{{ $row['userid'] }}</td>
                        <td title="{{$row['tentk']}}">{{ $row['tentk'] }}</td>
                        <td class="user-hovaten" title="{{ $row['hovaten'] }}">{{ $row['hovaten'] }}</td>
                        <td class="user-ngaysinh" title="{{ $row['ngaysinh'] }}">{{ $row['ngaysinh'] }}</td>
                        <td class="user-gioitinh" title="{{ $row['gioitinh'] }}">{{ $row['gioitinh'] }}</td>
                        <td class="user-diachi" title="{{ $row['diachi'] }}">{{ $row['diachi'] }}</td>
                        <td class="user-cccd" title="{{ $row['cccd'] }}">{{ $row['cccd'] }}</td>
                        <td class="user-email" title="{{ $row['email'] }}">{{ $row['email'] }}</td>
                        <td class="user-sdt" title="{{ $row['sdt'] }}">{{ $row['sdt'] }}</td>
                        <td title="{{ $row['roles'] }}">{{ $row['roles'] }}</td>
                        <!--action-->
                        <td>
                            <div class="table-nhansu-tr2-td">
                                <!--sửa-->
                                <form class="form-bt-mo-form-sua" data-getuserid="{{$row['userid']}}" method="post" action="{{ route('employee.getEmployeeById', $row['userid'])}}" style="margin:auto">
                                    @csrf
                                    <button class="bt-mo-form-sua" type="submit">Sửa</button>
                                </form>
                                <!--xóa-->
                                <form data-userid="{{$row['userid']}}" class="table-nhansu-tr2-td-xoa" action="{{ route('employee.DeleteUser', $row['userid']) }}" method="post">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa người dùng này?')">Xóa</button>
                                </form>
                            </div>
                        </td>
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


    <!---->
    <div class="overlay" id="overlay"></div>
    <!--action: them nguoi dung******************************************************-->
    <form id="form-them-user" class="action-them-div1" method="post" action="{{ route('employee.ThemUser') }}" enctype="multipart/form-data">
        @csrf
        <!--bt dong-->
        <button id="bt-close-themuser" class="bt-close-themuser" type="button">&#10005;</button>
        <!--overlay-->
        <!---->
        <h1>Thêm người dùng mới</h1>
        <!---->
        <div class="action-them-div2">
            <!--1-->
            <div class="action-them-div3">
                <!--roles-->
                <div class="action-them-div4">
                    <p>Vai trò</p>
                    <select class="action-them-div4-input" name="roles" required>
                        <option value="">-- Chọn vai trò --</option>
                        <option>Admin</option>
                        <option>Shipper</option>
                        <option>Kế toán</option>
                        <option>Nhân viên kho</option>
                    </select>
                </div>
                <!--tentk-->
                <div class="action-them-div4">
                    <p>Tên tài khoản</p>
                    <input class="action-them-div4-input" id="tentk" type="text" name="tentk" placeholder="Nhập tên tài khoản" required maxlength="30" />
                    <div id="tentk-error" class="invalid-feedback" style="display: none;">*Tài khoản này đã tồn tại.</div>
                </div>
                <!--mk-->
                <div class="action-them-div4">
                    <p>Mật khẩu</p>
                    <input class="action-them-div4-input" type="password" name="matkhau" placeholder="Nhập mật khẩu" required maxlength="30" />
                </div>
                <!--hovaten-->
                <div class="action-them-div4">
                    <p>Họ và tên</p>
                    <input class="action-them-div4-input" type="text" name="hovaten" placeholder="Nhập họ và tên" required maxlength="50" />
                </div>
                <!--ngaysinh-->
                <div class="action-them-div4">
                    <p>Ngày sinh</p>
                    <input class="action-them-div4-input" type="date" name="ngaysinh" placeholder="Nhập họ và tên" required />
                </div>
                <!--Gioi tinh-->
                <div class="action-them-div4">
                    <p>Giới tính</p>
                    <select class="action-them-div4-input" name="gioitinh">
                        <option value="">-- Chọn giới tính --</option>
                        <option>Nam</option>
                        <option>Nữ</option>
                    </select>
                </div>
            </div>
            <!--2-->
            <div class="action-them-div3">
                <!--diachi-->
                <div class="action-them-div4">
                    <p>Địa chỉ</p>
                    <input class="action-them-div4-input" type="text" name="diachi" placeholder="Nhập địa chỉ" required />
                </div>
                <!--cccd-->
                <div class="action-them-div4">
                    <p>CCCD/Chứng minh thư</p>
                    <input class="action-them-div4-input" type="text" name="cccd" placeholder="Căn cước công dân/Chứng minh thư" required maxlength="20" id="admin-input-them-cccd" />
                </div>
                <!--email-->
                <div class="action-them-div4">
                    <p>Email</p>
                    <input class="action-them-div4-input" id="email" type="text" name="email" placeholder="example@gmail.com" />
                    <div id="email-error" class="invalid-feedback" style="display: none;">Email này đã tồn tại.</div>
                </div>
                <!--sdt-->
                <div class="action-them-div4">
                    <p>Số điện thoại</p>
                    <input class="action-them-div4-input" type="text" name="sdt" placeholder="Nhập số điện thoại" required maxlength="11" id="admin-input-them-sdt" />
                </div>
                <!--anh-->
                <div class="action-them-div4">
                    <p>Avatar</p>
                    <input id="them-anh" name="anh" type="file" />
                    <img id="preview-anh" class="preview-anh" />
                    <label class="label-pre" for="them-anh">Chọn ảnh</label>

                </div>
            </div>
        </div>
        <!---->
        <button class="bt-action" type="submit" name="submitThem" id="bt-them-user">Thêm người dùng</button>
    </form>


    <!--action: sua thong tin nguoi dung******************************************************-->
    <form id="form-sua-user" class="action-them-div1" method="post" action="{{ route('employee.SuaUser') }}" enctype="multipart/form-data">
        @csrf
        <!--bt dong-->
        <button id="bt-close-suauser" class="bt-close-themuser bt-close-suauser" type="button">&#10005;</button>
        <!---->
        <h1>Chỉnh sửa thông tin người dùng</h1>
        <!---->
        <div class="action-them-div2">
            <!--1-->
            <div class="action-them-div3">
                <!--id-->
                <input type="hidden" class="sua-userid" name="userid" />
                <!--roles-->
                <div class="action-them-div4">
                    <p>Vai trò</p>
                    <input class="action-them-div4-input" id="sua-roles" type="text" readonly style="color:red;font-weight:bold" value="" />
                </div>
                <!--tentk-->
                <div class="action-them-div4">
                    <p>Tên tài khoản</p>
                    <input class="action-them-div4-input" id="sua-tentk" type="text" readonly  style="color:red;font-weight:bold" value=""/>
                </div>
                <!--mk-->
                <div class="action-them-div4">
                    <p>Mật khẩu</p>
                    <input class="action-them-div4-input" id="sua-matkhau" type="password" name="matkhau" placeholder="Để trống nếu không muốn đổi mật khẩu" maxlength="30" />
                </div>
                <!--hovaten-->
                <div class="action-them-div4">
                    <p>Họ và tên</p>
                    <input class="action-them-div4-input" id="sua-hovaten" type="text" name="hovaten" placeholder="Nhập họ và tên" required maxlength="50" />
                </div>
                <!--ngaysinh-->
                <div class="action-them-div4">
                    <p>Ngày sinh</p>
                    <input class="action-them-div4-input" id="sua-ngaysinh" type="date" name="ngaysinh" required />
                </div>
                <!--Gioi tinh-->
                <div class="action-them-div4">
                    <p>Giới tính</p>
                    <select class="action-them-div4-input" name="gioitinh" id="sua-gioitinh">
                        <option value="Khác">Khác</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
            </div>
            <!--2-->
            <div class="action-them-div3">
                <!--diachi-->
                <div class="action-them-div4">
                    <p>Địa chỉ</p>
                    <input class="action-them-div4-input" id="sua-diachi" type="text" name="diachi" placeholder="Nhập địa chỉ" required />
                </div>
                <!--cccd-->
                <div class="action-them-div4">
                    <p>CCCD/Chứng minh thư</p>
                    <input class="action-them-div4-input" id="sua-cccd" type="text" name="cccd" placeholder="Căn cước công dân/Chứng minh thư" required maxlength="20" />
                </div>
                <!--email-->
                <div class="action-them-div4">
                    <p>Email</p>
                    <input class="action-them-div4-input" id="sua-email" type="text" name="email" placeholder="Để trống nếu không muốn đổi email" maxlength="50" value=""/>
                    <div id="email-error-sua" class="invalid-feedback" style="display: none;">Email này đã tồn tại.</div>
                </div>
                <!--sdt-->
                <div class="action-them-div4">
                    <p>Số điện thoại</p>
                    <input class="action-them-div4-input" id="sua-sdt" type="text" name="sdt" placeholder="Nhập số điện thoại" required maxlength="11"  />
                </div>
                <!--anh-->
                <div class="action-them-div4">
                    <p>Avatar</p>
                    <input id="them-anh-sua" name="anh" type="file" style="width:0;height:0;"/>
                    <img id="preview-anh-sua" class="preview-anh" />
                    <label class="label-pre" for="them-anh-sua">Chọn ảnh</label>
                </div>
            </div>
        </div>
        <!---->
        <button class="bt-action" type="submit">Cập nhật</button>
    </form>


    <!--script-->
    <script src="/js/Employee/Admin/Admin.js"></script>
    <!--main js-->
    <script src="/js/Employee/Admin/AdminQuanLyNguoiDung.js"> </script>
</body>
</html>
