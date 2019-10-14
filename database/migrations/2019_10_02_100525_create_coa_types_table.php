<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coa_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("code",10)->unique();
            $table->string("type",60)->unique();
            $table->bigInteger("created_by")->unsigned()->nullable();
            $table->bigInteger("updated_by")->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("created_by")
                    ->references("id")->on("users")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

            $table->foreign("updated_by")
                    ->references("id")->on("users")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('coa_types');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
