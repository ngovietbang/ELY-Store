<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userid'); //khóa chính tự tăng
            $table->string('tentk');  //string:255 ký tự | text:65535 ký tự
            $table->string('matkhau');
            $table->string('hovaten');
            $table->date('ngaysinh')->nulltable();
            $table->string('gioitinh')->nulltable();
            $table->string('diachi');
            $table->integer('cccd');
            $table->string('email')->nulltable();
            $table->integer('sdt');
            $table->string('roles');
            $table->string('anh')->nulltable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
