<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
 
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 11">

<style>

	th,td {
	    padding: 10px;
	}

	td {
	    padding: 5px;
	}

	table, th, td {
	  border: 1px solid black;
	}

</style>

<table style="font-family: Arial; width: 100%;" border="1">
	<thead>
		<tr>
			<th colspan="8"><b><span style="font-size: 28px; float: center;">QC PATROL RESULT (Layered Process Audit - LPA)</span></b><!-- <span style="font-size: 10px; text-align: right; float: right; margin-top: 10px;">Rev7:  March 28, 2019</span> --></th>
			<!-- <th></th> -->
		</tr>
		<tr>
			<th colspan="1" style="width: 10%; text-align: left;"><b>Audit Date: </b></th>
			<th colspan="3" style="width: 40%; text-align: left;"><b><?php echo e(\Carbon\Carbon::parse($data->audit_date)->isoFormat('ll')); ?></b></th>
			<th colspan="4" style="width: 20%; text-align: left;"><b>Issued Date: <?php echo e(\Carbon\Carbon::parse($data->issued_date)->isoFormat('ll')); ?></b></th>
			<!-- <th colspan="2" style="width: 30%; text-align: left;"></th> -->
		</tr>
		<tr>
			<?php
				$col_departments = collect($data->product_line_details)->pluck('product_line_info')->flatten(1)->pluck('name')->flatten(1)->toArray();
				$department = implode(' / ', $col_departments);
			?>
			<th colspan="1" style="width: 10%; text-align: left;"><b>Dep't / Section: </b></th>
			<th colspan="3" style="width: 40%; text-align: left;"><b><?php echo e($department); ?></b></th>
			<th colspan="4" style="width: 20%; text-align: left;"><b>Due Date: <?php echo e(\Carbon\Carbon::parse($data->due_date)->isoFormat('ll')); ?></b></th>
			<!-- <th colspan="2" style="width: 30%; text-align: left;"></th> -->
		</tr>
		<tr>
			<?php
				$col_auditors = collect($data->auditor_details)->pluck('user_info')->flatten(1)->pluck('name')->flatten(1)->toArray();
				$auditor = implode(' / ', $col_auditors);
			?>
			<th colspan="1" style="width: 10%; text-align: left;"><b>Auditors: </b></th>
			<th colspan="3" style="width: 40%; text-align: left;"><b><?php echo e($auditor); ?></b></th>
			<th colspan="4"></th>
		</tr>
		<tr>
			<?php
				$col_auditees = collect($data->auditee_details)->pluck('user_info')->flatten(1)->pluck('name')->flatten(1)->toArray();
				$auditee = implode(' / ', $col_auditees);

				$auditee_manual = '';
		        $arr_auditee_manual = [];

		        if($data->auditee_manual != null){
		            $auditee_text = [
		                'Technician',
		                'QC',
		                'MH',
		                'Operator',
		            ];
		            $exp_auditee_manual = explode(',', $data->auditee_manual);

		            // return $exp_auditee_manual[0] - 1;

		            for($index = 0; $index < count($exp_auditee_manual); $index++){
		                $arr_auditee_manual[] =  $auditee_text[$exp_auditee_manual[$index] - 1];
		            }
		            $auditee_manual = ' / ' . implode(' / ', $arr_auditee_manual);
		        }

			?>
			<th colspan="1" style="width: 10%; text-align: left;"><b>Auditees: </b></th>
			<th colspan="3" style="width: 40%; text-align: left;"><b><?php echo e($auditee); ?> <?php echo e($auditee_manual); ?></b></th>
			<th colspan="4" style="width: 50%; text-align: left; color: red;"><b><span style="color: red;">FACTOR: Man / Machine / Method / Material / Flow of non-conforming</span></b></th>
		</tr>
		<tr>
			<th colspan="8" style="width: 50%; text-align: left;"><b>COMMENDATION: </b></th>
		</tr>
		<tr>
			<th colspan="8" style="width: 50%; height: 70px;"><?php echo nl2br(e($data->commendation)); ?></th>
		</tr>

		<tr>
			<th colspan="8"><br></th>
		</tr>

		<tr>
			<th style="background-color: #cc9ccc; border: 1px solid black;"><b>No.</b></th>
			<th style="background-color: #cc9ccc; border: 1px solid black;"><b><span>Process / Station / <br>classification by phenomenon</b></th>
			<th style="background-color: #cc9ccc; border: 1px solid black;"><b>Statement of Finding(s)</b></th>
			<th style="background-color: #cc9ccc; border: 1px solid black;"><b>Actual Illustration</b></th>
			<th style="background-color: #cc9ccc; border: 1px solid black;"><b>In-charge</b></th>
			<th style="background-color: #cc9ccc; border: 1px solid black;"><b>Countermeasures</b></th>
			<th style="background-color: #cc9ccc; border: 1px solid black;"><b>Commitment Date</b></th>
			<th style="background-color: #cc9ccc; border: 1px solid black;"><b>Close-out Audit Result 
				<!-- <br /> <?php echo e(\Carbon\Carbon::parse($data->due_date)->isoFormat('ll')); ?> -->
			</b></th>
		</tr>
	</thead>
	<tbody>
		<?php for($index = 0; $index < count($data->ar_finding_details); $index++): ?>
			<tr>
				<th style="border: 1px solid black;"><center><?php echo e($data->ar_finding_details[$index]->no); ?></center></th>
				<th style="border: 1px solid black;"><?php echo e($data->ar_finding_details[$index]->station); ?> / <br /> <?php echo e($data->ar_finding_details[$index]->classification_info->name); ?></th>
				<th style="border: 1px solid black;">
                	<?php echo e(explode(' ', $data->ar_finding_details[$index]->factor_item_list_info->name)[0]); ?> <?php echo e(explode(' ', $data->ar_finding_details[$index]->factor_item_list_info->name)[1]); ?> 
                	<b>(<?php echo e($data->ar_finding_details[$index]->factor_info->name); ?>)</b><br>
					<?php echo nl2br(e($data->ar_finding_details[$index]->statement_of_findings)); ?>

				</th>

				
				<?php
					// $path = '';
					// $result = '';
					// if($data->ar_finding_details[$index]->actual_illustration != '' || $data->ar_finding_details[$index]->actual_illustration != null){
					// 	$exploded_arr_actual_illustration = explode(', ', $data->ar_finding_details[$index]->actual_illustration);
					// 	foreach ($exploded_arr_actual_illustration as $single_actual_illustration) {
					// 		$path = 'public/storage/images/actual_illustration/' . $data->ar_finding_details[$index]->actual_illustration;
					// 		$result .= '<center><img src="'. $path. '" style="max-width: 20px !important; max-height: 20px !important; min-width: 10px !important; min-height: 10px !important; width: 15px !important;" class="commonAuditImg"></center>';
					// 	}
	                    
	                // }
	                // else{
	                //     // $path = 'public/storage/image-icon.png';
	                // }
	            ?>

				<td style="border: 1px solid black;">
					
					
					
				</td>

				<?php
					$col_in_charges = collect($data->ar_finding_details[$index]->in_charge_details)->pluck('user_info')->flatten(1)->pluck('name')->flatten(1)->toArray();
					$in_charge = implode(' / ', $col_in_charges);
				?>

				<th style="border: 1px solid black;"><?php echo e($in_charge); ?></th>
				<th style="border: 1px solid black;"><?php echo e($data->ar_finding_details[$index]->counter_measures); ?></th>
				<th style="border: 1px solid black;"><?php echo e($data->ar_finding_details[$index]->commitment_date); ?></th>
				<?php
					if($data->ar_finding_details[$index]->close_out_image != '' || $data->ar_finding_details[$index]->close_out_image != null){
                        $path = 'public/storage/images/close_out/' . $data->ar_finding_details[$index]->close_out_image;
                    }
                    else{
                        $path = 'public/storage/image-icon.png';
                    }
	            ?>

				<th style="border: 1px solid black;">
					<?php echo e($data->ar_finding_details[$index]->close_out); ?>

					<!-- <center><img src="<?php echo e($path); ?>" style="max-width: 100px; max-height: 100px; min-width: 20px; min-height: 20px;" class="commonAuditImg"></center> -->
				</th>
			</tr>
		<?php endfor; ?>
	</tbody>
</table><?php /**PATH /var/www/qc_patrol_new/resources/views/exports/audit_results.blade.php ENDPATH**/ ?>