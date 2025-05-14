<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classes\Customer;
use App\Models\Classes\Employee;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash; 

class QuenMatKhauController extends Controller
{
    //
    public function LayMatKhau(Request $request){
        //validate du lieu
        $request->validate([
            'tentk' => 'required',
            'email' => 'required',
        ]);
        //kiem tra ton tai email trong bang customer
        $user1 = Customer::where('email', $request->email)->where('tentk', $request->tentk)->first();
        $user2 = Employee::where('email', $request->email)->where('tentk', $request->tentk)->first();
        //mk moi
        $newmk = str()->random(4);
        //
        if($user1 || $user2){
            //gui mk qua email
            Mail::raw("Mật khẩu mới của bạn là: $newmk", function($message) use ($request){
                $message->to($request->email)->subject("Đặt lại mật khẩu");
            });
            //cap nhat mat khau
            if($user1){
                $user1->matkhau = Hash::make($newmk);
                $user1->save();
            }
            else if($user2){
                $user2->matkhau = Hash::make($newmk);
                $user2->save();
            }
            //
            return response()->json(['success' => true, 'redirect' => route('home')]);
        }
        else{
            return response()->json(['fail' => true]);
        }
    }
}
