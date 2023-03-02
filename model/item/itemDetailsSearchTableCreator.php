<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$itemDetailsSearchSql = 'SELECT * FROM books';
	$itemDetailsSearchStatement = $conn->prepare($itemDetailsSearchSql);
	$itemDetailsSearchStatement->execute();
	
	$output = '<table id="itemDetailsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th>Book ID</th>
						<th>Book Name</th>
						<th>Description</th>
						<th>Topic ID</th>
					</tr>
				</thead>
				<tbody>';
	
	// Create table rows from the selected data
	while($row = $itemDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		
		$output .= '<tr>' .
						'<td>' . $row['book_id'] . '</td>' .
						'<td>' . $row['book_name'] . '</td>' .
						'<td>' . $row['book_dec'] . '</td>' .
						'<td>' . $row['topic_id'] . '</td>' .
					'</tr>';
	}
	
	$itemDetailsSearchStatement->closeCursor();
	
	$output .= '</tbody>
					<tfoot>
						<tr>
							<th>Book ID</th>
							<th>Book Name</th>
							<th>Description</th>
							<th>Topic ID</th>
						</tr>
					</tfoot>
				</table>';
	echo $output;
?>