<?php
$name = $_POST['Name'];
$mobile = $_POST['Mobile'];
$email = $_POST['Email'];
$gender = $_POST['Gender'];
$amount = $_POST['Amount'];
$class = $_POST['Class'];

if (!empty($name) || !empty($mobile) || !empty($email) || !empty($gender) || !empty($amount) || !empty($class)){
    
    $conn = new mysqli('localhost', 'root', '', 'sms');

    if(mysqli_connect_error()){
        die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT Mobile FROM fees WHERE Mobile = ? Limit 1";
        $INSERT = "INSERT INTO fees (Name, Mobile, Email, Gender, Amount, Class) values(?,?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('i', $mobile);
        $stmt->execute();
        $stmt->bind_result($mobile);
        $stmt->store_result();
        $rnum = $stmt->num_rows;


        if($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('sissss', $name, $mobile, $email, $gender, $amount, $class);
            $stmt->execute();
            echo "<script>alert('Fees Paid Successfully')</script>";
            echo "<script>location.replace('Stu_Por.php')</script>";
        }
        else{
            echo "<script>alert('Fees Already Paid')</script>";
            echo "<script>location.replace('Stu_Por.php')</script>";
        }
        $stmt->close();
        $conn->close();
    }
}
else{
    echo "<script>alert('All Fields are required')</script>";
    die();
}
?>