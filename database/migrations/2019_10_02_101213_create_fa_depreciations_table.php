<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaDepreciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_depreciations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("inventory_id")->unsigned();
            $table->float("fixed_value")->default(0);
            $table->float("salvage_value")->default(0);
            $table->integer("life_span")->default(0);
            $table->float("depreciation_value")->default(0);
            $table->integer("depreciated_life")->default(0);
            $table->float("market_value")->default(0);
            $table->date("posting_date")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign("inventory_id")
                    ->references("id")->on("inventories")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

            $table->foreign("user_id")
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
        Schema::dropIfExists('fa_depreciations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
