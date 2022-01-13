<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('email')->nullable();
            $table->string('mobile')->unique();
            $table->string('store')->nullable();

            $table->string('profile')->nullable();
            $table->string('business')->nullable();
            $table->string('location')->nullable();
            $table->string('bankName')->nullable();
            $table->string('accountNo')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('accountHolder')->nullable();
            $table->string('bankLinkedNo')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('aadharFront')->nullable();
            $table->string('aadharBack')->nullable();
            $table->string('pan')->nullable();
            $table->string('pandoc')->nullable();
            $table->string('gst')->nullable();
            $table->string('gstDoc')->nullable();
            $table->string('subdomain')->nullable();
            $table->boolean('is_open')->default(0);
            $table->boolean('is_deliver')->default(0);

            $table->string('type')->default('owner');



            $table->string('otp')->default('123456');
            $table->string('verified')->default('no');
            $table->string('status')->default('deactivated');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('12345678');
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
}
