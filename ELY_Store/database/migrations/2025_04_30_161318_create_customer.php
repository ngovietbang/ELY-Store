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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('customerid'); //khóa chính tự tăng
            $table->string('tentk');
            $table->string('matkhau');
            $table->string('hovaten');
            $table->date('ngaysinh')->nulltable();
            $table->string('gioitinh')->nulltable();
            $table->string('diachi');
            $table->string('email')->nulltable();
            $table->integer('sdt');
            $table->string('anh')->nulltable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
