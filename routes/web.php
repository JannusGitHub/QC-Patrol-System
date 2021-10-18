<?php

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
Auth::routes();

Route::get('/', function(){
	return view('audit_result');
})->name('home');

// Audit Result Pages
Route::get('/audit_results', function(){
	return view('audit_result');
})->name('audit_results');

Route::get('/open_audit_result', function(){
	return view('open_audit_result');
})->name('open_audit_result');

// QC PATROL
Route::get('/factors', function(){
	return view('qc_patrol.factors');
})->name('factors');

Route::get('/classifications', function(){
	return view('qc_patrol.classifications');
})->name('classifications');

Route::get('/sections', function(){
	return view('qc_patrol.sections');
})->name('sections');

Route::get('/product_lines', function(){
	return view('qc_patrol.product_lines');
})->name('product_lines');

Route::get('/checksheets', function(){
	return view('qc_patrol.checksheets');
})->name('checksheets');

Route::get('/qc_patrol', function(){
	return view('qc_patrol.qc_patrol');
})->name('qc_patrol');

Route::get('/reports', function(){
	return view('qc_patrol.reports');
})->name('reports');

Route::get('/email_recipient', function(){
	return view('qc_patrol.email_recipient');
})->name('email_recipient');

Route::get('/charts', function(){
	return view('charts');
})->name('charts');

Route::get('/approver', function(){
	return view('approver');
})->name('approver');

Route::get('/factor_item_lists', function(){
	return view('qc_patrol.factor_item_lists');
})->name('factor_item_lists');

// FACTOR CONTROLLER
Route::get('/view_factors', 'FactorController@view_factors')->name('view_factors');
Route::post('/save_factor', 'FactorController@save_factor')->name('save_factor');
Route::get('/get_factor_by_id', 'FactorController@get_factor_by_id')->name('get_factor_by_id');
Route::post('/action_factor', 'FactorController@action_factor')->name('action_factor');
Route::get('/get_cbo_factors_by_stat', 'FactorController@get_cbo_factors_by_stat')->name('get_cbo_factors_by_stat');

// FACTOR ITEM LIST CONTROLLER
Route::get('/view_factor_item_lists', 'FactorItemListController@view_factor_item_lists')->name('view_factor_item_lists');
Route::post('/save_factor_item_list', 'FactorItemListController@save_factor_item_list')->name('save_factor_item_list');
Route::get('/get_factor_item_list_by_id', 'FactorItemListController@get_factor_item_list_by_id')->name('get_factor_item_list_by_id');
Route::post('/action_factor_item_list', 'FactorItemListController@action_factor_item_list')->name('action_factor_item_list');
Route::get('/get_cbo_factor_item_lists_by_stat', 'FactorItemListController@get_cbo_factor_item_lists_by_stat')->name('get_cbo_factor_item_lists_by_stat');

// CLASSIFICATION CONTROLLER
Route::get('/view_classifications', 'ClassificationController@view_classifications')->name('view_classifications');
Route::post('/save_classification', 'ClassificationController@save_classification')->name('save_classification');
Route::get('/get_classification_by_id', 'ClassificationController@get_classification_by_id')->name('get_classification_by_id');
Route::post('/action_classification', 'ClassificationController@action_classification')->name('action_classification');
Route::get('/get_cbo_classifications_by_stat', 'ClassificationController@get_cbo_classifications_by_stat')->name('get_cbo_classifications_by_stat');

// SECTION CONTROLLER
Route::get('/view_sections', 'SectionController@view_sections')->name('view_sections');
Route::post('/save_section', 'SectionController@save_section')->name('save_section');
Route::get('/get_section_by_id', 'SectionController@get_section_by_id')->name('get_section_by_id');
Route::post('/action_section', 'SectionController@action_section')->name('action_section');
Route::get('/get_cbo_sections_by_stat', 'SectionController@get_cbo_sections_by_stat')->name('get_cbo_sections_by_stat');

// PRODUCT LINE CONTROLLER
Route::get('/view_product_lines', 'ProductLineController@view_product_lines')->name('view_product_lines');
Route::post('/save_product_line', 'ProductLineController@save_product_line')->name('save_product_line');
Route::get('/get_product_line_by_id', 'ProductLineController@get_product_line_by_id')->name('get_product_line_by_id');
Route::post('/action_product_line', 'ProductLineController@action_product_line')->name('action_product_line');
Route::get('/get_cbo_product_lines_by_stat', 'ProductLineController@get_cbo_product_lines_by_stat')->name('get_cbo_product_lines_by_stat');

// EMAIL RECIPIENT
Route::get('/view_email_recipient_by_stat', 'EmailRecipientController@view_email_recipient_by_stat');
Route::post('/add_email_recipient', 'EmailRecipientController@add_email_recipient');
Route::post('/remove_email_recipient', 'EmailRecipientController@remove_email_recipient');

// AUDIT RESULT CONTROLLER
// Route::get('/view_audit_results', 'AuditResultController@view_audit_results')->name('view_audit_results');
// Route::post('/save_audit_result', 'AuditResultController@save_audit_result')->name('save_audit_result');
// Route::get('/get_audit_result_by_id', 'AuditResultController@get_audit_result_by_id')->name('get_audit_result_by_id');
// Route::post('/action_audit_result', 'AuditResultController@action_audit_result')->name('action_audit_result');

// USER CONTROLLER
Route::get('/get_cbo_rapidx_users_by_stat', 'UserController@get_cbo_rapidx_users_by_stat')->name('get_cbo_rapidx_users_by_stat');

// AUDIT RESULT CONTROLLER
Route::get('/view_audit_results', 'AuditResultController@view_audit_results')->name('view_audit_results');
Route::get('/view_audit_results_layer2', 'AuditResultController@view_audit_results_layer2')->name('view_audit_results_layer2');
Route::post('/save_audit_result', 'AuditResultController@save_audit_result')->name('save_audit_result');
Route::get('/get_audit_result_by_id', 'AuditResultController@get_audit_result_by_id')->name('get_audit_result_by_id');
Route::post('/action_audit_result', 'AuditResultController@action_audit_result')->name('action_audit_result');
Route::get('/get_cbo_audit_results_by_stat', 'AuditResultController@get_cbo_audit_results_by_stat')->name('get_cbo_audit_results_by_stat');
Route::get('/export_audit_result', 'AuditResultController@export_audit_result')->name('export_audit_result');
Route::get('/send_audit_result_email', 'AuditResultController@send_audit_result_email')->name('send_audit_result_email');
Route::get('/btn_send_audit_result_email', 'AuditResultController@btn_send_audit_result_email')->name('btn_send_audit_result_email');

// AR FINDING CONTROLLER
Route::get('/view_ar_findings', 'ARFindingController@view_ar_findings')->name('view_ar_findings');
Route::post('/save_ar_finding', 'ARFindingController@save_ar_finding')->name('save_ar_finding');
Route::get('/get_ar_finding_by_id', 'ARFindingController@get_ar_finding_by_id')->name('get_ar_finding_by_id');
Route::post('/action_ar_finding', 'ARFindingController@action_ar_finding')->name('action_ar_finding');
Route::get('/get_cbo_ar_findings_by_stat', 'ARFindingController@get_cbo_ar_findings_by_stat')->name('get_cbo_ar_findings_by_stat');
Route::get('/report1', 'ARFindingController@report1')->name('report1');
Route::get('/chart1', 'ARFindingController@chart1')->name('chart1');
Route::get('/report2', 'ARFindingController@report2')->name('report2');
Route::get('/unlink', 'ARFindingController@unlink')->name('unlink');