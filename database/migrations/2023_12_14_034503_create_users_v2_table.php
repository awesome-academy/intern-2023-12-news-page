<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersV2Table extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop unique constraint on email
            $table->dropUnique(['email']);

            // Change column types
            $table->increments('id')->change();
            $table->string('name', 255)->change();
            $table->text('password')->change();
            $table->string('email', 320)->unique()->change();

            // Add new columns
            $table->integer('role_id')->default(1)->after('email');
            $table->integer('status_id')->default(1)->after('role_id');
            $table->boolean('verify')->default(false)->after('status_id');
            $table->string('avatar', 255)->nullable()->after('verify');
            $table->tinyInteger('gender')->nullable()->after('avatar');
            $table->date('birthday')->nullable()->after('gender');
            $table->rememberToken()->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role_id', 'status_id', 'verify', 'avatar', 'gender', 'birthday']);

            $table->id()->change();
            $table->string('name')->change();
            $table->text('password')->change();
            $table->dropUnique(['email']);
            $table->string('email')->unique()->change();
            $table->rememberToken()->change();
        });
    }
}
