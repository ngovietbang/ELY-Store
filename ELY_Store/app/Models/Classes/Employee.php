<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Tên bảng 
    protected $table = 'users';

    // Tên khóa chính 
    protected $primaryKey = 'userid';

    // Nếu không muốn dùng timestamps (created_at, updated_at)
    public $timestamps = false;

    // Các cột 
    protected $fillable = [
        'tentk',
        'matkhau',
        'hovaten',
        'ngaysinh',
        'gioitinh',
        'diachi',
        'cccd',
        'email',
        'sdt',
        'roles',
        'anh'
    ];

    //function kiem tra ton tai tentk
    public static function KiemTraTentk($tentk){
        return self::where('tentk', $tentk)->exists();
    }

    //kiem tra ton tai email
    public static function KiemTraEmail($email){
        return self::where('email', $email)->exists();
    }

}
