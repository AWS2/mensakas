<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusinessRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_rate', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->bigInteger('business_id')->unsigned();
            $table->decimal('fixed_rate', 4, 2);
            $table->decimal('percentage_rate', 4, 2);

            $table->index('business_id', 'fk_brate_business_idx');

            $table->foreign('business_id')
                ->references('id')->on('business')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_rate');
    }
}
