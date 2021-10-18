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

		for($index = 0; $index < count($customers); $index++){
			if($customers[$index]->audit_stat == 1)
				$noOfImpPlan++;
			else if($customers[$index]->audit_stat == 2)
				$noOfCloseOut++;
			else
				$noOfClosed++;
		}
	@endphp

	<!-- <h1 style="text-align: center;">TEST EMAIL FOR QUADS TESTING, PLEASE DISREGARD THIS EMAIL. THANK YOU</h1> -->
	<label>
	Dear, {{ $department_name }}
	</label> <br><br>
	<label>Good day!</label> <br><br>
	<label>Customer Audit</label><br><br>

	@if($noOfImpPlan > 0)
		<label style="text-align: center;">For Improvement Plan</label>
		<table border="1">
			<thead>
				<th>Audit Date</th>
				<th>Customer</th>
				<th>Deadline of Submission</th>
				<th>Responsible Dep't</th>
				<th>Statement of Findings</th>
				<th>Audit Status</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($customers); $index++)
					@if($customers[$index]->audit_stat == 1)
						<tr>
							<td>{{ $customers[$index]->audit_date_from }} to {{ $customers[$index]->audit_date_to }}</td>
							<td>{{ $customers[$index]->customer_name }}</td>
							<td>{{ $customers[$index]->deadline_of_submission }}</td>
							<td>
								@for($index2 = 0; $index2 < count($customers[$index]->customer_departments); $index2++)
									{{ $customers[$index]->customer_departments[$index2]->departments[0]->department_name }}
									@if($index2 <= (count($customers[$index]->customer_departments) - 2))
										, 
									@endif
								@endfor
							</td>
							<td>{{ $customers[$index]->statement_of_findings }}</td>
							<td>For Improvement Plan</td>
						</tr>
					@endif
				@endfor
			</tbody>
		</table>
		<br>
		<p>Please generate necessary preventive /corrective/ systemic actions on each highlighted
Opportunities for Improvement/Nonconformity and submit to QAD on or before <u>{{ $customers[count($customers) - 1]->deadline_of_submission }}</u></p>
		<p>For our common information</p>
		<p>Please contact QAD if you have questions or concerns</p>
		<br>
	@endif

	@if($noOfCloseOut > 0)
		<label style="text-align: center;">For Close-Out Audit</label>
		<table border="1">
			<thead>
				<th>Audit Date</th>
				<th>Customer</th>
				<th>Statement of Findings</th>
				<th>Improvement Plan</th>
				<th>Person In-charge</th>
				<th>Commitment Date</th>
				<th>Audit Status</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($customers); $index++)
					@if($customers[$index]->audit_stat == 2)
						<tr>
							<td>{{ $customers[$index]->audit_date_from }} to {{ $customers[$index]->audit_date_to }}</td>
							<td>{{ $customers[$index]->customer_name }}</td>
							<td>{{ $customers[$index]->statement_of_findings }}</td>
							<td>{{ $customers[$index]->improvement_plan }}</td>
							<td>{{ $customers[$index]->person_in_charge_record->name }}</td>
							<td>{{ $customers[$index]->commitment_date }}</td>
							<td>For Close-Out Audit</td>
						</tr>
					@endif
				@endfor
			</tbody>
		</table>
		<br>
		<p>This is a gentle reminder that the implementation of actions is due on 
			<u>
				@for($index = (count($customers) - 1); $index >= 0; $index--)
					@if($customers[$index]->audit_stat == 2)
					 	{{ $customers[$index]->commitment_date }}
						@break;
					@endif
				@endfor
			</u>
		</p>
		<br>
	@endif

	@if($noOfClosed > 0)
		<label style="text-align: center;">Closed Audit</label>
		<table border="1">
			<thead>
				<th>Audit Date</th>
				<th>Customer</th>
				<th>Statement of Findings</th>
				<th>Improvement Plan</th>
				<th>Person In-charge</th>
				<th>Commitment Date</th>
				<th>Audit Status</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($customers); $index++)
					@if($customers[$index]->audit_stat == 3)
						<tr>
							<td>{{ $customers[$index]->audit_date_from }} to {{ $customers[$index]->audit_date_to }}</td>
							<td>{{ $customers[$index]->customer_name }}</td>
							<td>{{ $customers[$index]->statement_of_findings }}</td>
							<td>{{ $customers[$index]->improvement_plan }}</td>
							<td>{{ $customers[$index]->person_in_charge_record->name }}</td>
							<td>{{ $customers[$index]->commitment_date }}</td>
							<td>Closed Audit</td>
						</tr>
					@endif
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