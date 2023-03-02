<?php
	echo "<script>alert('insert purchase')</script>";
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	$temp = $_POST['purchaseDetailsBookId'];
	echo "<script>alert('$temp')</script>";
	if(isset($_POST['purchaseDetailsBookId'])){

		$bookId = (integer) htmlentities($_POST['purchaseDetailsBookId']);
		$purchaseDetailsPurchaseDate = htmlentities($_POST['purchaseDetailsPurchaseDate']);
		$purchaseDetailsExpectedReturnDate = htmlentities($_POST['purchaseDetailsExpectedReturnDate']);
		$purchaseDetailsActualReturnDate = htmlentities($_POST['purchaseDetailsActualReturnDate']);
		$purchaseDetailsStatus = htmlentities($_POST['purchaseDetailsStatus']);
		$custId = (integer) htmlentities($_POST['purchaseDetailsCustId']);
		
		$initialStock = 0;
		$newStock = 0;
		
		// Check if mandatory fields are not empty
		if(isset($bookId) && isset($purchaseDetailsPurchaseDate) && isset($purchaseDetailsExpectedReturnDate) && isset($purchaseDetailsActualReturnDate) && isset($purchaseDetailsStatus) && isset($custId)){
			
			if($bookId == ''){ 
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter Book Name.</div>';
				exit();
			}
			
			// Check if itemName is empty
			if($purchaseDetailsPurchaseDate == ''){ 
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter Purchase Date .</div>';
				exit();
			}
			
			// Check if quantity is empty
			if($purchaseDetailsActualReturnDate == ''){ 
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter Actual Return Date.</div>';
				exit();
			}
			
			// Check if unit price is empty
			if($purchaseDetailsStatus == ''){ 
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter Status.</div>';
				exit();
			}
			
			// Sanitize item number
			// $bookId = filter_var($bookId, FILTER_SANITIZE_STRING);
			try{
				echo "<script>alert('purchaseDetailsPurchaseDate Id $purchaseDetailsPurchaseDate')</script>";
				$fetchCopyIdSql = "Select copy_id from copies where book_id=:book_id Limit 1";
				$fetchCopyId = $conn->prepare($fetchCopyIdSql);
				$fetchCopyId->execute(['book_id'=>$bookId]);
				$row = $fetchCopyId->fetch();
				$copy_id = $row['copy_id'];
				echo "<script>alert('Copy Id $copy_id')</script>";

				echo "<script>alert('purchaseDetailsPurchaseDate Id $purchaseDetailsPurchaseDate purchaseDetailsExpectedReturnDate $purchaseDetailsExpectedReturnDate purchaseDetailsStatus $purchaseDetailsStatus cust_id $custId copy_id $copy_id')</script>";

				$purchaseInsertionSql = "Insert into rentals (borrow_dttime, exp_ret_date, act_ret_date, rental_status, copy_id, cust_id) values (:borrow_time, :exp_ret_date, :act_ret_date, :rental_status, :copy_id, :cust_id)";
				$purchaseInsertion = $conn->prepare($purchaseInsertionSql);
				$purchaseInsertion->execute(['borrow_time'=> $purchaseDetailsPurchaseDate, "exp_ret_date"=>$purchaseDetailsExpectedReturnDate, "act_ret_date"=>$purchaseDetailsActualReturnDate, "rental_status"=> $purchaseDetailsStatus, "copy_id"=>$copy_id, "cust_id"=>$custId]);
			}
			catch(Exception $e) {
				echo "<script>alert('error in rentals')</script>";
				exit();
			  }

			} else {
			// One or more mandatory fields are empty. Therefore, display a the error message
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter all fields marked with a (*)</div>';
			exit();
		}
	}
?>