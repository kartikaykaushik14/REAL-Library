<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
//	alert($custId);
	//if(isset($_POST['invoicecustId'])){
		//$custId = (integer) htmlentities($_POST['invoicecustId']);
		
		$invoicesDetailsSearchSql = 'SELECT * FROM invoices';
		$invoicesDetailsSearchStatement = $conn->prepare($invoicesDetailsSearchSql);
		$invoicesDetailsSearchStatement->execute();

		$output = '<table id="invoicesDetailsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th>Invoice ID</th>
							<th>Invoice Date</th>
							<th>Invoice amount</th>
							<th>Borrow Date Time</th>
							<th>Copy ID</th>
							<th>Customer ID</th>
						</tr>
					</thead>
					<tbody>';
		
		// Create table rows from the selected data
		$row = $invoicesDetailsSearchStatement->fetch();
			
		$output .= '<tr>' .
						'<td>' . $row['invoice_id'] . '</td>' .
						'<td>' . $row['invoice_date'] . '</td>' .
						'<td>' . $row['invoice_amt'] . '</td>' .
						'<td>' . $row['borrow_dttime'] . '</td>' .
						'<td>' . $row['copy_id'] . '</td>' .
						'<td>' . $row['cust_id'] . '</td>' .
					'</tr>';
		// }
		
		$invoicesDetailsSearchStatement->closeCursor();
		
		$output .= '</tbody>
						<tfoot>
						<tr>
							<th>Invoice ID</th>
							<th>Invoice Date</th>
							<th>Invoice amount</th>
							<th>Borrow Date Time</th>
							<th>Copy ID</th>
							<th>Customer ID</th>
						</tr>
						</tfoot>
					</table>';
		echo $output;
	//}
?>


