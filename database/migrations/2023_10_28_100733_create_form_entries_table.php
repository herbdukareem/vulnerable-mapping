<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_entries', function (Blueprint $table) {
            $table->id();
            $table->string('ec5_uuid')->nullable();
            $table->timestamp('uploaded_at')->nullable();
            $table->string('title')->nullable();
            $table->string('1_Data_Collectors_ID')->nullable();
            $table->string('2_Ward')->nullable();
            $table->string('zone')->nullable();
            $table->json('3_Current_Location')->nullable();
            $table->string('4_Consent_granted')->nullable();
            $table->text('5_Comment_and_report')->nullable();
            $table->string('6_Name_of_Respondent')->nullable();
            $table->string('7_Phone_number')->nullable();
            $table->string('8_Photograph_of_Resp')->nullable();
            $table->string('9_Age_Range')->nullable();
            $table->string('10_Marital_Status')->nullable();
            $table->string('11_Gender')->nullable();
            $table->string('12_Do_you_have_any_d')->nullable();
            $table->string('13_Do_you_have_a_lon')->nullable();
            $table->string('14_Is_there_any_publ')->nullable();
            $table->string('15_If_Yes_specify_th')->nullable();
            $table->string('16_Source_of_income')->nullable();
            $table->string('17_Are_you_internall')->nullable();
            $table->string('19_Are_you_currently')->nullable();
            $table->string('20_If_yes_Enter_EDD_')->nullable();
            $table->string('21_Do_you_have_acces')->nullable();
            $table->string('22_Do_you_presently_')->nullable();
            $table->string('23_If_yes_enter_numb')->nullable();
            $table->string('24_Do_you_receive_an')->nullable();
            $table->string('25_Have_you_been_eng')->nullable();
            $table->string('26_Are_you_aware_of_')->nullable();
            $table->string('28_Do_you_have_diffi')->nullable();
            $table->string('29_Do_you_have_chron')->nullable();
            $table->string('30_What_type_of_shel')->nullable();
            $table->string('31_Do_you_have_acces')->nullable();
            $table->string('32_Do_you_own_any_li')->nullable();
            $table->string('33_Can_you_afford_at')->nullable();
            $table->string('34_What_is_the_prima')->nullable();
            $table->string('35_Do_you_have_regul')->nullable();
            $table->string('36_How_many_children')->nullable();
            $table->string('37_How_many_of_your_')->nullable();
            $table->string('39_Are_you_a_retiree')->nullable();
            $table->string('40_Do_you_receive_a_')->nullable();
            $table->string('41_Do_you_live_with_')->nullable();
            $table->string('42_Do_you_have_any_a')->nullable();
            $table->string('43_Do_you_have_acces')->nullable();
            $table->string('45_How_many_days_do_')->nullable();
            $table->string('46_Does_your_journey')->nullable();
            $table->string('47_Do_you_have_acces')->nullable();
            $table->string('48_Do_you_know_about')->nullable();
            $table->string('49_Are_there_program')->nullable();
            $table->string('50_Do_you_have_acces')->nullable();
            $table->string('52_Please_state_disa')->nullable();
            $table->string('53_Do_you_face_chall')->nullable();
            $table->string('54_Do_you_receive_an')->nullable();
            $table->string('55_How_many_children')->nullable();
            $table->string('56_How_many_are_curr')->nullable();
            $table->string('58_Community_of_Orig')->nullable();
            $table->string('59_Reason_for_displa')->nullable();
            $table->string('60_Do_you_have_acces')->nullable();
            

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
        Schema::dropIfExists('form_entries');
    }
}
