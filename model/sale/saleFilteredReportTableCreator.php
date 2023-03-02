<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$uPrice = 0;
	$qty = 0;
	$totalPrice = 0;
	
	if(isset($_POST['startDate'])){
		$startDate = htmlentities($_POST['startDate']);
		$endDate = htmlentities($_POST['endDate']);
		
		$saleFilteredReportSql = 'SELECT * FROM payments WHERE saleDate BETWEEN :startDate AND :endDate';
		$saleFilteredReportStatement = $conn->prepare($saleFilteredReportSql);
		$saleFilteredReportStatement->execute(['startDate' => $startDate, 'endDate' => $endDate]);

		$output = '<table id="saleFilteredReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
						<th>Invoice ID</th>
						<th>Payment ID</th>
						<th>Payment Date</th>
						<th>Payment Amount</th>
					</tr>
					</thead>
					<tbody>';
		
		// Create table rows from the selected data
		while($row = $saleFilteredReportStatement->fetch(PDO::FETCH_ASSOC)){
		
			$output .= '<tr>' .
							'<td>' . $row['invoice_id'] . '</td>' .
						'<td>' . $row['payment_id'] . '</td>' .
						'<td>' . $row['payment_date'] . '</td>' .
						'<td>' . $row['payment_amount'] . '</td>' .
						'</tr>';
		}
		
		$saleFilteredReportStatement->closeCursor();
		
		$output .= '</tbody>
						<tfoot>
							<tr>
						<th>Invoice ID</th>
						<th>Payment ID</th>
						<th>Payment Date</th>
						<th>Payment Amount</th>
					</tr>
						</tfoot>
					</table>';
		echo $output;
	}
?>


