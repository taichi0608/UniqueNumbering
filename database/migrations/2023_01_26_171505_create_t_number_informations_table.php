<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTNumberInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_number_informations', function (Blueprint $table) {
            $table->id();

            $table->integer('tenant_id');
            $table->char('tenant_name');
            $table->char('tenantBranch_name');

            $table->integer('number_id');
            $table->char('number_name');// PHP側でユニーク設定（tenant_idとnumber_nameがセットであるかチェック）

            $table->integer('edit_id');
            $table->char('edit_name');
            $table->integer('edit_length');

            $table->integer('date_id');
            $table->char('date_name');
            
            $table->char('symbol', 3)->nullable();
            $table->integer('count_id')->nullable();
            $table->char('newest_id')->nullable();// 最新の採番後の番号（カウントIDとリング）

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
        Schema::dropIfExists('t_number_informations');
    }
}
