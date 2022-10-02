<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Role;
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
            $table->bigIncrements('id');
            $table->string('slug', 5)->unique();
            $table->string('title', 90);
            $table->timestamps();
        });
        Role::create([
            'id'=> Role::ROLE_ADMIN,
            'slug'=>"ADM",
            'title'=> "Adminstrator"
        ]);
        Role::create([
            'id'=> Role::ROLE_TMLD,
            'slug'=>"TMLD",
            'title'=> "team leader",
        ]);
        Role::create([
            'id'=> Role::ROLE_SAL,
            'slug'=>"SAL",
            'title'=> "saller",
        ]);
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
