<?php
$con = mysqli_connect('localhost', 'root', '','project_real');
session_start();

$author_id = $_SESSION['author_id'];
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


if ($result = mysqli_query($con, "SELECT * FROM AUTH_SEM")) {
//     printf("Select returned %d rows.\n", mysqli_num_rows($result));
    mysqli_free_result($result);
}

$rs = mysqli_query($con, "select ifnull(max(AUTH_SEM.invitation_id),0)+1 as id from AUTH_SEM");
$rows=mysqli_fetch_assoc($rs);
$id = $rows['id'];

// print("INSERT INTO AUTH_SEM (invitation_id, author_id, event_id) VALUES ('$id', '$author_id', '$event_id')");


// $sql = "INSERT INTO EXH_CUST (registration_id, cust_id, event_id) VALUES ('$id', '$cust_id', '$event_id')";
// print ($sql);

if(mysqli_query($con, "INSERT INTO AUTH_SEM (invitation_id, author_id, event_id) VALUES ('$id', '$author_id', '$event_id')")){ // if the query successfully executes
    echo " <h1> You have successfully registered for the seminar. </h1>";
} else {
    echo " <h1> Error: You have already registered for this seminar. Please select a different seminar. </h1>";
}

?>