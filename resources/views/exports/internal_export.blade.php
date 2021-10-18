<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <table>
    	<thead>
    		<tr>
    			<th colspan="3"></th>
    			<th colspan="29">INTERNAL AUDIT RESULT REPORTS</th>
    		</tr>
    		<tr>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">ID #</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Audit Type</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Audit Report Control No.</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Item No.</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Business Process</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Audit Date</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Auditors</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Auditees</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Issued Date</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Deadline of Submission</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Actual Date of Submission</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">ISO / IATF Clause</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Category of Findings</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Classification / Rank</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">CPAR Ctrl No.</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Responsible Department</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Statement of Findings</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Illustration</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Root Cause</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Correction</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Person In-charge</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Commitment Date</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Containment</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Person In-charge</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Commitment Date</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Systemic</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Person In-charge</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Commitment Date</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Close-Out Audit</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Sending Status</th>
                <th style="background-color: #87d4ed; border: 1px solid black; max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Audit Status</th>
    		</tr>
    	</thead>
    	<tbody>
    		@for($index = 0; $index < count($internals); $index++)
    			<tr>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->internal_audit_id }} </td>
                    @php
                        $audit_type = 'EMS System';

                        if($internals[$index]->audit_type == 2){
                            $audit_type = 'QMS System';
                        }
                        else if($internals[$index]->audit_type == 3){
                            $audit_type = 'Process';
                        }
                        else if($internals[$index]->audit_type == 4){
                            $audit_type = 'Product';
                        }
                    @endphp
    				<td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $audit_type }} </td>

                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->audit_report_control_no }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->item_no }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->business_process }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">{{ \Carbon\Carbon::parse($internals[$index]->audit_date_from)->toFormattedDateString() }} - {{ \Carbon\Carbon::parse($internals[$index]->audit_date_to)->toFormattedDateString() }}</td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->auditors }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->auditees }} </td>
                    @if($internals[$index]->audit_findings_issued_date != "")
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">{{ \Carbon\Carbon::parse($internals[$index]->audit_findings_issued_date)->toFormattedDateString() }}</td>
                    @else
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"></td>
                    @endif
                    @if($internals[$index]->deadline_of_submission != "")
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">{{ \Carbon\Carbon::parse($internals[$index]->deadline_of_submission)->toFormattedDateString() }}</td>
                    @else
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"></td>
                    @endif
                    @if($internals[$index]->actual_date_of_submission != "")
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">{{ \Carbon\Carbon::parse($internals[$index]->actual_date_of_submission)->toFormattedDateString() }}</td>
                    @else
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"></td>
                    @endif
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->iso_iatf_clause }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->category_of_findings }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->classification }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->nc_control_no }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">
                        @for($index2 = 0; $index2 < count($internals[$index]->internal_departments); $index2++)
                            {{ $internals[$index]->internal_departments[$index2]->departments[0]->department_name }}
                            @if($index2 <= (count($internals[$index]->internal_departments) - 2))
                                , 
                            @endif
                        @endfor
                    </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">{!! nl2br(e($internals[$index]->statement_of_findings)) !!}</td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->illustration }} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->root_cause }} </td>

                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {!! nl2br(e($internals[$index]->correction)) !!} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {!! $internals[$index]->correction_person_in_charge !!} </td>
                    @if($internals[$index]->correction_commitment_date != "" || $internals[$index]->correction_commitment_date != null)
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">{{ \Carbon\Carbon::parse($internals[$index]->correction_commitment_date)->toFormattedDateString() }}</td>
                    @else
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"></td>
                    @endif

                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {!! nl2br(e($internals[$index]->containment)) !!} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {!! $internals[$index]->containment_person_in_charge !!} </td>
                    @if($internals[$index]->containment_commitment_date != "" || $internals[$index]->containment_commitment_date != null)
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">{{ \Carbon\Carbon::parse($internals[$index]->containment_commitment_date)->toFormattedDateString() }}</td>
                    @else
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"></td>
                    @endif

                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {!! nl2br(e($internals[$index]->systemic)) !!} </td>
                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {!! $internals[$index]->systemic_person_in_charge !!} </td>
                    @if($internals[$index]->systemic_commitment_date != "" || $internals[$index]->systemic_commitment_date != null)
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">{{ \Carbon\Carbon::parse($internals[$index]->systemic_commitment_date)->toFormattedDateString() }}</td>
                    @else
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"></td>
                    @endif

                    <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;"> {{ $internals[$index]->corrective_action }} </td>

                    @if($internals[$index]->sending_stat == 1)
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Pending</td>
                    @else
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Done</td>
                    @endif

                    @if($internals[$index]->audit_stat == 1)
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">For Improvement Plan</td>
                    @elseif($internals[$index]->audit_stat == 2)
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">For Close-Out Audit</td>
                    @else
                        <td style="max-width: 50px; padding: 1px 1px; margin: 1px 1px;">Closed</td>
                    @endif  
                </tr>
    		@endfor
    	</tbody>
    </table>

</body>
</html>
