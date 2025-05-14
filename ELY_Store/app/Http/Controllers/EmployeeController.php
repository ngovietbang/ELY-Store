<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes\Employee;
use App\Models\Classes\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //admin dang nhap------------------------------------
    public function Admin(){
        if(Session::get('user.roles') !== 'Admin' ){
            return redirect('/unauthorized'); // 403
        }
        return view('Employees.Admin.HomeAdmin');
    }

    //admin quan ly nguoi dung - quan ly nhan su
    public function AdminQuanLyNguoiDung(){
        if (Session::get('user.roles') !== 'Admin') {
            return redirect('/unauthorized');
        }
        $user = Employee::orderByRaw("userid DESC")->get();
        return view('Employees.Admin.AdminQuanLyNguoiDung', compact('user'));
    }

    //admin quan ly nguoi dung - quan ly khach hang
    public function AdminQuanLyKhachHang(){
        if(Session::get('user.roles') !== 'Admin'){
            return redirect('/unauthorized');
        }
        $user = Customer::orderByRaw('customerid DESC')->get();
        return view('Employees.Admin.AdminQuanLyKhachHang', compact('user'));
    }

    //them user-------------
    public function ThemUser(Request $request){
        //validate du lieu nhap vao
        $request->validate([
            'tentk' => 'required|unique:users,tentk',
            'email' => 'unique:users,email',
        ]);
        //tao moi user
        $user = new Employee();
        $user->tentk = $request->tentk;
        $user->matkhau = bcrypt($request->matkhau) ; // Mã hóa mật khẩu voi bcrypt()
        $user->hovaten = $request->hovaten;
        $user->ngaysinh = $request->ngaysinh;
        $user->gioitinh = $request->gioitinh ?? 'Khác';
        $user->diachi = $request->diachi;
        $user->cccd = $request->cccd;
        $user->email = $request->email ?: 'None';
        $user->sdt = $request->sdt;
        $user->roles = $request->roles;
        //anh
        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Avatar/Employee/'), $filename);
            $user->anh = 'Avatar/Employee/' . $filename;
        }else{
            $user->anh = 'Avatar/Employee/default.png'; // gán mặc định
        }
        $user->save();

        return redirect()->back()->with('success', 'Thêm thành công!');
    }

    //check tentk-----------
    public function CheckTentk(Request $request)
    {
        $existsNs = Employee::KiemTraTentk($request->tentk);
        $existsKh = Customer::KiemTraTentk($request->tentk);
        return response()->json(['exists' => $existsNs || $existsKh]);
    }
    //check email--------
    public function CheckEmail(Request $request)
    {
        $exists = Employee::KiemTraEmail($request->email);
        return response()->json(['exists' => $exists]);
    }

    //xoa user--------------
    public function DeleteUser($id){
        $userhientai = Session::get('user.id');
        if($userhientai == $id){
            return response()->json(['fail' => true]);
        }
        Employee::where('userid', $id)->delete();
        return response()->json(['success' => true]);
    }

    //lay id employee
    public function getEmployeeById($id){
        $user = Employee::where('userid', $id)->first();
        return response()->json(['success' => true, 'result' => $user]);
    }

    //tim kiem user
    public function FindUser(Request $request){
        $user = Employee::get();
        if($request->keyword){
            $user = Employee::where('tentk', 'like' , "%{$request->keyword}%")
                    ->orWhere('hovaten', 'like' , "%{$request->keyword}%")
                    ->orWhere('ngaysinh', 'like' ,"%{$request->keyword}%")
                    ->orWhere('diachi', 'like' ,"%{$request->keyword}%")
                    ->orWhere('cccd', 'like' ,"%{$request->keyword}%")
                    ->orWhere('email', 'like' ,"%{$request->keyword}%")
                    ->orWhere('sdt', 'like' ,"%{$request->keyword}%")
                    ->orWhere('roles', 'like' ,"%{$request->keyword}%")
                    ->get();
        }
        return view('Employees.Admin.AdminQuanLyNguoiDung', compact('user'));
    }

    //tim kiem khach hàng
    public function FindCustomer(Request $request){
        $keyword = $request->keyword;
        $user = Customer::orderByRaw('customerid DESC')->get();
        if($keyword){
            $user = Customer::where('tentk','like',"%{$keyword}%")
                    ->orWhere('hovaten', 'like', "%{$keyword}%")
                    ->orWhere('ngaysinh','like', "%{$keyword}%")
                    ->orWhere('diachi','like', "%{$keyword}%")
                    ->orWhere('email','like', "%{$keyword}%")
                    ->orWhere('sdt','like', "%{$keyword}%")
                    ->get();
        }    
        return view('Employees.Admin.AdminQuanLyKhachHang', compact('user'));
    }

    //sua nguoi dung----------
    public function SuaUser(Request $request){
        //validate du lieu
        $request->validate([
            'hovaten' => 'required',
            'ngaysinh' => 'required',
            'diachi' => 'required',
            'cccd' => 'required',
            'sdt' => 'required'
        ]);

        $id = $request->userid;

        $user = Employee::findOrFail($id);

        if($request->filled('matkhau')){
            $user->matkhau = Hash::make($request->matkhau);
        }
        $user->hovaten = $request->hovaten;
        $user->ngaysinh = $request->ngaysinh;
        $user->gioitinh = $request->gioitinh;
        $user->diachi = $request->diachi;
        $user->cccd = $request->cccd;
        $user->sdt = $request->sdt;
        if($request->filled('email')){
            $user->email = $request->email;
        }
        //anh
        if($request->hasFile('anh')){
            $file = $request->file('anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Avatar/Employee/'), $fileName);
            $user->anh = 'Avatar/Employee/' . $fileName;
        }

        $user->save();

        return response()->json(['success' => true, 'user' => $user]);
    }


    //Shipper dang nhap-------------------------------------------------
    public function Shipper(){
        if(Session::get('user.roles') !== 'Shipper'){
            return redirect('/unauthorized');
        }
        return view('Employees.Shipper.HomeShipper');
    }



    //ke toan dang nhap-------------------------------------------------
    public function KeToan(){
        if(Session::get('user.roles') !== 'Kế toán'){
            return redirect('/unauthorized');
        }
        return view('Employees.KeToan.HomeKeToan');
    }



    //nhan vien kho dang nhap-------------------------------------------------
    public function NhanVienKho()
    {
        if (Session::get('user.roles') !== 'Nhân viên kho') {
            return redirect('/unauthorized');
        }
        return view('Employees.NhanVienKho.HomeNhanVienKho');
    }
}
