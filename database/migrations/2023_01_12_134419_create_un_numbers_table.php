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
            $table->integer('NumberId');//会社＋施設コード（仮）
            $table->char('TenantCode', 4);
            $table->char('TenantBranch', 4);
            $table->integer('InitNumber');//最新のクリエイトのInitNumber＋１
            $table->char('NumberDiv',10);//任意で付けた予約名称
            $table->char('Symbol', 3);
            $table->integer('edit_id');
            $table->char('edit_name', 20);
            $table->integer('Lengs');
            $table->integer('DateDiv')->constrained();
            $table->timestamps();
            $table->softDeletes();
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
