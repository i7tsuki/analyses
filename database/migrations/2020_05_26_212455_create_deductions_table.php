<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deductions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('year');
            $table->integer('blue_declaration')->nullable();
            $table->unsignedBigInteger('social_insurance')->nullable();
            $table->unsignedBigInteger('life_premium_new')->nullable();
            $table->unsignedBigInteger('ltc_premium')->nullable();
            $table->unsignedBigInteger('pension_new')->nullable();
            $table->unsignedBigInteger('life_premium_old')->nullable();
            $table->unsignedBigInteger('pension_old')->nullable();
            $table->unsignedBigInteger('earthquake_insurance')->nullable();
            $table->integer('widower')->nullable();
            $table->integer('widow_normal')->nullable();
            $table->integer('widow_special')->nullable();
            $table->integer('spouse')->nullable();
            $table->unsignedBigInteger('spouse_income')->nullable();
            $table->integer('spouse_old')->nullable();
            $table->integer('dependent_relatives_for_deduction')->nullable();
            $table->integer('specific_dependent')->nullable();
            $table->integer('elderly_dependent_relative')->nullable();
            $table->integer('elderly_dependent_relative_living_together')->nullable(); 
            $table->unsignedBigInteger('medical_bills_income')->nullable();
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // 組み合わせの重複を許さない
            $table->unique(['user_id', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deductions');
    }
}
