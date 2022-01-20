<?php
$Sub_Code = $_POST['Sub_Code'];
$Subject = $_POST['Subject'];
$class = $_POST['Class'];

if (!empty($Sub_Code) || !empty($Subject)){
    $host = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'sms';
        
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
        
    if (mysqli_connect_error()){
        die ('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT = 'SELECT Sub_Code From subjects Where Sub_Code = ? Limit 1';
        $INSERT = 'INSERT Into subjects (Class, Sub_Code, Subject) values(?,?,?)';
            
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('s', $Sub_Code);
        $stmt->execute();
        $stmt->bind_result($Sub_Code);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
            
        if($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('sss',$class, $Sub_Code, $Subject);
            $stmt->execute();
            echo "<script>alert('Subject Updated Successfully')</script>";
            echo "<script>location.replace('Dis_Sub.php')</script>";
        }
        else{
            echo "<script>alert('Subject Code is already exists')</script>";
            echo "<script>location.replace('Dis_Sub.php')</script>";
        }
        $stmt->close();
        $conn->close();
    }
}
else{
    echo 'All fields are required';
    die();
}
?>