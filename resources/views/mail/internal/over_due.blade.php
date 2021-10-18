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
	@php
		$noOfImpPlan = 0;
		$noOfCloseOut = 0;
		$noOfClosed = 0;

		for($index = 0; $index < count($data); $index++){
			if($data[$index]->audit_stat == 1)
				$noOfImpPlan++;
			else if($data[$index]->audit_stat == 2)
				$noOfCloseOut++;
			else
				$noOfClosed++;
		}

		$noOfImpPlanProcess = 0;
		$noOfImpPlanProduct = 0;
		$noOfImpPlanSystem = 0;

		$noOfCloseOutProcess = 0;
		$noOfCloseOutProduct = 0;
		$noOfCloseOutSystem = 0;

		$noOfClosedProcess = 0;
		$noOfClosedProduct = 0;
		$noOfClosedSystem = 0;


		for($index = 0; $index < count($data); $index++){
			if($data[$index]->audit_stat == 1){
				$noOfImpPlan++;
				if($data[$index]->audit_type == 'Process'){
					$noOfImpPlanProcess++;
				}
				else if($data[$index]->audit_type == 'Product'){
					$noOfImpPlanProduct++;
				}
				else if($data[$index]->audit_type == 'System'){
					$noOfImpPlanSystem++;
				}
			}
			else if($data[$index]->audit_stat == 2){
				$noOfCloseOut++;
				if($data[$index]->audit_type == 'Process'){
					$noOfCloseOutProcess++;
				}
				else if($data[$index]->audit_type == 'Product'){
					$noOfCloseOutProduct++;
				}
				else if($data[$index]->audit_type == 'System'){
					$noOfCloseOutSystem++;
				}
			}
			else{
				$noOfClosed++;
				if($data[$index]->audit_type == 'Process'){
					$noOfClosedProcess++;
				}
				else if($data[$index]->audit_type == 'Product'){
					$noOfClosedProduct++;
				}
				else if($data[$index]->audit_type == 'System'){
					$noOfClosedSystem++;
				}
			}
		}
	@endphp

	<!-- <h1 style="text-align: center;">TEST EMAIL FOR QUADS TESTING, PLEASE DISREGARD THIS EMAIL. THANK YOU</h1> -->
	<label>
	Dear, {{ $department_name }}
	</label> <br><br>
	<label>Good day!</label> <br><br>
	<label>Internal Audit</label><br><br>

	@if($noOfImpPlan > 0)
		@if($noOfImpPlanProcess > 0)
			<label style="text-align: center;">For Improvement Plan (Process Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Deadline of Submission</th>
					<th>Responsible Dep't</th>
					<th>Statement of Findings</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 1 && $data[$index]->audit_type == 'Process')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->deadline_of_submission }}</td>
								<td>
									@for($index2 = 0; $index2 < count($data[$index]->internal_departments); $index2++)
										{{ $data[$index]->internal_departments[$index2]->departments[0]->department_name }}
										@if($index2 <= (count($data[$index]->internal_departments) - 2))
											, 
										@endif
									@endfor
								</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>For Improvement Plan</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif

		@if($noOfImpPlanProduct > 0)
			<label style="text-align: center;">For Improvement Plan (Product Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Deadline of Submission</th>
					<th>Responsible Dep't</th>
					<th>Statement of Findings</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 1 && $data[$index]->audit_type == 'Product')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->deadline_of_submission }}</td>
								<td>
									@for($index2 = 0; $index2 < count($data[$index]->internal_departments); $index2++)
										{{ $data[$index]->internal_departments[$index2]->departments[0]->department_name }}
										@if($index2 <= (count($data[$index]->internal_departments) - 2))
											, 
										@endif
									@endfor
								</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>For Improvement Plan</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif

		@if($noOfImpPlanSystem > 0)
			<label style="text-align: center;">For Improvement Plan (System Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Deadline of Submission</th>
					<th>Responsible Dep't</th>
					<th>Statement of Findings</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 1 && $data[$index]->audit_type == 'System')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->deadline_of_submission }}</td>
								<td>
									@for($index2 = 0; $index2 < count($data[$index]->internal_departments); $index2++)
										{{ $data[$index]->internal_departments[$index2]->departments[0]->department_name }}
										@if($index2 <= (count($data[$index]->internal_departments) - 2))
											, 
										@endif
									@endfor
								</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>For Improvement Plan</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif
		<br>
		<p>Please generate necessary preventive /corrective/ systemic actions on each highlighted
Opportunities for Improvement/Nonconformity and submit to QAD on or before <u>{{ $data[count($data) - 1]->deadline_of_submission }}</u></p>
		<p>For our common information</p>
		<p>Please contact QAD if you have questions or concerns</p>
		<br>
	@endif

	@if($noOfCloseOut > 0)
		@if($noOfCloseOutProcess > 0)
			<label style="text-align: center;">For Close-Out Audit (Process Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Statement of Findings</th>
					<th>Improvement Plan</th>
					<th>Person In-charge</th>
					<th>Commitment Date</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 2 && $data[$index]->audit_type == 'Process')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>{{ $data[$index]->improvement_action }}</td>

								<td>
				                    @for($index2 = 0; $index2 < count($data[$index]->person_in_charges); $index2++)
				                        @if(count($data[$index]->person_in_charges) > 0)
				                            @isset($data[$index]->person_in_charges[$index2]->person_in_charge_record->name)
				                                {{ $data[$index]->person_in_charges[$index2]->person_in_charge_record->name }}
				                            @endisset
				                            @if($index2 <= (count($data[$index]->person_in_charges) - 2))
				                                , 
				                            @endif
				                        @endif
				                    @endfor
				                </td>
								<td>{{ $data[$index]->commitment_date }}</td>
								<td>For Close-Out Audit</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif

		@if($noOfCloseOutProduct > 0)
			<label style="text-align: center;">For Close-Out Audit (Product Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Statement of Findings</th>
					<th>Improvement Plan</th>
					<th>Person In-charge</th>
					<th>Commitment Date</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 2 && $data[$index]->audit_type == 'Product')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>{{ $data[$index]->improvement_action }}</td>
								<td>{{ $data[$index]->person_in_charge_record->name }}</td>
								<td>{{ $data[$index]->commitment_date }}</td>
								<td>For Close-Out Audit</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif

		@if($noOfCloseOutSystem > 0)
			<label style="text-align: center;">For Close-Out Audit (System Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Statement of Findings</th>
					<th>Improvement Plan</th>
					<th>Person In-charge</th>
					<th>Commitment Date</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 2 && $data[$index]->audit_type == 'System')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>{{ $data[$index]->improvement_action }}</td>
								<td>{{ $data[$index]->person_in_charge_record->name }}</td>
								<td>{{ $data[$index]->commitment_date }}</td>
								<td>For Close-Out Audit</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif

		<br>
		<p>This is a gentle reminder that the implementation of actions is due on 
			<u>
				@for($index = (count($data) - 1); $index >= 0; $index--)
					@if($data[$index]->audit_stat == 2)
					 	{{ $data[$index]->commitment_date }}
						@break;
					@endif
				@endfor
			</u>
		</p>
		<br>
	@endif

	@if($noOfClosed > 0)
		@if($noOfClosedProcess > 0)
			<label style="text-align: center;">Closed Audit (Process Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Statement of Findings</th>
					<th>Improvement Plan</th>
					<th>Person In-charge</th>
					<th>Commitment Date</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 3  && $data[$index]->audit_type == 'Process')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>{{ $data[$index]->improvement_action }}</td>
								<td>{{ $data[$index]->person_in_charge_record->name }}</td>
								<td>{{ $data[$index]->commitment_date }}</td>
								<td>For Close-Out Audit</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif

		@if($noOfClosedProduct > 0)
			<label style="text-align: center;">Closed Audit (Product Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Statement of Findings</th>
					<th>Improvement Plan</th>
					<th>Person In-charge</th>
					<th>Commitment Date</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 3  && $data[$index]->audit_type == 'Product')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>{{ $data[$index]->improvement_action }}</td>
								<td>{{ $data[$index]->person_in_charge_record->name }}</td>
								<td>{{ $data[$index]->commitment_date }}</td>
								<td>For Close-Out Audit</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif

		@if($noOfClosedSystem > 0)
			<label style="text-align: center;">Closed Audit (System Audit)</label>
			<table border="1">
				<thead>
					<th>Audit Type</th>
					<th>Audit Date</th>
					<th>Business Process</th>
					<th>Audit Report Control No.</th>
					<th>Issued Date</th>
					<th>Statement of Findings</th>
					<th>Improvement Plan</th>
					<th>Person In-charge</th>
					<th>Commitment Date</th>
					<th>Audit Status</th>
				</thead>
				<tbody>
					@for($index = 0; $index < count($data); $index++)
						@if($data[$index]->audit_stat == 3  && $data[$index]->audit_type == 'System')
							<tr>
								<td>{{ $data[$index]->audit_type }}</td>
								<td>{{ $data[$index]->audit_date_from }} to {{ $data[$index]->audit_date_to }}</td>
								<td>{{ $data[$index]->business_process }}</td>
								<td>{{ $data[$index]->audit_report_control_no }}</td>
								<td>{{ $data[$index]->audit_findings_issued_date }}</td>
								<td>{{ $data[$index]->statement_of_findings }}</td>
								<td>{{ $data[$index]->improvement_action }}</td>
								<td>{{ $data[$index]->person_in_charge_record->name }}</td>
								<td>{{ $data[$index]->commitment_date }}</td>
								<td>For Close-Out Audit</td>
							</tr>
						@endif
					@endfor
				</tbody>
			</table>
		@endif
		<br>
	@endif

	<br>
	<label>Thank you</label><br><br>
	<label>Quality Assurance Department</label>

	<br><br><br>
	<a href="http://rapidx/ARD/open_audit_result/">Audit Result Database System</a>
</body>
</html>