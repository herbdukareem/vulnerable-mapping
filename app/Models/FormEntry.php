<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    use HasFactory;
    protected $table = 'form_entries';

    protected $fillable = [
        'ec5_uuid',
        'created_at',
        'uploaded_at',
        '1_Data_Collectors_ID',
        '2_Ward',
        'zone',
        '3_Current_Location',
        '4_Consent_granted',
        '5_Comment_and_report',
        '6_Name_of_Respondent',
        '7_Phone_number',
        '8_Photograph_of_Resp',
        '9_Age_Range',
        '10_Marital_Status',
        '11_Gender',
        '12_Do_you_have_any_d',
        '13_Do_you_have_a_lon',
        '14_Is_there_any_publ',
        '15_If_Yes_specify_th',
        '16_Source_of_income',
        '17_Are_you_internall',
        '19_Are_you_currently',
        '20_If_yes_Enter_EDD_',
        '21_Do_you_have_acces',
        '22_Do_you_presently_',
        '23_If_yes_enter_numb',
        '24_Do_you_receive_an',
        '25_Have_you_been_eng',
        '26_Are_you_aware_of_',
        '28_Do_you_have_diffi',
        '29_Do_you_have_chron',
        '30_What_type_of_shel',
        '31_Do_you_have_acces',
        '32_Do_you_own_any_li',
        '33_Can_you_afford_at',
        '34_What_is_the_prima',
        '35_Do_you_have_regul',
        '36_How_many_children',
        '37_How_many_of_your_',
        '39_Are_you_a_retiree',
        '40_Do_you_receive_a_',
        '41_Do_you_live_with_',
        '42_Do_you_have_any_a',
        '43_Do_you_have_acces',
        '45_How_many_days_do_',
        '46_Does_your_journey',
        '47_Do_you_have_acces',
        '48_Do_you_know_about',
        '49_Are_there_program',
        '50_Do_you_have_acces',
        '52_Please_state_disa',
        '53_Do_you_face_chall',
        '54_Do_you_receive_an',
        '55_How_many_children',
        '56_How_many_are_curr',
        '58_Community_of_Orig',
        '59_Reason_for_displa',
        '60_Do_you_have_acces',
        '61_For_how_long_have'
    ];
}