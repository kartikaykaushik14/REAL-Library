<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$customerDetailsSearchSql = 'SELECT * FROM customers';
	$customerDetailsSearchStatement = $conn->prepare($customerDetailsSearchSql);
	$customerDetailsSearchStatement->execute();

	$output = '<table id="customerReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th>Customer ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone Number</th>
						<th>Email ID</th>
						<th>Identification Type</th>
						<th>Identification Number</th>
					</tr>
				</thead>
				<tbody>';
	
	// Create table rows from the selected data
	while($row = $customerDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		$output .= '<tr>' .
						'<td>' . $row['cust_id'] . '</td>' .
						'<td>' . $row['cust_fname'] . '</td>' .
						'<td>' . $row['cust_lname'] . '</td>' .
						'<td>' . $row['cust_phone'] . '</td>' .
						'<td>' . $row['cust_email'] . '</td>' .
						'<td>' . $row['identific_type'] . '</td>' .
						'<td>' . $row['identific_num'] . '</td>' .
					'</tr>';
	}
	
	$customerDetailsSearchStatement->closeCursor();
	
	$output .= '</tbody>
					<tfoot>
						<tr>
						<th>Customer ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone Number</th>
						<th>Email ID</th>
						<th>Identification Type</th>
						<th>Identification Number</th>
					</tr>
					</tfoot>
				</table>';
	echo $output;
?>