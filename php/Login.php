<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    session_start();
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'sms';

    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
    

    $SoT = $_POST['SoT'];
    $Mobile = $_POST['Mobile'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM register WHERE SoT = '$SoT' AND Mobile = '$Mobile' AND Password = '$Password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if($SoT=="" || $Mobile=="" || $Password==""){
        echo "<script>alert('Enter Mobile No. and Password')</script>";
        header('location:../Login.html');
    }

    if($row['SoT']==$SoT && $row['Mobile']==$Mobile && $row['Password']==$Password){
        if($row['SoT']=='S'){
            $_SESSION['Mobile'] = $Mobile;
            header('location:Stu_Por.php');
        }
        elseif($row['SoT']=='T'){
            $_SESSION['Mobile'] = $Mobile;
            header('location:Staf_Por.php');
        }
    }
    else{
         echo "<script>alert('Check your Credentials')</script>";
        echo "<script>location.replace('../Login.html')</script>";
    }
?>