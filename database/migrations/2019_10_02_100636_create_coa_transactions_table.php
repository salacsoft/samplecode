<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoaTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coa_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("chart_of_account_id")->unsigned();
            $table->bigInteger("coa_trans_no")->unique();
            $table->string("description")->nullable();
            $table->string("posting_type",10);
            $table->bigInteger("amount");
            $table->date("posting_date")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger("created_by")->unsigned()->nullable();
            $table->bigInteger("updated_by")->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("chart_of_account_id")
                    ->references("id")->on("chart_of_accounts")
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
        Schema::dropIfExists('coa_transactions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
