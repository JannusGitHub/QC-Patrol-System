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
			<th><b><span>PRICON MICROELECTRONICS, INC.</span></b></th>
		</tr>

		<tr>
			<th><b><span>Operations Division</span></b></th>
		</tr>


		<tr>
			<th colspan="12" rowspan="2" style="text-align: center; font-size: 20px; border-top: 1px solid black; border-right: 1px solid black"><b><span>QC Patrol check sheet (Layered Process Audit - LPA)</span></b></th>
		</tr>
		<tr>
			<th colspan="12" style="border-right: 1px solid black"></th>
		</tr>
		<tr>
			<th colspan="2" style="width: 10%; text-align: left;"><b>Line / Area: </b></th>
			<th colspan="4" style="text-align: left; border-bottom: 1px solid black">: YF_Prepro_IQC_Maintenance_FOL_IPQC_QC_Patrol</th>
			<th colspan="6" style="border-right: 1px solid black"></th>
		</tr>
		<tr>
			<th colspan="2" style="width: 20%; text-align: left;"><b>Audit Date:</b></th>
			<th colspan="2" style="width: 20%; text-align: left; border-bottom: 1px solid black;"><?php echo e(\Carbon\Carbon::parse($data->audit_date)->isoFormat('ll')); ?></th>
			<th colspan="8" style="border-right: 1px solid black"></th>
		</tr>
		<tr>
			<th colspan="12" style="border-right: 1px solid black"></th>
		</tr>
		<tr>
			<th colspan="1" style="width: 20%; text-align: left;"><b>Legend:</b></th>
			<th colspan="3" style="width: 20%; text-align: left;">√ =  COMPLIED</th>
			<th colspan="3" style="width: 20%; text-align: left;">X = NOT COMPLIED</th>
			<th colspan="5" style="width: 20%; text-align: left; border-right: 1px solid black">N/A = NOT APPLICABLE</th>
		</tr>
		<tr>
			<th colspan="12" style="border-right: 1px solid black"></th>
		</tr>
		<tr style="text-align: center; border: 1px solid black">
			<th rowspan="2" colspan="10"  style="text-align: center; border: 1px solid black"><b>CHECK ITEMS</b></th>
			<th rowspan="1" colspan="2"  style="text-align: center; border: 1px solid black"><b>AUDIT RESULT</b></th>
		</tr>
		<tr>
			<th rowspan="1" colspan="1" style="text-align: center; border: 1px solid black">√ or X</th>
			<th rowspan="1" colspan="1" style="text-align: center; border: 1px solid black"><b>REMARKS</b></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th colspan="10" style="border: 1px solid black"><b>FACTOR: MAN</b></th>
			<th colspan="1" style="border: 1px solid black"></th>
			<th colspan="1" style="border: 1px solid black"></th>
		</tr>
		<tr>
			<th colspan="10" style="border: 1px solid black"><b>Layer 1 Questions:</b></th>
			<th colspan="1" style="border: 1px solid black"></th>
			<th colspan="1" style="border: 1px solid black"></th>
		</tr>


			<?php if($data->ar_finding_details != null): ?>{
				<?php for($index = 0; $index < count($factor_item_list); $index++): ?>{
					<tr>
						<td	d colspan="10" style="border: 1px solid black; word-wrap: break-word;"><?php echo e($factor_item_list[$index]->name); ?></td>
							<?php
								$isChecked = '√';
								$referToQCPatrol = '';
								$bgColor = 'background-color: none';
							?>
							<?php for($j = 0; $j < count($data->ar_finding_details); $j++): ?>
								<?php if($data->ar_finding_details[$j]->factor_item_list_id == $factor_item_list[$index]->id): ?>
									<?php
										$isChecked = 'X';
										$referToQCPatrol = 'Refer to QC Patrol Result';
										$bgColor = 'background-color: yellow';
									?>
								<?php endif; ?>
							<?php endfor; ?>

							<?php if($factor_item_list[$index]->id == '92' || $factor_item_list[$index]->id == '65' || $factor_item_list[$index]->id == '68' || $factor_item_list[$index]->id == '73'): ?>
								<?php
									$isChecked = '';
									$referToQCPatrol = '';
									$bgColor = 'background-color: none';
								?>
								<td colspan="1" style="border: 1px solid black; text-align: center; <?php echo e($bgColor); ?>"><?php echo e($isChecked); ?></td>
								<td colspan="1" style="border: 1px solid black; text-align: center; width: 25%; <?php echo e($bgColor); ?>"><?php echo e($referToQCPatrol); ?></td> <!-- Refer to QC Patrol Result -->
							<?php else: ?>
								<td colspan="1" style="border: 1px solid black; text-align: center; <?php echo e($bgColor); ?>"><?php echo e($isChecked); ?></td>
								<td colspan="1" style="border: 1px solid black; text-align: center; width: 25%; <?php echo e($bgColor); ?>"><?php echo e($referToQCPatrol); ?></td> <!-- Refer to QC Patrol Result -->
							<?php endif; ?>

					</tr>
				<?php endfor; ?>
			<?php endif; ?>
					
		
	</tbody>
</table><?php /**PATH /var/www/qc_patrol_new/resources/views/exports/lpa_man.blade.php ENDPATH**/ ?>