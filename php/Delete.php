<?php
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sms';
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if ($conn->connect_error){
    die('Connection Failed:'.$conn->connect_error);
}

$ID = $_GET['rn'];

$DELETE = "DELETE FROM subjects WHERE ID = '$ID' ";

$result = mysqli_query($conn, $DELETE);

if($result){
    echo "<script>alert('Record Deleted Successfully')</script>";
    echo "<script>location.replace('Dis_Sub.php')</script>";
}
else{
    echo "<script>alert('Failed to Delete Record')</script>";
    echo "<script>location.replace('Dis_Sub.php')</script>";
}
?>