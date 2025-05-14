<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function index(){
        // Kiểm tra nếu có session
        if (Session::has('user')) {
            $user = Session::get('user');

            // Nếu là employee và role là Admin
            if ($user['type'] === 'employee' && $user['roles'] === 'Admin') {
                return redirect()->route('employee.HomeAdmin');
            }
            //shipper
            if($user['type'] === 'employee' && $user['roles'] === 'Shipper'){
                return redirect()->route('employee.HomeShipper');
            }
            //ke toan
            if ($user['type'] === 'employee' && $user['roles'] === 'Kế toán') {
                return redirect()->route('employee.HomeKeToan');
            }
            //nhan vien kho
            if ($user['type'] === 'employee' && $user['roles'] === 'Nhân viên kho') {
                return redirect()->route('employee.HomeNhanVienKho');
            }

        }

        // neu khoi co session
        return view('home');
    }
}
