<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('ar_state');
            $table->string('en_state');
            $table->string('gov_id');
        });


        DB::statement("INSERT INTO `states` (`id`, `ar_state`, `en_state`, `gov_id`) VALUES
(1, 'مسقط', 'Muscat', 1),
(2, 'السيب', 'Al Seeb', 1),
(3, 'مطرح', 'Muttrah', 1),
(4, 'قريات', 'Qurayyat', 1),
(5, 'بوشر', 'Bawshar', 1),
(6, 'العامرات', 'Al Amarat', 1),
(7, 'صلالة ', 'Salalah', 2),
(8, 'رخيوت ', 'Rakhyut', 2),
(9, 'ثمريت ', 'Thumrait', 2),
(10, 'ضلكوت ', 'Dalkut', 2),
(11, 'طاقة ', 'Taqah', 2),
(12, 'مقشن ', 'Muqshin', 2),
(13, 'مرباط ', 'Mirbat', 2),
(14, 'شليم ', 'Shalim', 2),
(15, 'جزر الحلانيات ', 'Hallaniyat Islands', 2),
(16, 'سدح ', 'Sadah', 2),
(17, ' المزيونة', 'Al Mazyunah', 2),
(18, ' إبراء', 'Ibra', 3),
(19, 'المضيبي', 'Al-Mudhaibi', 3),
(20, 'القابل', 'Al-Qabil ', 3),
(21, 'بدية', 'Bidiya ', 3),
(22, ' وادي بني خالد', 'Wadi Bani Khalid', 3),
(23, 'دماء الطائيين', 'Dema Wa Thaieen', 3),
(24, 'صور ', 'Sur', 4),
(25, 'جعلان بني بوحسن  ', 'Jalan Bani Bu Hassan ', 4),
(26, 'جعلان بني بوعلي', 'Jalan Bani Bu Ali ', 4),
(27, 'الكامل والوافي', 'Al-Kamil and Al-Wafi ', 4),
(28, 'مصيرة ', 'Masirah', 4),
(29, 'خصب ', 'Khasab', 5),
(30, 'دبا البيعة', 'Dibba Al-Bayaah', 5),
(31, 'بخا', 'Bukha', 5),
(32, 'مدحا', 'Madha', 5),
(33, 'هيما', 'Haima', 6),
(34, 'محوت', 'Mahout', 6),
(35, 'الدقم', 'Duqm', 6),
(36, 'الجازر', 'Al Jazer', 6),
(37, 'البريمي', 'Al Buraymi', 7),
(38, 'محضة', 'Mahdah', 7),
(39, 'السنينة', 'As Sunainah', 7),
(40, 'وادي المعاول', 'Wadi Al Maawil', 8),
(41, 'العوابي', 'Al Awabi', 8),
(42, 'الرستاق', 'Ar Rustaq', 8),
(43, 'نخل', 'Nakhal', 8),
(44, 'بركاء', 'Barka', 8),
(45, 'المصنعة', 'Al Musanaah', 8),
(46, 'صحار ', 'Sohar', 9),
(47, 'صحم ', 'Saham ', 9),
(48, 'السويق ', ' As Suwayq', 9),
(49, 'شناص ', 'Shinas ', 9),
(50, 'لوى ', 'Liwa', 9),
(51, 'الخابورة', 'Al Khaburah', 9),
(52, 'ضنك', 'Dhank', 10),
(53, 'ينقل', 'Yanqul', 10),
(54, 'عبري', 'Ibri', 10),
(55, 'نزوى', 'Nizwa', 11),
(56, 'الحمراء', 'Al Hamra', 11),
(57, 'سمائل', 'Samail', 11),
(58, 'منح', 'Manah', 11),
(59, 'بهلاء', 'Bahla', 11),
(60, 'أزكي', 'Izki', 11),
(61, 'أدم', 'Adam', 11),
(62, 'بدبد', 'Bid Bid', 11);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
