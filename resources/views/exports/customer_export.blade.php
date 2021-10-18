<table>
	<thead>
		<tr>
			<th colspan="2"></th>
			<th colspan="18">CUSTOMER AUDIT RESULTS REPORTS</th>
		</tr>
		<tr>
            <th style="background-color: #87d4ed; border: 1px solid black;">ID</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Customer Name</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Auditors</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Process</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Evaluation Item</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Rank / Classification</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Audit Date</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Deadline of Submission</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Actual Date of Submission</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Responsible Group</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Responsible Department</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Statement of Findings</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Illustration</th>
            <th style="background-color: #87d4ed; border: 1px solid black;" width="100">Image</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Root Cause</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Improvement Plan</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Commitment Date</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Person In-charge</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Close-Out Audit</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Sending Status</th>
            <th style="background-color: #87d4ed; border: 1px solid black;">Audit Status</th>
		</tr>
	</thead>
	<tbody>
		@for($index = 0; $index < count($customers); $index++)
			<tr>
                <td>{{ $customers[$index]->customer_audit_id }}</td>
				<td>{{ $customers[$index]->customer_name }}</td>
                <td>{{ $customers[$index]->auditors }}</td>
                <td>{{ $customers[$index]->process }}</td>
                <td>{{ $customers[$index]->evaluation_item }}</td>
                <td>{{ $customers[$index]->classification }}</td>
                <td>{{ \Carbon\Carbon::parse($customers[$index]->audit_date_from)->toFormattedDateString() }} - {{ \Carbon\Carbon::parse($customers[$index]->audit_date_to)->toFormattedDateString() }}</td>
                @if($customers[$index]->deadline_of_submission != "")
                    <td>{{ \Carbon\Carbon::parse($customers[$index]->deadline_of_submission)->toFormattedDateString() }}</td>
                @else
                    <td></td>
                @endif
                @if($customers[$index]->actual_date_of_submission != "")
                    <td>{{ \Carbon\Carbon::parse($customers[$index]->actual_date_of_submission)->toFormattedDateString() }}</td>
                @else
                    <td></td>
                @endif
                <td>{{ $customers[$index]->responsible_group }}</td>
                <td>
                    @for($index2 = 0; $index2 < count($customers[$index]->customer_departments); $index2++)
                        {{ $customers[$index]->customer_departments[$index2]->departments[0]->department_name }}
                        @if($index2 <= (count($customers[$index]->customer_departments) - 2))
                            , 
                        @endif
                    @endfor
                </td>
                <td>{{ $customers[$index]->statement_of_findings }}</td>
                <td>{{ $customers[$index]->illustration }}</td>
                @if($customers[$index]->img_illustration != "" || $customers[$index]->img_illustration != null)
                    <th>{{ $customers[$index]->img_illustration }}<img width="100" src="{{ public_path('storage/image-icon.png') }}"></th>
                @else
                    <th><img width="100" src="{{ public_path('storage/image-icon.png') }}"></th>
                @endif
                <td>{{ $customers[$index]->root_cause }}</td>
                <td>{{ $customers[$index]->improvement_plan }}</td>
                @if($customers[$index]->commitment_date != "")
                    <td>{{ \Carbon\Carbon::parse($customers[$index]->commitment_date)->toFormattedDateString() }}</td>
                @else
                    <td></td>
                @endif
                
                <td>
                    @for($index2 = 0; $index2 < count($customers[$index]->person_in_charges); $index2++)
                        @if(count($customers[$index]->person_in_charges) > 0)
                            @isset($customers[$index]->person_in_charges[$index2]->person_in_charge_record->name)
                                {{ $customers[$index]->person_in_charges[$index2]->person_in_charge_record->name }}
                            @endisset
                            @if($index2 <= (count($customers[$index]->person_in_charges) - 2))
                                , 
                            @endif
                        @endif
                    @endfor
                </td>

                <td>{{ $customers[$index]->corrective_action }}</td>
                @if($customers[$index]->sending_stat == 1)
                    <td>Pending</td>
                @else
                    <td>Done</td>
                @endif

                @if($customers[$index]->audit_stat == 1)
                    <td>For Improvement Plan</td>
                @elseif($customers[$index]->audit_stat == 2)
                    <td>For Close-Out Audit</td>
                @else
                    <td>Closed</td>
                @endif		
            </tr>
		@endfor
	</tbody>
</table>