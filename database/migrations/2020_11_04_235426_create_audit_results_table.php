<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('layer');
            $table->date('audit_date');
            // $table->date('audit_date_to');
            $table->date('issued_date');
            $table->date('due_date');
            $table->unsignedBigInteger('checked_by');
            // auditors should be in another table (1 to Many)
            // auditees should be in another table (1 to Many)
            $table->string('auditee_manual')->nullable();
            $table->text('commendation')->nullable();
            $table->tinyInteger('status');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');
            $table->integer('update_version');
            $table->timestamps();

            // Foreign key
            // $table->foreign('checked_by')->references('id')->on('users');
            // $table->foreign('factor_id')->references('id')->on('factors');

            // $table->bigIncrements('id');
            // $table->date('audit_date_from');
            // $table->date('audit_date_to');
            // $table->string('auditors');
            // $table->string('auditees');
            // $table->date('audit_findings_issued_date');
            // $table->date('deadline_of_submission');
            // $table->integer('deadline_of_submission_days');
            // $table->date('actual_date_of_submission')->nullable();
            // $table->unsignedBigInteger('factor_id');
            // $table->unsignedBigInteger('factor_item_list_id');
            // $table->unsignedBigInteger('classification_id');
            // // $table->unsignedBigInteger('section_id');
            // $table->unsignedBigInteger('product_line_id');
            // $table->text('statement_of_findings');
            // $table->text('illustration')->nullable();
            // $table->text('root_cause')->nullable();
            // $table->text('correction')->nullable();
            // $table->text('containment')->nullable();
            // $table->text('systematic')->nullable();
            // $table->date('correction_commitment_date')->nullable();
            // $table->date('containment_commitment_date')->nullable();
            // $table->date('systematic_commitment_date')->nullable();
            // $table->text('improvement_action')->nullable();
            // $table->date('commitment_date')->nullable();
            // $table->string('correction_person_in_charge')->nullable();
            // $table->string('containment_person_in_charge')->nullable();
            // $table->string('systematic_person_in_charge')->nullable();
            // $table->text('corrective_action')->nullable();
            // $table->tinyInteger('qad_approval');
            // $table->tinyInteger('o_s_approval');
            // $table->tinyInteger('qad_approved_by');
            // $table->tinyInteger('o_s_approved_by');
            // $table->tinyInteger('audit_stat');
            // $table->tinyInteger('status');
            // $table->tinyInteger('sending_stat');
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('last_updated_by');
            // $table->integer('update_version');
            // $table->timestamps();
            
            // Foreign key
            // $table->foreign('factor_id')->references('id')->on('factors');
            // $table->foreign('factor_item_list_id')->references('id')->on('factor_item_lists');
            // $table->foreign('classification_id')->references('id')->on('classifications');
            // $table->foreign('product_line_id')->references('id')->on('product_lines');
            // $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_results');
    }
}
