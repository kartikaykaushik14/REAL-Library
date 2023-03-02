<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$uPrice = 0;
	$qty = 0;
	$totalPrice = 0;
	
	$saleDetailsSearchSql = 'SELECT * FROM payments';
	$saleDetailsSearchStatement = $conn->prepare($saleDetailsSearchSql);
	$saleDetailsSearchStatement->execute();

	$output = '<table id="saleReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
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
	while($row = $saleDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		
		$output .= '<tr>' .
						'<td>' . $row['invoice_id'] . '</td>' .
						'<td>' . $row['payment_id'] . '</td>' .
						'<td>' . $row['payment_date'] . '</td>' .
						'<td>' . $row['payment_amount'] . '</td>' .
					'</tr>';
	}
	
	$saleDetailsSearchStatement->closeCursor();
	
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
?>


