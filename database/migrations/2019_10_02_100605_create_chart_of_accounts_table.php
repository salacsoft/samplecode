<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartOfAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("coa_type_id")->unsigned();
            $table->integer("account_no")->unique();
            $table->string("account_name",60)->nullable();
            $table->string("normal_balance",10)->nullable();
            $table->integer("parent_account")->nullable();
            $table->bigInteger("current_balance")->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("coa_type_id")
                    ->references("id")->on("coa_types")
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
        Schema::dropIfExists('chart_of_accounts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
