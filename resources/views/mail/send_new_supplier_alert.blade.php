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

		for($index = 0; $index < count($suppliers); $index++){
			if($suppliers[$index]->audit_stat == 1)
				$noOfImpPlan++;
			else if($suppliers[$index]->audit_stat == 2)
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
	<label>Supplier Audit</label><br><br>

	@if($noOfImpPlan > 0)
		<label style="text-align: center;">For Improvement Plan</label>
		<table border="1">
			<thead>
				<th>Audit Type</th>
				<th>Audit Date</th>
				<th>Supplier Name</th>
				<th>Issued Date</th>
				<th>Deadline of Submission</th>
				<th>Audit Status</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($suppliers); $index++)
					@if($suppliers[$index]->audit_stat == 1)
						<tr>
							<td>{{ $suppliers[$index]->audit_type }}</td>
							<td>{{ $suppliers[$index]->audit_date_from }} to {{ $suppliers[$index]->audit_date_to }}</td>
							<td>{{ $suppliers[$index]->business_process }}</td>
							<td>{{ $suppliers[$index]->audit_findings_issued_date }}</td>
							<td>{{ $suppliers[$index]->deadline_of_submission }}</td>
							<td>For Improvement Plan</td>
						</tr>
					@endif
				@endfor
			</tbody>
		</table>
		<br>
		<p>Please generate necessary preventive /corrective/ systemic actions on each highlighted
Opportunities for Improvement/Nonconformity and submit to QAD on or before <u>{{ $suppliers[count($suppliers) - 1]->deadline_of_submission }}</u></p>
		<p>For our common information</p>
		<p>Please contact QAD if you have questions or concerns</p>
		<br>
	@endif

	@if($noOfCloseOut > 0)
		<label style="text-align: center;">For Close-Out Audit</label>
		<table border="1">
			<thead>
				<th>Audit Type</th>
				<th>Audit Date</th>
				<th>Supplier Name</th>
				<th>Issued Date</th>
				<th>Commitment Date</th>
				<th>Audit Status</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($suppliers); $index++)
					@if($suppliers[$index]->audit_stat == 2)
						<tr>
							<td>{{ $suppliers[$index]->audit_type }}</td>
							<td>{{ $suppliers[$index]->audit_date_from }} to {{ $suppliers[$index]->audit_date_to }}</td>
							<td>{{ $suppliers[$index]->business_process }}</td>
							<td>{{ $suppliers[$index]->audit_findings_issued_date }}</td>
							<td>{{ $suppliers[$index]->commitment_date }}</td>
							<td>For Close-Out Audit</td>
						</tr>
					@endif
				@endfor
			</tbody>
		</table>
		<br>
		<p>This is a gentle reminder that the implementation of actions is due on 
			<u>
				@for($index = (count($suppliers) - 1); $index >= 0; $index--)
					@if($suppliers[$index]->audit_stat == 2)
					 	{{ $suppliers[$index]->commitment_date }}
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
				<th>Audit Type</th>
				<th>Audit Date</th>
				<th>Supplier Name</th>
				<th>Issued Date</th>
				<th>Commitment Date</th>
				<th>Audit Status</th>
			</thead>
			<tbody>
				@for($index = 0; $index < count($suppliers); $index++)
					@if($suppliers[$index]->audit_stat == 3)
						<tr>
							<td>{{ $suppliers[$index]->audit_type }}</td>
							<td>{{ $suppliers[$index]->audit_date_from }} to {{ $suppliers[$index]->audit_date_to }}</td>
							<td>{{ $suppliers[$index]->business_process }}</td>
							<td>{{ $suppliers[$index]->audit_findings_issued_date }}</td>
							<td>{{ $suppliers[$index]->commitment_date }}</td>
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