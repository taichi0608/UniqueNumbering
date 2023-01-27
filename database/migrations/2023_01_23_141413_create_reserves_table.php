<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->char('number_name');//任意で付けた予約名称
            $table->char('reserve_id');//採番後の番号
            $table->char('change_number');//最新のクリエイトのInitNumber＋１
            $table->integer('client_id');//採番前の番号
            $table->char('client_name');//予約者氏名
            $table->char('tenant_id');//会社＋施設コード（仮）
            $table->integer('edit_id');//編集区分番号
            $table->char('edit_name');//編集区分名
            $table->char('symbol');//任意で付けた記号
            $table->integer('edit_length');//有効桁数

            $table->integer('date_id');//日付区分番号
            $table->char('date_name');//日付区分名
    
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
        Schema::dropIfExists('reserves');
    }
}
