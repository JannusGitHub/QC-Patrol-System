<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\TUV;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(TUV::class, function (Faker $faker) {
	date_default_timezone_set('Asia/Manila');

	$faker->locale('en_GB'); 

	$classification = ['NC', 'OFI'];
	$audit_category = ['ISO9001', 'IATF16949', 'ISO14001'];
	$purpose_of_audit = ['Surveillance', 'Renewal', 'Certification'];

    return [
        'audit_category' => $audit_category[rand(0, 2)],
		'purpose_of_audit' => $purpose_of_audit[rand(0, 2)],
		'audit_date' => date('Y-m-d'),
		'auditors' => $faker->name,
		'classification' => $classification[rand(0, 1)],
		'deadline_for_submission' => date('Y-m-d'),
		'deadline_for_submission_days' => rand(1, 5),
		'actual_date_of_submission' => date('Y-m-d'),
		'sending_stat' => 1,
		'standard_clause' => $faker->sentence,
		'statement_of_nc' => $faker->sentence,
		'objective_evidence' => $faker->sentence,
		'root_cause_analysis' => $faker->sentence,
		'correction' => $faker->sentence,
		'containment' => $faker->sentence,
		'systematic' => $faker->sentence,
		'commitment_date' => date('Y-m-d'),
		// 'responsible_department' => rand(1, 14),
		'person_in_charge' => $faker->name,
		'corrective_action' => $faker->sentence,
		'img_corrective_action' => $faker->sentence,
		'audit_stat' => 1,
		'tuv_audit_stat' => 1,
		'created_by' => 1,
		'last_updated_by' => 1,
		'update_version' => 1,
    ];
});