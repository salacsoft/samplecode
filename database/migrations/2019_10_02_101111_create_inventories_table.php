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
            $table->string("sku_code",30)->unique();
            $table->string("description",60);
            $table->float("sku_qty");
            $table->string("uom",20);
            $table->float("cost")->default(0);
            $table->float("on_hand")->default(0);
            $table->boolean("isfixed_asset")->default(0);
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("item_category_id")
                    ->references("id")->on("item_categories")
                    ->onUpdate("cascade")
                    ->onDelete("cascade");

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
        Schema::dropIfExists('inventories');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
