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
            $table->char('TenantCode', 4);
            $table->char('TenantBranch', 4);
            $table->integer('NumberId');
            $table->char('NumberDiv',10);
            $table->integer('InitNumber');
            $table->char('Symbol', 3);
            $table->integer('Lengs');
            $table->integer('div_edit_id')->constrained();
            $table->integer('DateDiv')->constrained();
            $table->integer('NumberClearDiv');
            $table->timestamps();
            $table->softDeletes();
            $table->text('UpdatePerson');
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
