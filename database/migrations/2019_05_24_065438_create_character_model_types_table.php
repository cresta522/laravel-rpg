<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterModelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_model_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('character_model_id');
            $table->foreign('character_model_id')->references('id')->on('character_models')->onDelete('cascade');
            $table->string('model_type_name');
            $table->unsignedInteger('init_lv')->comment('キャラクタ作成時 初期Lv');
            
            $table->unsignedInteger('hp');
            $table->unsignedInteger('mp');
            $table->unsignedInteger('sp');
            
            $table->unsignedInteger('stab')->comment('物理攻撃力-斬撃');
            $table->unsignedInteger('hack')->comment('物理攻撃力-刺突');
            $table->unsignedInteger('def')->comment('物理防御力');
            $table->unsignedInteger('int')->comment('魔法攻撃力');
            $table->unsignedInteger('mr')->comment('魔法防御力-回復力');
            $table->unsignedInteger('dex')->comment('命中率 CRI回避率');
            $table->unsignedInteger('agi')->comment('回避率 CRI発生率');
            
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
        Schema::dropIfExists('character_model_types');
    }
}
