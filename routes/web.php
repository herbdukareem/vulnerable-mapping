<?php

use Illuminate\Support\Facades\Route;
use App\Models\FormEntry;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/zone-a', function () {
    $perPage = 1000; // Number of records to fetch per page
    $page = 25;       // Starting page
    $lastPage = null;
    $zone = 'A';

    // Initialize an empty array to collect data from all pages
    $allData = [];

    do {
        $response = Http::get("https://five.epicollect.net/api/export/entries/vulnerability-mapping-zone-a", [
            'form_ref' => '804338bd69954d8fa0e0fa988f754061_652f17f87e715',
            'page' => $page,
            'per_page' => $perPage,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $entries = $data['data']['entries'];

            foreach ($entries as $entry) {
                // Check if the entry with the same UUID already exists in the database
                $existingEntry = FormEntry::where('ec5_uuid', $entry['ec5_uuid'])->first();

                if (!$existingEntry) {
                    // If the entry does not exist, create and save it
                    // FormEntry::create($entry);
                    FormEntry::create([
                        'ec5_uuid' => $entry['ec5_uuid'],
                        'created_at' => $entry['created_at'],
                        'title' => $entry['title'],
                        '1_Data_Collectors_ID' => $entry['1_Data_Collectors_ID'],
                        '2_Ward' => $entry['2_Ward'],
                        'zone' => $zone,
                        '3_Current_Location' => json_encode($entry['3_Current_Location']), // Convert to JSON if it's stored as JSON in the database
                        '4_Consent_granted' => $entry['4_Consent_granted'],
                        '5_Comment_and_report' => $entry['5_Comment_and_report'],
                        '6_Name_of_Respondent' => $entry['6_Name_of_Respondent'],
                        '7_Phone_number' => $entry['7_Phone_number'],
                        '8_Photograph_of_Resp' => $entry['8_Photograph_of_Resp'],
                        '9_Age_Range' => $entry['9_Age_Range'],
                        '10_Marital_Status' => $entry['10_Marital_Status'],
                        '11_Gender' => $entry['11_Gender'],
                        '12_Do_you_have_any_d' => $entry['12_Do_you_have_any_d'],
                        '13_Do_you_have_a_lon' => $entry['13_Do_you_have_a_lon'],
                        '14_Is_there_any_publ' => $entry['14_Is_there_any_publ'],
                        '15_If_Yes_specify_th' => $entry['15_If_Yes_specify_th'],
                        '16_Source_of_income' => $entry['16_Source_of_income'],
                        '17_Are_you_internall' => $entry['17_Are_you_internall'],
                        '19_Are_you_currently' => $entry['19_Are_you_currently'],
                        '20_If_yes_Enter_EDD_' => $entry['20_If_yes_Enter_EDD_'],
                        '21_Do_you_have_acces' => $entry['21_Do_you_have_acces'],
                        '22_Do_you_presently_' => $entry['22_Do_you_presently_'],
                        '23_If_yes_enter_numb' => $entry['23_If_yes_enter_numb'],
                        '24_Do_you_receive_an' => $entry['24_Do_you_receive_an'],
                        '25_Have_you_been_eng' => $entry['25_Have_you_been_eng'],
                        '26_Are_you_aware_of_' => $entry['26_Are_you_aware_of_'],
                        '28_Do_you_have_diffi' => $entry['28_Do_you_have_diffi'],
                        '29_Do_you_have_chron' => $entry['29_Do_you_have_chron'],
                        '30_What_type_of_shel' => $entry['30_What_type_of_shel'],
                        '31_Do_you_have_acces' => $entry['31_Do_you_have_acces'],
                        '32_Do_you_own_any_li' => $entry['32_Do_you_own_any_li'],
                        '33_Can_you_afford_at' => $entry['33_Can_you_afford_at'],
                        '34_What_is_the_prima' => $entry['34_What_is_the_prima'],
                        '35_Do_you_have_regul' => $entry['35_Do_you_have_regul'],
                        '36_How_many_children' => $entry['36_How_many_children'],
                        '37_How_many_of_your_' => $entry['37_How_many_of_your_'],
                        '39_Are_you_a_retiree' => $entry['39_Are_you_a_retiree'],
                        '40_Do_you_receive_a_' => $entry['40_Do_you_receive_a_'],
                        '41_Do_you_live_with_' => $entry['41_Do_you_live_with_'],
                        '42_Do_you_have_any_a' => $entry['42_Do_you_have_any_a'],
                        '43_Do_you_have_acces' => $entry['43_Do_you_have_acces'],
                        '45_How_many_days_do_' => $entry['45_How_many_days_do_'],
                        '46_Does_your_journey' => $entry['46_Does_your_journey'],
                        '47_Do_you_have_acces' => $entry['47_Do_you_have_acces'],
                        '48_Do_you_know_about' => $entry['48_Do_you_know_about'],
                        '49_Are_there_program' => $entry['49_Are_there_program'],
                        '50_Do_you_have_acces' => $entry['50_Do_you_have_acces'],
                        '52_Please_state_disa' => $entry['52_Please_state_disa'],
                        '53_Do_you_face_chall' => $entry['53_Do_you_face_chall'],
                        '54_Do_you_receive_an' => $entry['54_Do_you_receive_an'],
                        '55_How_many_children' => $entry['55_How_many_children'],
                        '56_How_many_are_curr' => $entry['56_How_many_are_curr'],
                        '58_Community_of_Orig' => $entry['58_Community_of_Orig'],
                        '59_Reason_for_displa' => $entry['59_Reason_for_displa'],
                        '60_Do_you_have_acces' => $entry['60_Do_you_have_acces'],
                    ]);
                }
            }

            $lastPage = $data['meta']['last_page'];
            $page++;

            // Sleep for a moment to avoid overloading the API (optional)
            sleep(1);
        } else {
            // Handle the case where the request is not successful (e.g., API error)
            return response()->json(['error' => 'Failed to fetch data from the API'], 500);
        }
    } while ($page <= $lastPage);

    return response()->json(['message' => 'Data fetched and saved successfully']);
});
