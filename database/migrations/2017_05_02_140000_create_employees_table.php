<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create Employees Table
 *
 * @author EB
 * Class CreateEmployeesTable
 */
class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('employees', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('nickname');
//            $table->string('email')->unique();
//            $table->string('password');
//            $table->char('api_token', 60)->nullable();
//            $table->rememberToken();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('employees');
    }
}
