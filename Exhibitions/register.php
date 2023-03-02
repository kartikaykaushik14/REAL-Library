<?php
$con = mysqli_connect('localhost', 'root', '','project_real');
session_start();

$cust_id = $_SESSION['cust_id'];
$event_id = $_SESSION['event_id'];

//   if($con){
// 	print("Connection Established Successfully");
//  }else{
// 	print("Connection Failed ");
//  }

$username= $_POST['username'];
$password= $_POST['password'];

$username=mysqli_real_escape_string($con,$username);
$password=mysqli_real_escape_string($con,$password);


if ($result = mysqli_query($con, "SELECT * FROM EXH_CUST")) {
//     printf("Select returned %d rows.\n", mysqli_num_rows($result));
    mysqli_free_result($result);
}

$rs = mysqli_query($con, "select ifnull(max(EXH_CUST.registration_id),0)+1 as id from EXH_CUST");
$rows=mysqli_fetch_assoc($rs);
$id = $rows['id'];

$res = mysqli_query($con, "SELECT * FROM EXH_CUST where cust_id = '$cust_id' and event_id = '$event_id'");
$num_rows = mysqli_num_rows($res);

if ($num_rows == 0) {
    mysqli_query($con, "INSERT INTO EXH_CUST (registration_id, cust_id, event_id) VALUES ('$id', '$cust_id', '$event_id')");
    echo " <h1> You have successfully registered for the exhibition. </h1>";
}
else {
    echo " <h1> Error: You have already registered for this seminar. Please select a different exhibition. </h1>";
}

?>