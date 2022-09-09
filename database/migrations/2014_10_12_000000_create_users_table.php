<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type',['admin','user'])->default('user');
            //enum => نوع من انواع قواعد البيانات الي بتعطيها قيم متاحة
            //في حال بدي اطبع القيم الي داخلو او لغات متعددة ما تزبط
            //في حال القيم ثابتة ولا يمكن تزيد نستخدمها
            //default('user')=> لانو اي حد بسجل بالموقع ما بنفع اعطيه صلاحية الادمن بكون اقل واحد امكاننيات الي هو المستخدم
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
