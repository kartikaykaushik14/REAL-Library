
<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php
// Start the session
session_start();

// Include the database connection file
include 'db_connect.php';
// 12341 1 32111
// print($_POST['customer_id']);
// Check if the user is logged in

// if (!isset($_SESSION['user_id'])) {
// 	header("Location: login.php");
// 	exit();
// }

// Check if the form has been submitted
if (isset($_POST['room_type']) && isset($_POST['room_no']) && isset($_POST['slot_id']) && isset($_POST['customer_id'])) {
	// Retrieve the values from the form submission
	$room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
	$room_number = mysqli_real_escape_string($conn, $_POST['room_no']);
	$slot_id = mysqli_real_escape_string($conn, $_POST['slot_id']);
	$customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);

// 	print($room_type);
// 	print($room_number);
// 	print($slot_id);
// 	print($customer_id);
	// Book the group study room with the selected values
	bookGroupStudyRoom($conn, $room_type, $room_number, $slot_id, $customer_id);
}
else{
	echo " <h1> Error: One of the following is not selected.</h1>";
}

// Function to book a group study room with the given room type, room number, and slot ID
function bookGroupStudyRoom($conn, $room_type, $room_number, $slot_id, $customer_id) {
	// Check if the group study room is available
	
	$query = "select * from cust_studyroom where room_no = $room_number and date(book_date) = CURRENT_DATE and slot_no = $slot_id;";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 0) {
		// Update the status of the group study room to "booked"
		$query2 = "insert into cust_studyroom(cust_id,room_no, book_date, slot_no) values($customer_id,$room_number,CURRENT_TIMESTAMP, $slot_id)";
		//$query = "UPDATE study_rooms SET status = 'booked' WHERE room_type = '$room_type' AND room_number = $room_number AND slot_id = '$slot_id'";
		$result = mysqli_query($conn, $query2);
		if ($result) {
			echo "<h1>The study room has been booked successfully!</h1>";
		} else {
			echo "<h1>Error: Could not book the group study room. </h1>" . mysqli_error($conn);
		}
	} else {
		
		echo " <h1> Error: The selected study room is not available. Please select a different room or slot.</h1>";
	}
}

 ?>

</body>
</html>
