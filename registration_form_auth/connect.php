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

$auth_fname=$_POST['auth_fname'];
$auth_lname=$_POST['auth_lname'];
$auth_flat_no=$_POST['auth_flat_no'];
$auth_stadd=$_POST['auth_stadd'];
$auth_city=$_POST['auth_city'];
$auth_state=$_POST['auth_state'];
$auth_zipcode=(int)$_POST['auth_zipcode'];
$auth_email_add=$_POST['auth_email_add'];
$password=$_POST['password'];

$auth_fname=mysqli_real_escape_string($con,$auth_fname);
$auth_lname=mysqli_real_escape_string($con,$auth_lname);
$auth_flat_no=mysqli_real_escape_string($con,$auth_flat_no);
$auth_stadd=mysqli_real_escape_string($con,$auth_stadd);
$auth_city=mysqli_real_escape_string($con,$auth_city);
$auth_state=mysqli_real_escape_string($con,$auth_state);
$auth_zipcode=mysqli_real_escape_string($con,$auth_zipcode);
$auth_email_add=mysqli_real_escape_string($con,$auth_email_add);
$password=mysqli_real_escape_string($con,$password);

htmlspecialchars($auth_fname, ENT_QUOTES, 'UTF-8');
htmlspecialchars($auth_lname, ENT_QUOTES, 'UTF-8');
htmlspecialchars($auth_flat_no, ENT_QUOTES, 'UTF-8');
htmlspecialchars($auth_stadd, ENT_QUOTES, 'UTF-8');
htmlspecialchars($auth_city, ENT_QUOTES, 'UTF-8');
htmlspecialchars($auth_state, ENT_QUOTES, 'UTF-8');
htmlspecialchars($auth_zipcode, ENT_QUOTES, 'UTF-8');
htmlspecialchars($auth_email_add, ENT_QUOTES, 'UTF-8');
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

$res = mysqli_query($con, "SELECT * FROM AUTHORS where auth_email_add = '$auth_email_add'");
$num_rows = mysqli_num_rows($res);

if ($num_rows == 0) {
    $rs = mysqli_query($con, "select ifnull(max(authors.author_id),0)+1 as id from authors");
    $rows=mysqli_fetch_assoc($rs);
    $id = $rows['id'];
    print("INSERT INTO AUTHORS (author_id, auth_fname, auth_lname, auth_flat_no, auth_stadd, auth_city, auth_state, auth_zipcode, auth_email_add) VALUES ('$id', '$auth_fname', '$auth_lname', '$auth_flat_no','$auth_stadd', '$auth_city', '$auth_state', '$auth_zipcode', '$auth_email_add')");

    $rs2 = mysqli_query($con, "INSERT INTO AUTHORS (author_id, auth_fname, auth_lname, auth_flat_no, auth_stadd, auth_city, auth_state, auth_zipcode, auth_email_add) VALUES ('$id', '$auth_fname', '$auth_lname', '$auth_flat_no','$auth_stadd', '$auth_city', '$auth_state', '$auth_zipcode', '$auth_email_add')");
    print("INSERT INTO AUTHORS (author_id, auth_fname, auth_lname, auth_flat_no, auth_stadd, auth_city, auth_state, auth_zipcode, auth_email_add) VALUES ('$id', '$auth_fname', '$auth_lname', '$auth_flat_no','$auth_stadd', '$auth_city', '$auth_state', '$auth_zipcode', '$auth_email_add')");
    if($rs2)
    {
    	echo "Author Records Inserted";
        header("Location: http://localhost/real_library/Login_page_auth/index.html");

    }

    $rs = mysqli_query($con, "select ifnull(max(rent_auth.userId),0)+1 as id from rent_auth");
    $rows = mysqli_fetch_assoc($rs);
    $id = $rows['id'];
    print($id);
    $rs3 = mysqli_query($con, "INSERT INTO RENT_AUTH (userId, fullName, username, password, status) VALUES ('$id', '$auth_fname', '$auth_email_add', '$hash', 'ACTIVE')");

}
else{
    echo("Author Details already exist!!!");
    mysqli_free_result($result);
}




?>