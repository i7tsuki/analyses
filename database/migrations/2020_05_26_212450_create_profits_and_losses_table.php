<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitsAndLossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_and_losses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('type')->nullable();
            $table->unsignedBigInteger('sales')->nullable();            //売上高
            $table->unsignedBigInteger('purchase')->nullable();         //仕入高
            $table->unsignedBigInteger('tax_and_dues')->nullable();     //租税公課
            $table->unsignedBigInteger('utilities')->nullable();        //水道光熱費
            $table->unsignedBigInteger('transportations')->nullable();  //旅費交通費
            $table->unsignedBigInteger('communications')->nullable();   //通信費
            $table->unsignedBigInteger('entertainments')->nullable();   //接待交際費
            $table->unsignedBigInteger('expendables')->nullable();      //消耗品費
            $table->unsignedBigInteger('salaries')->nullable();         //給料賃金
            $table->unsignedBigInteger('outsourcings')->nullable();     //外注工賃
            $table->unsignedBigInteger('rents')->nullable();            //地代家賃
            $table->unsignedBigInteger('other_costs')->nullable();      //その他
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // 組み合わせの重複を許さない
            $table->unique(['user_id', 'year', 'month']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('profit_and_losses', function (Blueprint $table) {
                    $table->dropForeign('profit_and_losses_user_id_foreign');
        });
        Schema::dropIfExists('profit_and_losses');
        */
        Schema::dropIfExists('profit_and_losses');
    }
}
