<?php
$con = mysqli_connect('localhost', 'root', '','project_real');
session_start();

//   if($con){
// 	print("Connection Established Successfully");
//  }else{
// 	print("Connection Failed ");
//  }

$username= $_POST['username'];
$password= $_POST['password'];

$username=mysqli_real_escape_string($con,$username);
$password=mysqli_real_escape_string($con,$password);

htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

$rs = mysqli_query($con, "SELECT * From rent_use Where username='$username'");
$num_rows = mysqli_num_rows($rs);

if($num_rows == 0){
    echo " <h1> Error: User not found. </h1>";
}

else{
    $rows1 = mysqli_fetch_assoc($rs);
    if(password_verify($password, $rows1['password']))
    {
        print("SELECT * From customer Where cust_email = '$username'");
        $rs1 = mysqli_query($con, "SELECT * From customers Where cust_email = '$username'");
        $rows1 = mysqli_fetch_assoc($rs1);
        print($rows1['cust_id']);
        $_SESSION['cust_id'] = $rows1['cust_id'];

        header("Location: http://localhost/real_library/Exhibitions/index.php");
    }
    else{
      echo " <h1> Error: User not found. </h1>";
    }
}

?>