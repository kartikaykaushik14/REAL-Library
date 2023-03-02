<?php
include_once 'admin/include/class.user.php'; 
$user=new User();
$profpic = "bookroom.jpeg";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Book a Group Study Room</title><style type="text/css">

                                          body {
                                          background-image: url('<?php echo $profpic;?>');
                                          }
                                          </style>

	<style type="text/css">
		body {
			font-family: sans-serif;
			margin: 0;
			padding: 0;
		}
		h1 {
			text-align: center;
		}
		form {
			width: 400px;
			margin: auto;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="text"],
		select {
			width: 100%;
			padding: 12px 20px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Book a Study Room</h1>
	<form action="http://localhost/real_library/bookroom/book.php" method="post">
		<label for="room_type">Select a Room Type:</label>

		<select id="room_type" onchange=reload() name="room_type">
			<option value="I"  >Individual Study Room</option>
			<option value="G">Group Study Room</option>
		</select>
		<label for="room_number">Select a Room Number:</label>

		
        <?php

//$cat = $_GET['cat'];
$query2 = "select room_no, capacity from study_rooms where room_type ='I'";
        if ($stmt = mysqli_prepare($user->db, $query2)) {
	        // $stmt->bind_param('s', $cat);
	        $stmt->execute();
	        $r_set = $stmt->get_result();
			echo "<select id = 'room_no'  name = 'room_no'  style = 'width:400px;'>";

			while($row=$r_set->fetch_assoc()) {
			echo "<option value = $row[room_no]> Room no = $row[room_no] - capacity ($row[capacity]) </option>";

        }
    echo "</select>";
        }

		else{
			echo " connection error";
		}

?>


		<label for="slot_id">Select a Slot ID:</label>
		<select id="slot_id" name="slot_id">
			<option value=1>1 (8 AM to 10 AM)</option>
			<option value=2>2 (11 AM to 1 PM)</option>
            <option value=3>3 (1 PM to 3 PM)</option>
            <option value=4>4 (4 PM to 6 PM)</option>
		</select>

		<label for="cust_id">Customer ID</label>
		<input type="text" name="customer_id" id="cust_idval" style = 'width: 90%;' >
		<input type="submit" value="Book Room" />
	</form>
</body>

<script>
function reload(){
   
    var v1 = document.getElementById("room_type").value;
    console.log(v1);
    self.location = 'formbook4.php?cat=' + v1;
}
</script>


<?php
	require 'footer.php';
?>

</html>
