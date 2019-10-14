<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("item_category_id")->unsigned();
            $table->string("product_code",20)->nullable();
            $table->string("sku_code",30)->nullable()->unique();
            $table->string("description",60)->nullable();
            $table->float("sku_qty")->nullable();
            $table->string("uom",20)->nullable();
            $table->float("cost")->default(0);
            $table->float("on_hand")->default(0);
            $table->boolean("isfixed_asset")->default(0);
            $table->float("salvage_value")->nullable()->default(0);
            $table->integer("life_span")->nullable()->default(0);
            $table->float("depreciation_value")->nullable()->default(0);
            $table->bigInteger("created_by")->unsigned()->nullable();
            $table->bigInteger("updated_by")->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("item_category_id")
                    ->references("id")->on("item_categories")
                    ->onUpdate("cascade")
                    ->onDelete("cascade");

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
        Schema::dropIfExists('inventories');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
