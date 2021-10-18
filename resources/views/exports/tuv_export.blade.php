<table>
	<thead>
		<tr>
			<th colspan="2"></th>
			<th colspan="21">TUV AUDIT RESULT TABULAR REPORTS</th>
		</tr>
		<tr>
			<th style="background-color: #87d4ed; border: 1px solid black;">Audit Category</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Purpose of Audit</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Rank / Classification</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Standard Clause</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Audit Date</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Auditors</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Deadline of Submission</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Actual Date of Submission</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Responsible Department</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Statement of NC</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Objective Evidence</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Root Cause Analysis</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Correction</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Person In-charge</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Commitment Date</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Containment</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Person In-charge</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Commitment Date</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Systemic</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Person In-charge</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Commitment Date</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Close-Out Audit</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Sending Status</th>
			<th style="background-color: #87d4ed; border: 1px solid black;">Audit Status</th>
		</tr>
	</thead>
	<tbody>
		@for($index = 0; $index < count($tuvs); $index++)
			<tr>
				@php
					$audit_category = 'ISO9001 / IATF16949';

					if($tuvs[$index]->audit_category == 2){
						$audit_category = 'ISO14001';
					}
				@endphp
				<td>{{ $audit_category }}</td>
				<td>{{ $tuvs[$index]->purpose_of_audit }}</td>
				<td>{{ $tuvs[$index]->classification }}</td>
				<td>{{ $tuvs[$index]->standard_clause }}</td>
				<td>{{ \Carbon\Carbon::parse($tuvs[$index]->audit_date_from)->toFormattedDateString() }} - {{ \Carbon\Carbon::parse($tuvs[$index]->audit_date_to)->toFormattedDateString() }}</td>
				<td>{{ $tuvs[$index]->auditors }}</td>
				@if($tuvs[$index]->deadline_for_submission != "")
					<td>{{ \Carbon\Carbon::parse($tuvs[$index]->deadline_for_submission)->toFormattedDateString() }}</td>
				@else
					<td></td>
				@endif
				@if($tuvs[$index]->actual_date_of_submission != "")
					<td>{{ \Carbon\Carbon::parse($tuvs[$index]->actual_date_of_submission)->toFormattedDateString() }}</td>
				@else
					<td></td>
				@endif
				<td>
					@for($index2 = 0; $index2 < count($tuvs[$index]->tuv_departments); $index2++)
						{{ $tuvs[$index]->tuv_departments[$index2]->departments[0]->department_name }}
						@if($index2 <= (count($tuvs[$index]->tuv_departments) - 2))
							, 
						@endif
					@endfor
				</td>
				<td>{!! nl2br($tuvs[$index]->statement_of_nc) !!}</td>
				<td>{{ $tuvs[$index]->objective_evidence }}</td>
				<td>{{ $tuvs[$index]->root_cause_analysis }}</td>
				<td>{{ $tuvs[$index]->correction }}</td>
				@if($tuvs[$index]->tuv_corr_per_in_charges != null)
					<td>
					@for($index2 = 0; $index2 < count($tuvs[$index]->tuv_corr_per_in_charges); $index2++)
						{{ $tuvs[$index]->tuv_corr_per_in_charges[$index2]->tuv_corr_per_in_charge_record->name }}
							@if(($index2 + 1) < count($tuvs[$index]->tuv_corr_per_in_charges))
								 / 
							@endif
					@endfor
					</td>
				@else
					<td>N/A</td>
				@endif
				@if($tuvs[$index]->correction_commitment_date != "")
					<td>{{ \Carbon\Carbon::parse($tuvs[$index]->correction_commitment_date)->toFormattedDateString() }}</td>
				@else
					<td></td>
				@endif
				<td>{{ $tuvs[$index]->containment }}</td>
				@if($tuvs[$index]->tuv_con_per_in_charges != null)
					<td>
					@for($index2 = 0; $index2 < count($tuvs[$index]->tuv_con_per_in_charges); $index2++)
						{{ $tuvs[$index]->tuv_con_per_in_charges[$index2]->tuv_con_per_in_charge_record->name }}
							@if(($index2 + 1) < count($tuvs[$index]->tuv_con_per_in_charges))
								 / 
							@endif
					@endfor
					</td>
				@else
					<td>N/A</td>
				@endif
				@if($tuvs[$index]->containment_commitment_date != "")
					<td>{{ \Carbon\Carbon::parse($tuvs[$index]->containment_commitment_date)->toFormattedDateString() }}</td>
				@else
					<td></td>
				@endif
				<td>{{ $tuvs[$index]->systematic }}</td>
				@if($tuvs[$index]->tuv_sys_per_in_charges != null)
					<td>
					@for($index2 = 0; $index2 < count($tuvs[$index]->tuv_sys_per_in_charges); $index2++)
						{{ $tuvs[$index]->tuv_sys_per_in_charges[$index2]->tuv_sys_per_in_charge_record->name }}
							@if(($index2 + 1) < count($tuvs[$index]->tuv_sys_per_in_charges))
								 / 
							@endif
					@endfor
					</td>
				@else
					<td>N/A</td>
				@endif
				@if($tuvs[$index]->systematic_commitment_date != "")
					<td>{{ \Carbon\Carbon::parse($tuvs[$index]->systematic_commitment_date)->toFormattedDateString() }}</td>
				@else
					<td></td>
				@endif
				<td>{{ $tuvs[$index]->corrective_action }}</td>
				@if($tuvs[$index]->sending_stat == 1)
					<td>Pending</td>
				@else
					<td>Done</td>
				@endif

				@if($tuvs[$index]->audit_stat == 1)
					<td>For Improvement Plan</td>
				@elseif($tuvs[$index]->audit_stat == 2)
					<td>For Close-Out Audit</td>
				@else
					<td>Closed</td>
				@endif
			</tr>
		@endfor
	</tbody>
</table>