<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name', 32)->unique();
            $table->string('role_slug', 32);
            $table->text('role_detail')->nullable();
            $table->tinyInteger('active_status')
                ->nullable()
                ->default(1)
                ->comment('Active = 1, Inactive = 0');
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
        Schema::dropIfExists('roles');
    }
}
