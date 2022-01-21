<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedInteger('role_id')->index();
            $table->tinyInteger('active_status')
                ->nullable()
                ->default(1)
                ->comment('Active = 1, Inactive = 0');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->timestamp('created_at')
                ->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                ->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
