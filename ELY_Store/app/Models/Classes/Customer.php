<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //ten bang
    protected $table = 'customer';
    //khoa chinh
    protected $primaryKey = 'customerid';
    //tat timestamp
    public $timestamps = false;

    //cac cot
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
        'anh'
    ];

    //kiem tra ton tai ten tk
    public static function KiemTraTentk($tentk){
        return self::where('tentk', $tentk)->exists();
    }
    //kiem tra ton tai email
    public static function KiemTraEmail($email){
        return self::where('email', $email)->exists();
    }
}
