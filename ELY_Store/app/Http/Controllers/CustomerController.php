<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes\Customer;
use App\Models\Classes\Employee;

class CustomerController extends Controller{
    //dang ky khach hang
    public function DangKy(Request $request){
        //validate du lieu
        $request->validate([
            'tentk' => 'required|unique:customer,tentk',
            'hovaten' => 'required',
            'diachi' => 'required',
            'sdt' => 'required',
        ]);
        //tao moi
        $customer = new Customer();
        $customer->tentk = $request->tentk;
        $customer->matkhau = bcrypt($request->matkhau);
        $customer->hovaten = $request->hovaten;
        $customer->ngaysinh = $request->ngaysinh;
        $customer->gioitinh = $request->gioitinh ?? 'Khác';
        //dia chi
        // Load dữ liệu từ JSON (dùng đường dẫn tương đối)
        $tinhData = json_decode(file_get_contents(__DIR__ . '/../../../public/js/AdressVietNam/tinh_tp.json'), true);
        $huyenData = json_decode(file_get_contents(__DIR__ . '/../../../public/js/AdressVietNam/quan_huyen.json'), true);
        $xaData = json_decode(file_get_contents(__DIR__ . '/../../../public/js/AdressVietNam/xa_phuong.json'), true);
        // Lấy tên từ code
        $tinhName = isset($tinhData[$request->tinh]) ? $tinhData[$request->tinh]['name'] : '';
        $huyenName = isset($huyenData[$request->huyen]) ? $huyenData[$request->huyen]['name'] : '';
        $xaName = isset($xaData[$request->xa]) ? $xaData[$request->xa]['name'] : '';

        $customer->diachi = $xaName . ', ' . $huyenName . ', ' . $tinhName . ' | ' . $request->diachi;
        //
        $customer->email = $request->email ?? 'Null';
        $customer->sdt = $request->sdt;
        //anh
        if($request->hasFile('anh')){
            $file = $request->anh;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Avatar/Customer/'), $filename);
            $customer->anh = 'Avatar/Customer/' . $filename;
        }
        else{
            $customer->anh = 'Avatar/Customer/default.png';
        }
        //luu
        $customer->save();

        return redirect()->back()->with('success', 'Thêm thành công!');
    }

    //check tentk
    public function KiemTraTentk(Request $request){
        $existKh = Customer::KiemTraTentk($request->tentk);
        $existNs = Employee::KiemTraTentk($request->tentk);
        return response()->json(['exists' => $existKh || $existNs]);
    }

    //check email
    public function KiemTraEmail(Request $request){
        $exists = Customer::KiemTraEmail($request->email);
        return response()->json(['exists' => $exists]);
    }

}
