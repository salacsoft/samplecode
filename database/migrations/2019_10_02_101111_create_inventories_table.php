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
            $table->string("sku_code",30)->unique();
            $table->string("description",60);
            $table->string("uom",20);
            $table->float("ave_cost")->default(0);
            $table->float("on_hand")->default(0);
            $table->boolean("isfixed_asset")->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("item_category_id")
                    ->references("id")->on("item_categories")
                    ->onUpdate("cascade")
                    ->onDelete("cascade");
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
