<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		label {
			font-size: 14px;
			font-weight: bold;
			font-family: Arial;
		}
		table, th, td {
		  	border: 1px solid black;
		  	border-collapse: collapse;
		}
	</style>
</head>
<body>

	<!-- <h1 style="text-align: center;">THIS IS A SYSTEM GENERATED EMAIL FROM QUALITY ASSURANCE DATABASE SYSTEM (QUADS), PLEASE DO NOT REPLY. THANK YOU!</h1> -->
	<label>
	Dear, {{ $department_name }}
	</label> <br><br>
	<label>Good day!</label> <br><br>
	<label>TUV Audit</label><br><br>

	<?php
		$collect_for_improvement_plan = collect($tuvs)->where('audit_stat', 1)->flatten(1);
		$collect_for_close_out = collect($tuvs)->where('audit_stat', 2)->flatten(1);
		$collect_closed = collect($tuvs)->where('audit_stat', 3)->flatten(1);
	?>

	@if(count($collect_for_improvement_plan) > 0)
		<label style="text-align: center;">For Improvement Plan</label>
		<table border="1">
			<thead>
				<th>No.</th>
				<th>Audit Category</th>
				<th>Purpose Of Audit</th>
				<th>Responsible Dep't</th>
				<th>Deadline of Submission</th>
				<th>Statement of NC</th>
				<th>Objective Evidence</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($collect_for_improvement_plan); $index++)
					<tr>
						<td>{{ $collect_for_improvement_plan[$index]->tuv_audit_id }}</td>
						<td>{{ $collect_for_improvement_plan[$index]->audit_category }}</td>
						<td>{{ $collect_for_improvement_plan[$index]->purpose_of_audit }}</td>
						<td>
							@for($index2 = 0; $index2 < count($collect_for_improvement_plan[$index]->tuv_departments); $index2++)
								{{ $collect_for_improvement_plan[$index]->tuv_departments[$index2]->departments[0]->department_name }}
								@if($index2 <= (count($collect_for_improvement_plan[$index]->tuv_departments) - 2))
									, 
								@endif
							@endfor
						</td>
						<td>{{ $collect_for_improvement_plan[$index]->deadline_for_submission }}</td>
						<td>{{ $collect_for_improvement_plan[$index]->statement_of_nc }}</td>
						<td>{{ $collect_for_improvement_plan[$index]->objective_evidence }}</td>
					</tr>
				@endfor
			</tbody>
		</table>
		<br>
		<p>Please generate necessary preventive /corrective/ systemic actions on each highlighted
Opportunities for Improvement/Nonconformity and submit to QAD on or before <u> {{ $collect_for_improvement_plan->max('deadline_for_submission') }} </u></p>
		<p>For our common information</p>
		<p>Please contact QAD if you have questions or concerns</p>
		<br>
	@endif

	@if(count($collect_for_close_out) > 0)
		<label style="text-align: center;">For Close-Out Audit</label>
		<table border="1">
			<thead>
				<th>No.</th>
				<th>Audit Category</th>
				<th>Purpose Of Audit</th>
				<th>Responsible Dep't</th>
				<th>Deadline of Submission</th>
				<th>Statement of NC</th>
				<th>Objective Evidence</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($collect_for_close_out); $index++)
					<tr>
						<td>{{ $collect_for_close_out[$index]->tuv_audit_id }}</td>
						<td>{{ $collect_for_close_out[$index]->audit_category }}</td>
						<td>{{ $collect_for_close_out[$index]->purpose_of_audit }}</td>
						<td>
							@for($index2 = 0; $index2 < count($collect_for_close_out[$index]->tuv_departments); $index2++)
								{{ $collect_for_close_out[$index]->tuv_departments[$index2]->departments[0]->department_name }}
								@if($index2 <= (count($collect_for_close_out[$index]->tuv_departments) - 2))
									, 
								@endif
							@endfor
						</td>
						<td>{{ $collect_for_close_out[$index]->deadline_for_submission }}</td>
						<td>{{ $collect_for_close_out[$index]->statement_of_nc }}</td>
						<td>{{ $collect_for_close_out[$index]->objective_evidence }}</td>
					</tr>
				@endfor
			</tbody>
		</table>
		<br>
		<p>This is a gentle reminder that the implementation of actions is due on 
			<u> {{ $collect_for_close_out->max('commitment_date') }} </u>
		</p>
		<br>
	@endif

	@if(count($collect_closed) > 0)
		<label style="text-align: center;">Closed Audit</label>
		<table border="1">
			<thead>
				<th>No.</th>
				<th>Audit Category</th>
				<th>Purpose Of Audit</th>
				<th>Responsible Dep't</th>
				<th>Deadline of Submission</th>
				<th>Statement of NC</th>
				<th>Objective Evidence</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($collect_closed); $index++)
					<tr>
						<td>{{ $collect_closed[$index]->tuv_audit_id }}</td>
						<td>{{ $collect_closed[$index]->audit_category }}</td>
						<td>{{ $collect_closed[$index]->purpose_of_audit }}</td>
						<td>
							@for($index2 = 0; $index2 < count($collect_closed[$index]->tuv_departments); $index2++)
								{{ $collect_closed[$index]->tuv_departments[$index2]->departments[0]->department_name }}
								@if($index2 <= (count($collect_closed[$index]->tuv_departments) - 2))
									, 
								@endif
							@endfor
						</td>
						<td>{{ $collect_closed[$index]->deadline_for_submission }}</td>
						<td>{{ $collect_closed[$index]->statement_of_nc }}</td>
						<td>{{ $collect_closed[$index]->objective_evidence }}</td>
					</tr>
				@endfor
			</tbody>
		</table>
		<br>
	@endif

	<br>
	<label>Thank you</label><br><br>
	<label>Quality Assurance Department</label>

	<br><br><br>
	<a href="http://rapidx/ARD/open_audit_result/">Audit Result Database System</a>
</body>
</html>
	

