<?php

//https://laravel.com/docs/5.3/migrations

//php artisan migrate
//php artisan migrate:reset

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 64);
            $table->rememberToken();
            $table->timestamps();




        });

        DB::table('users')->insert(
            [
                [
                    'name' => 'Project Owner',
                    'email' => 'owner@owner.com.pl', 
                    'password' => '$2y$10$m8wHNRCCG9Y/bL0iRqwhDefBcKlU4/EmGynGWt37qGoE5isxY9vAq',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Admin', 
                    'email' => 'admin@admin.com.pl', 'password' => 
                    '$2y$10$m8wHNRCCG9Y/bL0iRqwhDefBcKlU4/EmGynGWt37qGoE5isxY9vAq',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'User', 
                    'email' => 'user@user.com.pl', 'password' => 
                    '$2y$10$m8wHNRCCG9Y/bL0iRqwhDefBcKlU4/EmGynGWt37qGoE5isxY9vAq',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
