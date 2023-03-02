<?php
	echo "<script>alert('insertITem.php')</script>";
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$initialStock = 0;
	$baseImageFolder = '../../data/book_images/';
	$bookImageFolder = '';
	$temp = $_POST['bookDetailsbookId'];
	if(isset($_POST['bookDetailsbookId'])){
		
		$bookId =(integer)  htmlentities($_POST['bookDetailsbookId']);
		$bookName = htmlentities($_POST['bookDetailsbookName']);
		$status = htmlentities($_POST['bookDetailsStatus']);
		$description = htmlentities($_POST['bookDetailsDescription']);
		$bookTopic = (integer) htmlentities($_POST['bookTopic']);
		$bookAuthor = htmlentities($_POST['bookAuthor']);
		
		// Check if mandatory fields are not empty
		if(!empty($bookId) && !empty($bookName) && !empty($bookAuthor) && !empty($bookTopic)){
			
			// Sanitize book number
			
			$bookId = filter_var($bookId, FILTER_SANITIZE_STRING);
						
			// Create image folder for uploading images
			//$bookImageFolder = $baseImageFolder . $bookId;
			//if(is_dir($bookImageFolder)){
				// Folder already exist. Hence, do nothing
			//} else {
				// Folder does not exist, Hence, create it
				//mkdir($bookImageFolder);
			//}
			
			try{
                $insertbookSql = 'Call secure_insert_book(:bookId, :bookName, :bookTopic, :bookdec)';

// 				$insertbookSql = 'INSERT INTO books(book_id, book_name, book_dec, topic_id) VALUES(:bookId, :bookName, :bookdec, :bookTopic)';
				$insertbookStatement = $conn->prepare($insertbookSql);
				$insertbookStatement->execute(['bookId' => $bookId, 'bookName' => $bookName, 'bookdec' => $description, 'bookTopic' => $bookTopic]);
				
				
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>book added to database.</div>';
				
				$insertBookAuthSql = 'Insert Into book_auth(book_id, author_id) values(:bookId, :bookAuthor)';
				$insertbookAuthStatement = $conn->prepare($insertBookAuthSql);
				$insertbookAuthStatement->execute(['bookId' => $bookId, 'bookAuthor' => $bookAuthor]);
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>bookauth added to database.</div>';
			
			
			}
			catch(Exception $e) {
				echo "<script>alert('FAILED')</script>";
				}

			exit();

		} else {
			// One or more mandatory fields are empty. Therefore, display a the error message
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter all fields marked with a (*)</div>';
			exit();
		}
	}
?>