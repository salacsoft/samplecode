<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("inventory_id")->unsigned();
            $table->string("details",100)->nullable();
            $table->float("qty");
            $table->date("posting_date")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger("created_by")->unsigned()->nullable();
            $table->bigInteger("updated_by")->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("inventory_id")
                    ->references("id")->on("inventories")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

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
        Schema::dropIfExists('inventory_transactions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
