<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateExpensesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('expenses_categories')->insert([
            'name'=>'مباني'
        ]);
        DB::table('expenses_categories')->insert([
            'name'=>'موظفون'
        ]);
        DB::table('expenses_categories')->insert([
            'name'=>'ارباح'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses_categories');
    }
}
