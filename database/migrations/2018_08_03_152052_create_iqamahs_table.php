<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIqamahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iqamahs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('date');            
            $table->string('fajr');
            $table->string('duhr');
            $table->string('asr');
            $table->string('maghrib');
            $table->string('isha');

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
        Schema::dropIfExists('iqamahs');
    }
}
