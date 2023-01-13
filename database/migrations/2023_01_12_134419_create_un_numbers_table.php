<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('un_numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('NumberId')->unique();
            $table->integer('NumberDiv')->unique();
            $table->integer('InitNumber');
            $table->char('Symbol', 3);
            $table->integer('Lengs');
            $table->integer('EditDiv');
            $table->integer('DateDiv');
            $table->integer('NumberClearDiv');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('UpdatePerson');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('un_numbers');
    }
}
