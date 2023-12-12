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
            $table->increments('id');
            $table->string('name',255);
            $table->text('password');
            $table->string('email',320);
            $table->integer('role_id');
            $table->integer('status_id');
            $table->boolean('verify')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar',255)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
//            Delete
            $table->string('test_delete')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'test_delete')) {
                $table->dropColumn('test_delete');
            }
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
