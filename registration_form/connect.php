<?php
// echo "started";
$con = mysqli_connect('localhost', 'root', '','project_real');
session_start();

//   if($con){
// 	print("Connection Established Successfully. ");
//  }else{
// 	print("Connection Failed. ");
//  }

  if(!$con){
	print("Connection Failed. ");
 }

$cust_fname=$_POST['cust_fname'];
$cust_lname=$_POST['cust_lname'];
$cust_phone=(int)$_POST['cust_phone'];
$cust_email=$_POST['cust_email'];
$identific_type=$_POST['identific_type'];
$identific_num=$_POST['identific_num'];
$password=$_POST['password'];

$cust_fname=mysqli_real_escape_string($con,$cust_fname);
$cust_lname=mysqli_real_escape_string($con,$cust_lname);
$cust_phone=mysqli_real_escape_string($con,$cust_phone);
$cust_email=mysqli_real_escape_string($con,$cust_email);
$identific_type=mysqli_real_escape_string($con,$identific_type);
$identific_num=mysqli_real_escape_string($con,$identific_num);
$password=mysqli_real_escape_string($con,$password);

htmlspecialchars($cust_fname, ENT_QUOTES, 'UTF-8');
htmlspecialchars($cust_lname, ENT_QUOTES, 'UTF-8');
htmlspecialchars($cust_phone, ENT_QUOTES, 'UTF-8');
htmlspecialchars($cust_email, ENT_QUOTES, 'UTF-8');
htmlspecialchars($identific_type, ENT_QUOTES, 'UTF-8');
htmlspecialchars($identific_num, ENT_QUOTES, 'UTF-8');
htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

$hash = password_hash($password, PASSWORD_DEFAULT);

// print($cust_fname);
// print($cust_lname);
// print($cust_phone);
// print($cust_email);
// print($identific_type);
// print($identific_num);
// print($hash);

// if ($result = mysqli_query($con, "SELECT * FROM CUSTOMERS")) {
//     printf("Select returned %d rows.\n", mysqli_num_rows($result));
//     mysqli_free_result($result);
// }

$res = mysqli_query($con, "SELECT * FROM CUSTOMERS where CUST_EMAIL = '$cust_email'");
$num_rows = mysqli_num_rows($res);

if ($num_rows == 0) {
    $rs = mysqli_query($con, "select ifnull(max(customers.cust_id),0)+1 as id from customers");
    $rows=mysqli_fetch_assoc($rs);
    $id = $rows['id'];

    $rs2 = mysqli_query($con, "INSERT INTO CUSTOMERS (cust_id, cust_fname, cust_lname, cust_phone, cust_email, identific_type, identific_num) VALUES ('$id', '$cust_fname', '$cust_lname', '$cust_phone','$cust_email', '$identific_type', '$identific_num')");

    if($rs2)
    {
    	echo "Customer Records Inserted";
        header("Location: http://localhost/real_library/Login_page/index.html");

    }

    $rs = mysqli_query($con, "select ifnull(max(rent_use.userId),0)+1 as id from rent_use");
    $rows = mysqli_fetch_assoc($rs);
    $id = $rows['id'];
    print($id);
    $rs3 = mysqli_query($con, "INSERT INTO RENT_USE (userId, fullName, username, password, status) VALUES ('$id', '$cust_fname', '$cust_email', '$hash', 'ACTIVE')");

}
else{
    echo("Customer Details already exist!!!");
    mysqli_free_result($result);
}




?>