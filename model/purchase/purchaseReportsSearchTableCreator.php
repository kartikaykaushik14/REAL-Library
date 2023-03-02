<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$uPrice = 0;
	$qty = 0;
	$totalPrice = 0;
	
	$purchaseDetailsSearchSql = 'SELECT * FROM rentals';
	$purchaseDetailsSearchStatement = $conn->prepare($purchaseDetailsSearchSql);
	$purchaseDetailsSearchStatement->execute();

	$output = '<table id="purchaseReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th>Copy Borrow Date Time</th>
						<th>Expected Return Date</th>
						<th>Actual Return Date</th>
						<th>Rental Status</th>
						<th>Copy ID</th>
						<th>Customer ID</th>
					</tr>
				</thead>
				<tbody>';
	
	// Create table rows from the selected data
	while($row = $purchaseDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		
		
		$output .= '<tr>' .
						'<td>' . $row['borrow_dttime'] . '</td>' .
						'<td>' . $row['exp_ret_date'] . '</td>' .
						'<td>' . $row['act_ret_date'] . '</td>' .
						'<td>' . $row['rental_status'] . '</td>' .
						'<td>' . $row['copy_id'] . '</td>' .
						'<td>' . $row['cust_id'] . '</td>' .
					'</tr>';
	}
	
	$purchaseDetailsSearchStatement->closeCursor();
	
	$output .= '</tbody>
					<tfoot>
						<tr>
						<th>Copy Borrow Date Time</th>
						<th>Expected Return Date</th>
						<th>Actual Return Date</th>
						<th>Rental Status</th>
						<th>Copy ID</th>
						<th>Customer ID</th>
					</tr>
					</tfoot>
				</table>';
	echo $output;
?>


