<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_works', function (Blueprint $table) {
            $table->id();
            $table->string('short_description');
            $table->text('long_description');
            $table->date('start_date');
            $table->date('completion_date');
            $table->integer('penalty_rate');
            $table->string('addr_1');
            $table->string('addr_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('road_type_id');
            $table->date('expiry_date');
            $table->integer('contract_id');
            $table->softDeletes();
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
        Schema::dropIfExists('contract_works');
    }
}
