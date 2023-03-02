<?php
	echo "<script>alert('updateItem.php')</script>";

	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	// Check if the POST query is received
	if(isset($_POST['bookDetailsbookId'])) {
		
		$bookId =(integer)  htmlentities($_POST['bookDetailsbookId']);
		$bookName = htmlentities($_POST['bookDetailsbookName']);
		$status = htmlentities($_POST['bookDetailsStatus']);
		$description = htmlentities($_POST['bookDetailsDescription']);
		$bookTopic = (integer) htmlentities($_POST['bookTopic']);
		$bookAuthor = htmlentities($_POST['bookAuthor']);
		
		
		// Check if mandatory fields are not empty
		if(!empty($bookId) && !empty($bookName) && !empty($bookAuthor) && !empty($bookTopic)){
			echo "<script>alert('pdate.php')</script>";
			
			// Sanitize item number
			$bookId = filter_var($bookId, FILTER_SANITIZE_STRING);
			
			try{
		
			// Construct the UPDATE query
			$updateItemDetailsSql = 'UPDATE books SET book_id = :bookID, book_name = :bookName, topic_id = :bookTopic WHERE book_id = :bookId';
			$updateItemDetailsStatement = $conn->prepare($updateItemDetailsSql);
			$updateItemDetailsStatement->execute(['bookId' => $bookId, 'bookName' => $bookName, 'bookTopic' => $bookTopic]);
			
			$successAlert = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Item details updated.</div>';

			$updateBookAuthSql = 'Update book_auth SET book_id =:bookId , author_id = :bookAuthor)  WHERE book_id = :bookId';
			$updatebookAuthStatement = $conn->prepare($updateBookAuthSql);
			$updatebookAuthStatement->execute(['bookId' => $bookId, 'bookAuthor' => $bookAuthor]);
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>bookauth added to database.</div>';

			$data = ['alertMessage' => $successAlert, 'newStock' => $newStock];
			echo json_encode($data);
			}
			catch(Exception $e) {
				echo "<script>alert('FAILED')</script>";
				}

			exit();
			
		} else {
			// One or more mandatory fields are empty. Therefore, display the error message
			$errorAlert = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter all fields marked with a (*)</div>';
			$data = ['alertMessage' => $errorAlert];
			echo json_encode($data);
			exit();
		}
	}
?>