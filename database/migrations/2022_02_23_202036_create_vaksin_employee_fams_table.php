<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaksinEmployeeFamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin_employee_fams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vaksin_employee_id')->nullable();
            $table->string('fam_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('vaksin1')->nullable();
            $table->string('vaksin2')->nullable();
            $table->string('vaksin_boosting')->nullable();
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
        Schema::dropIfExists('vaksin_employee_fams');
    }
}
