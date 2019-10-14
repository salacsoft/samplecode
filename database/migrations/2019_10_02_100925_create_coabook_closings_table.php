<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoabookClosingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coabook_closings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("chart_of_account_id")->unsigned();
            $table->bigInteger("debit")->default(0);
            $table->bigInteger("credit")->default(0);
            $table->date("posting_date")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer("closing_month");
            $table->integer("closing_year");
            $table->bigInteger("created_by")->unsigned()->nullable();
            $table->bigInteger("updated_by")->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("chart_of_account_id")
                    ->references("id")->on("chart_of_accounts")
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
        Schema::dropIfExists('coabook_closings');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
