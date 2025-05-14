<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Classes\Customer;
use App\Models\Classes\Employee;

class LoginController extends Controller
{
    //login
    public function Login(Request $request)
    {
        try {
            $tentk = $request->tentk;
            $matkhau = $request->matkhau;

            // Kiểm tra tên tài khoản trong cả hai bảng
            $employee = Employee::where('tentk', $tentk)->first();
            $customer = Customer::where('tentk', $tentk)->first();

            // Kiểm tra nếu không tồn tại tài khoản
            if (!$employee && !$customer) {
                return response()->json(['success' => false, 'message' => '*Tài khoản không tồn tại.']);
            }

            // Kiểm tra nếu tài khoản là employee và mật khẩu đúng
            if ($employee && Hash::check($matkhau, $employee->matkhau)) {
                // Nếu có role => là employee
                if (!empty($employee->roles)) {
                    Session::put('user', [
                        'id' => $employee->userid,
                        'tentk' => $employee->tentk,
                        'hovaten' => $employee->hovaten,
                        'roles' => $employee->roles,
                        'anh' => $employee->anh,
                        'type' => 'employee',
                    ]);

                    // Điều hướng theo role
                    $redirectUrl = match ($employee->roles) {
                        'Admin' => route('employee.HomeAdmin'),
                        'Shipper' => route('employee.HomeShipper'),
                        'Kế toán' => route('employee.HomeKeToan'),
                        'Nhân viên kho' => route('employee.HomeNhanVienKho'),
                        default => route('home'),
                    };

                    return response()->json(['success' => true, 'redirect_url' => $redirectUrl]);
                }
            }

            // Kiểm tra nếu tài khoản là customer và mật khẩu đúng
            if ($customer && Hash::check($matkhau, $customer->matkhau)) {
                Session::put('user', [
                    'id' => $customer->customerid,
                    'tentk' => $customer->tentk,
                    'hovaten' => $customer->hovaten,
                    'anh' => $customer->anh,
                    'type' => 'customer',
                ]);

                return response()->json(['success' => true, 'redirect_url' => route('home')]);
            }

            // Nếu mật khẩu sai
            return response()->json(['success' => false, 'message' => '*Sai mật khẩu.']);

        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => 'Lỗi hệ thống: ' . $ex->getMessage()]);
        }
    }


    //logout
    public function Logout()
    {
        session()->flush(); //xoa session
        return redirect()->route('home');
    }
}
