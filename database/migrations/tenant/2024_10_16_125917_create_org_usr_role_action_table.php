<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgUsrRoleActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_usr_role_action', function (Blueprint $table) {
            $table->id();
            $table->integer("org_id")->index();
            $table->integer("usr_role_id")->index();
            $table->integer("module_id")->index();
            $table->boolean("view")->index();
            $table->boolean("edit")->index();
            $table->boolean("delete")->index();
            $table->boolean("is_active")->index();
            $table->boolean("is_deleted")->index();
            $table->integer("created_by")->nullable()->index();
            $table->integer("updated_by")->nullable();
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
        Schema::dropIfExists('org_usr_role_action');
    }
}
