<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGovsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('govs', function (Blueprint $table) {
            $table->id();
            $table->string('ar_gov');
            $table->string('en_gov');
        });

        DB::statement("INSERT INTO `govs` (`id`, `ar_gov`, `en_gov`) VALUES
(1, 'مسقط', 'Muscat'),
(2, 'ظفار', 'Dhofar'),
(3, 'شمال الشرقية', 'Ash Sharqiyah North'),
(4, 'جنوب الشرقية', 'Ash Sharqiyah South'),
(5, 'مسندم', 'Musandam'),
(6, 'الوسطى', 'Al Wusta'),
(7, 'البريمي', 'Al Buraymi'),
(8, 'جنوب الباطنة', 'Al Batinah South'),
(9, 'شمال الباطنة', 'Al Batinah North'),
(10, 'الظاهرة', 'Ad Dhahirah'),
(11, 'الداخلية', 'Ad Dakhiliyah');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('govs');
    }
}
