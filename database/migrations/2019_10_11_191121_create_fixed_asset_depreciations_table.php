<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixedAssetDepreciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_asset_depreciations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("inventory_id")->unsigned();
            $table->date("posting_date")->nullable();
            $table->boolean("is_depreciated")->default(0);
            $table->bigInteger("created_by")->unsigned()->nullable();
            $table->bigInteger("updated_by")->unsigned()->nullable();
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
        Schema::dropIfExists('fixed_asset_depreciations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
