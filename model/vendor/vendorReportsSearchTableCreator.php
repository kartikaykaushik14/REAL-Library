<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$vendorDetailsSearchSql = 'SELECT * FROM authors';
	$vendorDetailsSearchStatement = $conn->prepare($vendorDetailsSearchSql);
	$vendorDetailsSearchStatement->execute();

	$output = '<table id="vendorReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th>Author ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Flat No.</th>
						<th>Street Address</th>
						<th>City</th>
						<th>State</th>
						<th>Zipcode</th>
						<th>Email Address</th>
					</tr>
				</thead>
				<tbody>';
	
	// Create table rows from the selected data
	while($row = $vendorDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		$output .= '<tr>' .
						'<td>' . $row['author_id'] . '</td>' .
						'<td>' . $row['auth_fname'] . '</td>' .
						'<td>' . $row['auth_lname'] . '</td>' .
						'<td>' . $row['auth_flat_no'] . '</td>' .
						'<td>' . $row['auth_stadd'] . '</td>' .
						'<td>' . $row['auth_city'] . '</td>' .
						'<td>' . $row['auth_state'] . '</td>' .
						'<td>' . $row['auth_zipcode'] . '</td>' .
						'<td>' . $row['auth_email_add'] . '</td>' .
					'</tr>';
	}
	
	$vendorDetailsSearchStatement->closeCursor();
	
	$output .= '</tbody>
					<tfoot>
						<tr>
						<th>Author ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Flat No.</th>
						<th>Street Address</th>
						<th>City</th>
						<th>State</th>
						<th>Zipcode</th>
						<th>Email Address</th>
					
						</tr>
					</tfoot>
				</table>';
	echo $output;
?>