<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\QuenMatKhauController;

//mac dinh vao trang
Route::get('/', [HomeController::class, 'index'])->name('home');
//route error
Route::get('/unauthorized', function () {
    return view('Error.unauthorized');
});

//-----------------------login va logout----------------------
//dang nhap
Route::post('/login',[LoginController::class, 'Login'])->name('login');
//dang xuat
Route::post('/logout',[LoginController::class, 'Logout'])->name('logout');

//------------------------------------authentication---------------------------------
//quên mật khẩu
Route::get('/auth/QuenMatKhau', function(){ //mo view
    if(Session::get('user')){
        return redirect()->back()->with('message','Bạn đã đăng nhập') ?? redirect('/');
    }
    return view('Auth.QuenMatKhau');
})->name('auth.QuenMatKhau');
Route::post('/password/LayMatKhau', [QuenMatKhauController::class, 'LayMatKhau'])->name('password.LayMatKhau'); //lay matkhau



//---------------------------customer-------------------------
//dang ky
Route::post('/customer/DangKy', [CustomerController::class, 'DangKy'])->name('customer.DangKy');

//kiem tra tentk
Route::post('/customer/CheckTentk', [CustomerController::class, 'KiemTraTentk'])->name('customer.CheckTentk');

//kiem tra email
Route::post('/customer/CheckEmail', [CustomerController::class, 'KiemTraEmail'])->name('customer.CheckEmail');


//---------------------admin----------------------------------------------
//admin đăng nhập
Route::get('/employee/HomeAdmin',[EmployeeController::class, 'Admin'])->name('employee.HomeAdmin');

//mo trang admin quản lý người dùng-----------------
Route::get('/employee/AdminQuanLyNguoiDung',[EmployeeController::class, 'AdminQuanLyNguoiDung'])->name('employee.AdminQuanLyNguoiDung');

//mo trang admin quan ly khach hang-----------------
Route::get('/employee/AdminQuanLyNguoiDung/Customer', [EmployeeController::class, 'AdminQuanLyKhachHang'])->name('employee.AdminQuanLyNguoiDung.Customer');

//them user
Route::post('/employee/ThemUser', [EmployeeController::class, 'ThemUser'])->name('employee.ThemUser');

//kiem tra ten tk
Route::post('/employee/CheckTentk', [EmployeeController::class, 'CheckTentk'])->name('employee.CheckTentk');

//kiem tra email
Route::post('/employee/CheckEmail', [EmployeeController::class, 'CheckEmail'])->name('employee.CheckEmail');

//xoa user
Route::post('/employee/DeleteUser/{userid}', [EmployeeController::class, 'DeleteUser'])->name('employee.DeleteUser');

//tim kiem user
Route::get('/employee/FindUser', [EmployeeController::class, 'FindUser'])->name('employee.FindUser');

//tim kiem khach hang
Route::get('/employee/FindCustomer', [EmployeeController::class, 'FindCustomer'])->name('employee.FindCustomer');

//lay user by id
Route::post('/employee/getEmployeeById/{userid}',[EmployeeController::class, 'getEmployeeById'])->name('employee.getEmployeeById');

//sua user-----
Route::post('/employee/SuaUser',[EmployeeController::class, 'SuaUser'])->name('employee.SuaUser');




//-----------------------------------Shipper--------------------------------------------------------
Route::get('/employee/HomeShipper',[EmployeeController::class, 'Shipper'])->name('employee.HomeShipper');



//-----------------------------------Ke toan-------------------------------------------------------------
Route::get('/employee/HomeKeToan', [EmployeeController::class, 'KeToan'])->name('employee.HomeKeToan');


//-------------------------------------Nhan vien kho----------------------------------------------------
Route::get('employee/HomeNhanVienKho', [EmployeeController::class, 'NhanVienKho'])->name('employee.HomeNhanVienKho');
